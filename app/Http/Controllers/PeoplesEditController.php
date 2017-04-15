<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

use Validator;

class PeoplesEditController extends Controller
{
    public function execute(People $people, Request $request){

        if ($request->isMethod('delete')) {
            $people->delete();
            return redirect()->route('peoples')->with('status', 'Данные сотрудника удалены');
        }


        if($request->isMethod('post')) {

            $input = $request->except('_token');

            $validator = Validator::make($input, array(

                'name' => 'required|max:255|unique:peoples,name,'.$input['id'],
                'position' => 'required|max:255',
                'text' => 'required'

            ));

            if($validator->fails()){
                return redirect()->route('peoplesEdit', ['people'=>$input['id']])
                                 ->withErrors($validator);
            }

            if($request->hasFile('images')){
                $file = $request->images;
                $input['images'] = $file->getClientOriginalName();
                $file->move('assets\img\team', $input['images']);
            }
            else{
               $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $input['text'] = strip_tags($input['text']);

            $people->fill($input);

            if ($people->update()) {
                return redirect()->route('peoples')->with('status', 'Данные нового сотрудника обнавлены');
            }
        }

        $old = $people->toArray();

        if (view()->exists('admin.peoples.peoples_edit')){

            $data = [
                    'title' => 'Редактирование сотрудника - '.$old['name'],
                    'data' => $old
                    ];

            return view('admin.peoples.peoples_edit', $data);
 
        }
    }

}