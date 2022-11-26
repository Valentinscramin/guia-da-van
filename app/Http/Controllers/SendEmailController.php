<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    public function send(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'view' => $request->view,
        ];
        //sid.marchetto@gmail.com
        Mail::to('valentinscramin@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'Contato feito, aguarde a resposta de nossa equipe!');
    }
}
