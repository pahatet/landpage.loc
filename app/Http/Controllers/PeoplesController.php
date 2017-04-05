<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

class PeoplesController extends Controller
{
    //
    public function execute(){

        if (view()->exists('admin.peoples')){

            $peoples = People::all();

            $data = [

                    'title' => 'Team',
                    'peoples' => $peoples,
                    ];

            return view('admin.peoples', $data);
 
        }

        abort(404);
    }
}
