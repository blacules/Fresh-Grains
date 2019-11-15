<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class confirmationcontroller extends Controller
{
     if (! session()->has('success_message')) {
            return redirect('/');
        }

        return view('pages.thankyou');
}
