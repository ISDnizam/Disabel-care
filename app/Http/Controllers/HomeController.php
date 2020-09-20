<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Settings;
use App\Gallery;
use App\ProductCategory;

use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title'] = "Homepage";
        $data['productCategory'] = ProductCategory::get();
        $phone = Settings::whereName('phone')->first();
        $address = Settings::whereName('address')->first();
        $social_media = Settings::whereName('social_media')->first();
        $testimonial = Settings::whereName('testimonial')->first();
        $data['email'] = Settings::whereName('email')->first();
        $data['phone'] = json_decode($phone->value);
        $data['address'] = json_decode($address->value);
        $data['social_media'] = json_decode($social_media->value);
        $data['testimonial'] = json_decode($testimonial->value);
        return view('home',$data);
    }

    public function about()
    {
        $data['title'] = "Tentang Kami";
        $data['productCategory'] = ProductCategory::get();

        $phone = Settings::whereName('phone')->first();
        $address = Settings::whereName('address')->first();
        $social_media = Settings::whereName('social_media')->first();
        $data['email'] = Settings::whereName('email')->first();
        $data['about'] = Settings::whereName('about')->first();
        $data['phone'] = json_decode($phone->value);
        $data['address'] = json_decode($address->value);
        $data['social_media'] = json_decode($social_media->value);
        return view('about',$data);
    }

    public function contact()
    {
        $data['title'] = "Hubungi Kami";
        $phone = Settings::whereName('phone')->first();
        $data['productCategory'] = ProductCategory::get();

        $address = Settings::whereName('address')->first();
        $social_media = Settings::whereName('social_media')->first();
        $operational = Settings::whereName('operational_hours')->first();
        $data['email'] = Settings::whereName('email')->first();
        $data['phone'] = json_decode($phone->value);
        $data['address'] = json_decode($address->value);
        $data['social_media'] = json_decode($social_media->value);
        $data['operational'] = json_decode($operational->value);
        return view('contact',$data);
    }

    public function gallery()
    {
        $data['title'] = "Gallery";
        $data['productCategory'] = ProductCategory::get();

        $phone = Settings::whereName('phone')->first();
        $address = Settings::whereName('address')->first();
        $social_media = Settings::whereName('social_media')->first();
        $data['email'] = Settings::whereName('email')->first();
        $data['gallery'] = Gallery::get();
        $data['phone'] = json_decode($phone->value);
        $data['address'] = json_decode($address->value);
        $data['social_media'] = json_decode($social_media->value);
        return view('gallery',$data);
    }
    public function product($productCategory)
    {
        $category= str_replace('-',' ',$productCategory);
        $data['category']= $category;
        $data['title'] = $category;
        $data['product'] = Product::whereHas('productCategory', function ($query) use($category) {
        $query->where('category_name', '=', $category);
        })->get();
      
        $data['productCategory'] = ProductCategory::get();
        $phone = Settings::whereName('phone')->first();
        $address = Settings::whereName('address')->first();
        $social_media = Settings::whereName('social_media')->first();
        $data['email'] = Settings::whereName('email')->first();
        $data['phone'] = json_decode($phone->value);
        $data['address'] = json_decode($address->value);
        $data['social_media'] = json_decode($social_media->value);
        return view('product',$data);
    }

    public function detail($title){
    $title= str_replace('-',' ',$title);
    $data['title'] = $title;
    $data['detail'] = Product::with("productCategory")->where('title','=',$title)->first();
    $data['otherProduct'] = Product::with("productCategory")->where('id_product_category','=',$data['detail']->id_product_category)->get();
    $data['productCategory'] = ProductCategory::get();
    $phone = Settings::whereName('phone')->first();
    $address = Settings::whereName('address')->first();
    $social_media = Settings::whereName('social_media')->first();
    $data['email'] = Settings::whereName('email')->first();
    $data['phone'] = json_decode($phone->value);
    $data['address'] = json_decode($address->value);
    $data['social_media'] = json_decode($social_media->value);
    return view('product_detail',$data);
    }

     
    public function send_tistimonial(Request $request,$name){
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
