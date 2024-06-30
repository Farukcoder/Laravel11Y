<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendMail()
    {
        $toMail = "nusratjahansamiya5380@gmail.com";
        $message = "Hi, welcome to my test website";
        $subject = "My Test Email";

        $response = Mail::to($toMail)->send(new welcomeemail($message, $subject));

    }
}
