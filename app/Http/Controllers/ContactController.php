<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Mail\ContactMail;
use App\Mail\ReplyMail;

use Mail;

class ContactController extends Controller
{
    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);

      
        $data = array(
            'name'  => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        );

       
            
            Mail::to('admin@app.com')->send(new ContactMail($data));
            Mail::to($data['email'])->send(new ReplyMail($data));

            return response()->json('success');

       

      

    }
}
