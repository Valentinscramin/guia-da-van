<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function login(Request $request)
    {

        $validator = $this->getValidationFactory()
            ->make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];

            $authOK = Auth::guard('admin')->attempt($credentials, $request->remember);

            if ($authOK) {
                return redirect()->intended(route('admin_home'));
            }

            return redirect()->back()->withInput($request->only('email'));
        }
    }

    public function index()
    {
        return view('auth.admin-login');
    }
}
