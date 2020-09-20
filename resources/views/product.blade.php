@extends('layouts.app') @section('content')

<div class="head_panel">
    <div style="background-image: url(/assets/theme/images/slider-6.jpg);" class="full_width_photo bg_vtop parallax-window">
        <div class="hgroup">
            <div class="title diagonal-bgcolor-trans">
                <div class="container">
                    <h1>{{ $title }}</h1>
                </div>
            </div>

            <div class="subtitle body-bg_section">
                <div class="container">
                    <p>Beberapa {{ $title }} yang kami buat</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brand-colors"></div>
<div class="main foo" data-colorset="foo">
    <section class="vc_row wpb_row vc_row-fluid text-center separator_bottom sep_angled_positive_bottom">
        <div class="container">
            <div class="row">
               @foreach($product as $key)
                <div class="wpb_column vc_column_container col-sm-4" style="margin-top:20px">
                    <div class="wpb_wrapper">
                        <div class="pricing_plan white_section">
                            <div class="stretchy_wrapper ratio_16-9" style="height:350px">
                                <div  class="pricing_plan_photo">
                                <img src="{{$key->image}}" id="bg" alt="" style="width:100%; height:100%"></div>
                                <div class="heart beating">
                                    <div class="heart-inner"><div class="heart-label"></div></div>
                                </div>
                            </div>

                            <div class="plan_title skincolored_section" style="padding:5px">
                                <h5>{{$key->title}}</h5>
                            </div>
                            <div class="the_offerings">

                                <a href="/product/detail/{{str_replace(' ','_',$key->title)}}" class="btn btn-primary with-icon icon-right" title="" target="_self">
                                        Lihat Detail
                                    <i class="fa fa-caret-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>

    
    <section
        style="background-image: url('/assets/images/slide.jpg');"
        class="vc_row wpb_row vc_row-fluid secondary_section text-center transparent_film vcenter bgimage bg_vcenter">
        <div class="container">
            <div class="row">
                <div class="wpb_column vc_column_container col-sm-12 text-center">
                    <div class="wpb_wrapper">
                        <div class="section_header subtitle_bottom fancy text-center">
                            <h2>Butuh kaki palsu dengan kualitas terbaik ?</h2>

                            <!-- <p >Hubungi kami di </p> -->
                        </div>
                        <div class="plethora_button wpb_content_element text-center">
                            <a href="/contact" debug class="btn btn-success with-icon" title="" target="_self">
                                Hubungi Kami
                                <i class="fa fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
