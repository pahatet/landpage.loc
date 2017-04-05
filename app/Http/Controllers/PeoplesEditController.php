<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

use Validator;

class PeoplesEditController extends Controller
{
    public function execute(People $people, Request $request){

        if($request->isMethod('post')) {

            $input = $request->except('_token');

            $validator = Validator::make($input, array(

                'name' => 'required|unique:peoples|max:255',
                'position' => 'required|max:255',
                'text' => 'required'

            ));

            if($validator->fails()){
                return redirect()->route('peoplesEdit', ['people'=>$input['id']])
                                 ->withErrors($validator);
            }
        }

        $old = $people->toArray();

        if (view()->exists('admin.peoples_edit')){

            $data = [
                    'title' => 'Редактирование сотрудника - '.$old['name'],
                    'data' => $old
                    ];

            return view('admin.peoples_edit', $data);
 
        }
    }

}