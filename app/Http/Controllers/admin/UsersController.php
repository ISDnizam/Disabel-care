<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use Illuminate\Support\Facades\View;
        use App\Notifications\Registered;

class UsersController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','verified']); << only verified email who can access
    }
    public function index(){
        $data['title'] = "List Users";
        $data['list'] = User::latest()->paginate(5);
        return view('content/admin/user/list',$data);
    }

    public  function edit($id){
        $data['title'] = "Edit User";
        $data['edit'] = User::find($id);
        return view('content/admin/user/edit',$data);
    }

    public function action_edit(Request $request,$id){
        $this->validate($request,
        [
        'name' => 'required', 
        'email' => 'required|min:3', 
        'status' => 'required', 
        ]);
        User::find($id)->update($request->all());
        return redirect('/admin/users')->with('status', 'User Updated !');;
    }

    public  function delete($id){
        User::find($id)->delete();
        return redirect('/admin/users')->with('status', 'User Deleted !');;
    }

}
