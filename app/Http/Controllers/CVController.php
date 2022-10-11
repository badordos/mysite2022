<?php

namespace App\Http\Controllers;

use App\Mail\CVFormMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CVController extends Controller
{

    public function welcome()
    {
        $data = Cache::remember('cv-data', 60*60*24, static function() {
            return [
                'age' => Carbon::parse('12.02.1992')->diffInYears(Carbon::now()),
                'email' => env('ADMIN_MAIL'),
                'telegram' => 'v_ordoss',
                'phones' => [
                    '+79326161120',
                    '+77054588696',
                ],
                'dislocation' => 'Kazakhstan, Astana',
                'about' => 'Hello! I’m Vladislav Yarlykov. I am passionate about web development. I am a middle back-end developer with PHP/Laravel'
            ];
        });

        return view('cv.welcome', compact('data'));
    }

    public function sendMail(Request $request)
    {
        \Mail::to(env('ADMIN_MAIL'))->send(new CVFormMail($request->all()));
        return back()->with('message','email send');
    }
}
