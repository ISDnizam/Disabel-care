<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Settings;
use App\Gallery;
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
        $data['product'] = Product::get();
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

    public function detail($id_product){
    $data['product'] = Product::get();
    $data['detail'] = Product::findOrFail($id_product);
    $data['phone'] = Settings::whereName('phone')->first();
    $data['email'] = Settings::whereName('email')->first();
    $data['address'] = Settings::whereName('address')->first();
    $data['title'] = "Detail Product - ".$data['detail']->title;
    return view('product_detail',$data);
    }
}
