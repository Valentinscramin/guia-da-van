<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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
        $this->validator::make($request, ['email' => 'required|string', 'password' => 'required']);

        $credentials = ['email' => $request->email, 'password' => $request->password];

        $authOK = Auth::guard()->attempt($credentials, $request->remember);

        if($authOK)
        {
            return redirect()->intended(route('admin_home'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function index()
    {
        return view('auth.admin-login');
    }
}
