<?php

namespace App\Http\Controllers;

use App\Mail\CVFormMail;
use Illuminate\Http\Request;

class CVController extends Controller
{

    public function welcome()
    {
        return view('cv.welcome');
    }

    public function sendMail(Request $request)
    {
        \Mail::to('badordos@gmail.com')->send(new CVFormMail($request->all()));
        return back()->with('message','email send');
    }
}
