<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function contact_post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        Mail::send(
            'auth.contact',
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'comment' => $request->get('comment'),
            ],
            function ($message) {
                $message->from(env('MAIL_USERNAME'));
                $message->to(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))->subject('Contato Guia Da van');
            },
        );

        return back()->with('success', 'Obrigado por entrar em contato, logo retornaremos.');
    }
}
