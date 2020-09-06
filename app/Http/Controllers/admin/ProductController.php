<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\Product;
use App\ProductCategory;
use App\Settings;
use File;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']); 
    }

    public function index(){
        $data['title'] = "Daftar Produk";
        $data['list'] = Product::with("productCategory")->orderBy('id_product', 'desc')->get();
        $data['settings'] = Settings::all();
        return view('admin/product/list',$data);
    }

    public  function  add(){
        $data['title'] = "Tambah Produk";
        $data['productCategory'] = ProductCategory::get();
        $data['settings'] = Settings::all();
        return view('admin/product/add',$data);
    }

    public function action_add(Request $request){
        $form = $request->input('form');

        $file = $request->file('file');
        if(!empty($file)){
        $path_upload = 'assets/images';
        $form['image'] = '/'.$path_upload.'/'.$file->getClientOriginalName();
        $file->move($path_upload,$file->getClientOriginalName());
        }
        Product::create($form);
        Session::flash('success','Sukses menambahkan produk');
        return redirect('/admin/product');
    }


    public  function edit($id_product){
        $data['title'] = "Edit Produk";
        $data['productCategory'] = ProductCategory::get();
        $data['settings'] = Settings::all();
        $data['edit'] = Product::find($id_product);
        return view('admin/product/edit',$data);
    }

    public function action_edit(Request $request,$id_product){
        $form = $request->input('form');
        $file = $request->file('file');
        $this->validate($request,
        [
        'form.title' => 'required', 
        ]);

        if(!empty($file)){
        $path_upload = 'assets/images';
        $form['image'] = '/'.$path_upload.'/'.$file->getClientOriginalName();
        $file->move($path_upload,$file->getClientOriginalName());
        }        
        Product::find($id_product)->update($form);
        Session::flash('success','Sukses mengupdate produk');
        return redirect('/admin/product');
    }

    public  function delete($id_product){
        $product =Product::find($id_product);
        if(!empty($product->image)){
        $path = str_replace('/assets', 'assets',$product->image);
        File::delete($path);
        }

        Product::find($id_product)->delete();
        Session::flash('success','Sukses Menghapus Produk');
        return redirect()->back();
    }
   

}
