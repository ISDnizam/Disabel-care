<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use File;
use Session;
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']); 
    }

    public function index(){
        $data['title'] = "Dashboard";
        $data['list'] = Product::all();
        return view('admin/dashboard',$data);
    }

}
