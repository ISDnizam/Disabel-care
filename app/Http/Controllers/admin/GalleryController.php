<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\Settings;
use App\Gallery;
use File;
class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']); 
    }
    public  function index(){
        $data['title'] = "Gallery";
        $data['settings'] = Settings::all();
        $data['gallery'] = Gallery::all();
        return view('admin/gallery/parent',$data);
    }
    public function action_add(Request $request){
        $type = $request->input('type');
        $full_path = $request->input('full_path');
        $name = $request->input('name');
        if($type=='image'){
            $file = $request->file('file');
            if(!empty($file)){
            $path_upload = 'assets/images';
            $form['full_path'] = '/'.$path_upload.'/'.$file->getClientOriginalName();
            $file->move($path_upload,$file->getClientOriginalName());
            }
            $form['name'] = $name;
        }else{
            $parts = parse_url($full_path);
            parse_str($parts['query'], $query);
            if(!empty($query['v'])){
                $form['full_path'] = 'https://www.youtube.com/embed/'.$query['v'];
            }else{
                $form['full_path'] = $full_path;
            }
            $form['name'] = 'Vdeo';
            $form['type'] = 'video';
        }
        Gallery::create($form);
        Session::flash('success','Sukses menambahkan gallery');
        return redirect('/admin/gallery');
    }
    public  function delete($id_gallery){
        $gallery =Gallery::find($id_gallery);
        if($gallery->type=='image'){
            if(!empty($gallery->full_path)){
            $path = str_replace('/assets', 'assets',$gallery->full_path);
            File::delete($path);
            }
        }

        Gallery::find($id_gallery)->delete();
        Session::flash('success','Sukses Menghapus Gallery');
        return redirect()->back();
    }
}
