<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use Mail;
use App\Email;

use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['auth']);

    }

    public function getForm()
    {
        return view('contact');
    }

    public function postForm(ContactRequest $request)
    {

        $all = $request->all();
        Mail::send('email_contact', $all, function($message) use ($request)
        {
            $message->to($request->input('email'))->subject('Contact');
        });

        return view('confirm');
    }
}
