<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\People;
use App\Portfolio;
use App\Service;

use Mail;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute(Request $request){

        if ($request->isMethod('post')) {
            
            $masseges = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'email' => 'Поле :attribute должно соответствовать email адресу'

            ];

            $this->validate($request, [

                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'

                ], $masseges);

            // dump($data);
            
            $data = $request->all();

            $result = Mail::send('site.email', array('data'=>$data), function($masseges) use ($data) {

                $mail_admin = env('MAIL_ADMIN');

                $masseges->from($data['email'], $data['name']);
                $masseges->to( $mail_admin, 'Vr. Admin')->subject('Question');

            });

            if($result){

                return redirect()->route('home')->with('status', 'Email is send');

            }
            
        }

        $pages = Page::all();
        $peoples = People::all();
        $services = Service::all();
        $portfolios = Portfolio::all();

        $menu = array();
        foreach ($pages as $page){
            $item = array('title'=>$page->name, 'alias'=>$page->alias);
            array_push($menu, $item);
        }

        $item = array('title'=>'Services', 'alias'=>'services');
        array_push($menu, $item);

        $item = array('title'=>'Portfolio', 'alias'=>'portfolio');
        array_push($menu, $item);

        $item = array('title'=>'Team', 'alias'=>'team');
        array_push($menu, $item);

        $item = array('title'=>'Contact', 'alias'=>'contact');
        array_push($menu, $item);

//        dd($menu);


        return view('site.index', array(

                                    'menu' => $menu,
                                    'pages' => $pages,
                                    'peoples' => $peoples,
                                    'services' => $services,
                                    'portfolios' => $portfolios

                                        ));
    }
}
