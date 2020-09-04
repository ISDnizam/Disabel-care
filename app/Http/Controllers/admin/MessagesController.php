<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\User;
use App\Messages;
use Auth;
use Illuminate\Support\Facades\View;
use App\Notifications\Registered;

class MessagesController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','verified']); << only verified email who can access
    }
    public function index(){
        $data['title'] = "Messages";
        $data['list'] = Messages::all();
        return view('content/admin/messages/list',$data);
    }

    public  function delete($id_message){
        Messages::find($id_message)->delete();
        return redirect('/admin/messages')->with('status', 'messages Deleted !');;
    }

}
