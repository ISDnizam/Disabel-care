<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\Settings;
use File;
class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']); 
    }
    public  function edit($name){
        $newName = str_replace('_',' ',$name);
        $data['title'] = "Edit ".$newName;
        $data['settings'] = Settings::all();
        $data['edit'] = Settings::whereName($name)->first();
        return view('admin/settings/edit_'.$name,$data);
    }
   
    public function action_edit(Request $request,$name){
        $newName = str_replace('_',' ',$name);
        $form = $request->input('form');
        $value = $request->input('value');

    
        $this->validate($request,
        [
        'value' => 'required', 
        ]);
        if($name=='phone'){
            $form['value'] = json_encode($value);
        }elseif($name=='email' or $name=='about'){
            $form['value'] = $value;
        }elseif($name=='address'){
            $value = array_values($value);
            foreach ($value as $key => $val) {
            $additional_data[$key]['location'] =  $val['location'];
            $additional_data[$key]['address'] =  $val['address'];
            }
            $form['value'] = json_encode($additional_data);
        }elseif($name=='operational_hours'){
            $value = array_values($value);
            foreach ($value as $key => $val) {
            $additional_data[$key]['day'] =  $val['day'];
            $additional_data[$key]['hour'] =  $val['hour'];
            }
            $form['value'] = json_encode($additional_data);
        }elseif($name=='social_media'){
            $value = array_values($value);
            foreach ($value as $key => $val) {
            $additional_data[$key]['type'] =  $val['type'];
            $additional_data[$key]['icon'] =  $val['icon'];
            $additional_data[$key]['url'] =  $val['url'];
            }
            $form['value'] = json_encode($additional_data);
        }elseif($name=='testimonial'){
            $value = array_values($value);
            foreach ($value as $key => $val) {
            $additional_data[$key]['name'] =  $val['name'];
            $additional_data[$key]['description'] =  $val['description'];
            }
            $form['value'] = json_encode($additional_data);
        }

        Settings::whereName($name)->update($form);
        Session::flash('success','Sukses Update '.$newName);
        return redirect('/admin/settings/edit/'.$name);
    }

}
