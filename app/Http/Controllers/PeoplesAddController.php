<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

use Validator;

class PeoplesAddController extends Controller
{
    
    public function execute(Request $request){

        if($request->isMethod('post')){

            $input = $request->except('_token');

            if(!$request->hasFile('images')){                
                $input['images'] = NULL;
            }

             // dd($input);

            $massages = [

                    'required' => 'Поле :attribute обязательно к заполнению',                    
                    'unique' => 'Поле :attribute должно быть уникальным',
            ];


            $validator = Validator::make($input, array(

                'name' => 'required|unique:peoples|max:255',
                'position' => 'required|max:255',
                'text' => 'required',
                'images' => 'required'

                ), $massages);



            if($validator->fails()){
                return redirect()->route('peoplesAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')){
                $file = $request->images;
                $input['images'] = $file->getClientOriginalName();
                $file->move('assets\img\team', $input['images']);
            }


            // 
            $input['text'] = strip_tags($input['text']);
            
            $people = new People();
            $people->fill($input);

            if($people->save()){
                return redirect()->route('peoples')->with('status', 'Данные нового сотрудника сохранены');
            }

        } 

        if (view()->exists('admin.peoples_add')){

            $data = [

                    'title' => 'Новый сотрудник',
                    
                    ];

            return view('admin.peoples_add', $data);
 
        }

        abort(404);
    }
    
}
