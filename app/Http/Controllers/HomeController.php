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
        // $testimonial = Settings::whereName('testimonial')->first();
        $data['email'] = Settings::whereName('email')->first();
        $data['phone'] = json_decode($phone->value);
        $data['address'] = json_decode($address->value);
        $data['social_media'] = json_decode($social_media->value);
        // $data['testimonial'] = json_decode($testimonial->value);
        $data['testimonial'] = Gallery::whereGroup(1)->get();
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
        })->where('sub_category', '=', '')->get();
      

        $data['sub_product'] = Product::whereHas('productCategory', function ($query) use($category) {
        $query->where('category_name', '=', $category);
        })->where('sub_category', '!=', '')->get();

        $data['sub_product'] = Product::whereSubCategory($subCategory)->get();

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


    public function sub_product($subCategory)
    {
        $subCategory= str_replace('-',' ',$subCategory);
        $data['category']= $subCategory;
        $data['title'] = $subCategory;
        $data['product'] = Product::whereSubCategory($subCategory)->get();
      
        $data['productCategory'] = ProductCategory::get();
        $phone = Settings::whereName('phone')->first();
        $address = Settings::whereName('address')->first();
        $social_media = Settings::whereName('social_media')->first();
        $data['email'] = Settings::whereName('email')->first();
        $data['phone'] = json_decode($phone->value);
        $data['address'] = json_decode($address->value);
        $data['social_media'] = json_decode($social_media->value);
        return view('sub_product',$data);
    }


    public function detail($title){
    $title= str_replace('_',' ',$title);
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

     

}
