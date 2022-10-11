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
        $data = Cache::remember('cv-data', 1, static function() {
            return [
                'name' => 'Vladislav Yarlykov',
                'header' => 'back-end developer PHP/Laravel',
                'github' => 'https://github.com/badordos',
                'facebook' => 'https://web.facebook.com/profile.php?id=100008204133126',
                'instagram' => 'https://www.instagram.com/v_ordoss',
                'age' => Carbon::parse('12.02.1992')->diffInYears(Carbon::now()),
                'email' => env('ADMIN_MAIL'),
                'telegram' => 'v_ordoss',
                'phones' => [
                    '+79326161120',
                    '+77054588696',
                ],
                'dislocation' => 'Kazakhstan, Astana',
                'about' => 'Hello! I’m Vladislav Yarlykov. I am passionate about web development. I am a middle back-end developer with PHP/Laravel',
                'skills' => [
                    'PHP/Laravel' => [
                        'value' => 95,
                        'title' => 'Expert',
                    ],
                    'JS/VueJS' => [
                        'value' => 80,
                        'title' => 'Specialist',
                    ],
                    'MySQL/Elouqent' => [
                        'value' => 80,
                        'title' => 'Specialist',
                    ],
                    'Git' => [
                        'value' => 80,
                        'title' => 'Specialist',
                    ],
                    'Docker CI|CD' => [
                        'value' => 65,
                        'title' => 'Advance',
                    ],
                    'C++/UE engine' => [
                        'value' => 45,
                        'title' => 'Beginner',
                    ],
                ],
                'works' => [
                    'Versite studio' => [
                        'from' => 'November, 2017',
                        'to' => 'September, 2018',
                        'link' => 'https://versite.ru/',
                        'desc' => 'Outsource development web-studio',
                    ],
                    'Flag studio' => [
                        'from' => 'September, 2018',
                        'to' => 'January, 2019',
                        'link' => 'https://flagstudio.ru/',
                        'desc' => 'Outsource development web-studio',
                    ],
                    'Cbo.ru' => [
                        'from' => 'January, 2019',
                        'to' => 'May, 2019',
                        'link' => 'https://cbo.ru/',
                        'desc' => 'CRM system for Center of bussiness education',
                    ],
                    'Online-express.ru' => [
                        'from' => 'June, 2019',
                        'to' => 'Marth, 2020',
                        'link' => 'https://online-express.ru/',
                        'desc' => 'Tourism IT solution. Hotels, Aviatickets, transfers and more in 1 app',
                    ],
                    'Flor2u.ru' => [
                        'from' => 'Marth, 2020',
                        'to' => 'December, 2020',
                        'link' => 'https://flor2u.ru/',
                        'desc' => 'Marketplace agregator with CRM system',
                    ],
                    'Traffic Isobar' => [
                        'from' => 'December, 2020',
                        'to' => 'September, 2021',
                        'link' => 'https://t-agency.ru/',
                        'desc' => 'Digital agency specializes in advertising campaign with web-studio projects',
                    ],
                    'Gorserv' => [
                        'from' => 'September, 2021',
                        'to' => 'present',
                        'link' => 'https://gorserv.com/',
                        'desc' => 'Uber Business Model for specilalists who specializes in installing and maintaining systems used and more.',
                    ],


                ]
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
