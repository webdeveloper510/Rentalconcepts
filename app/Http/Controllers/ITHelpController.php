<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ITHelpController extends Controller
{
    public function itHelp()
    {
        if (Session::has('loginid')) {
            return view('accounting.itHelp');
        } else {
            return redirect('/accounting');
        }
    }
}
