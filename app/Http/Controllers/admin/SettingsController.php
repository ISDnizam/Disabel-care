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

    public function index(){
        $data['title'] = "Pengaturan";
        $data['list'] =Settings::all();
        return view('admin/settings/list',$data);
    }

    public  function edit($id_setting){
        $data['title'] = "Edit Pengaturan";
        $data['edit'] = Settings::find($id_setting);
        return view('admin/settings/edit',$data);
    }
   
    public function action_edit(Request $request,$id_setting){
        $form = $request->input('form');
        $this->validate($request,
        [
        'form.value' => 'required', 
        ]);

        Settings::find($id_setting)->update($form);
        Session::flash('success','Sukses mengupdate');
        return redirect('/admin/settings');
    }

}
