<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\User;
use Auth;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','verified']); << only verified email who can access
    }
    public function index(){
        $data['title'] = "Blog";

        $data['list'] = Blog::all();
        return view('content/admin/blog/list',$data);
    }

    public  function  add(){
        $data['title'] = "Add Content";
        return view('content/admin/blog/add',$data);
    }

    public function action_add(Request $request){
        $this->validate($request,
        [
        'title' => 'required', 
        'description' => 'required|min:3', 
        ]);

        Blog::create($request->all());
        return redirect('/admin/blog')->with('status', 'Article Created !');
    }


    public  function edit($id_blog){
        $data['title'] = "Edit Content";
        $data['edit'] = Blog::find($id_blog);
        return view('content/admin/blog/edit',$data);
    }

    public function action_edit(Request $request,$id){
        $this->validate($request,
        [
        'title' => 'required', 
        'description' => 'required|min:3', 
        ]);
        Blog::find($id)->update($request->all());
        return redirect('/admin/blog')->with('status', 'Article Updated !');;
    }

    public  function delete($id_blog){
        Blog::find($id_blog)->delete();
        return redirect('/admin/blog')->with('status', 'Article Deleted !');;
    }

}
