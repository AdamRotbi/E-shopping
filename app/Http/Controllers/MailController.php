<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from E-shopping',
            'body' => 'This is verification mail.'
        ];

        Mail::to('adam.rotbi11@gmail.com')->send(new DemoMail($mailData));

        return redirect()->route('cart');    }
}
