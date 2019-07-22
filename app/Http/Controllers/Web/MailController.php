<?php

namespace App\Http\Controllers\Web;

use App\Mail\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Web\Controller;

class MailController extends Controller
{
    public function register()
    {
        Mail::to('s890494@gmail.com')->send(new Register());
    }
}
