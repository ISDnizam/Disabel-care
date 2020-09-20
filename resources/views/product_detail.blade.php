@extends('layouts.app') @section('content')

<div class="head_panel">
    <div style="background-image: url({{$detail->image}});" class="full_width_photo bg_vtop parallax-window">
        <div class="hgroup">
            <div class="title diagonal-bgcolor-trans">
                <div class="container">
                    <h1>{{ $title }}</h1>
                </div>
            </div>

            <div class="subtitle body-bg_section">
                <div class="container">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="brand-colors"></div>
<div class="main foo" data-colorset="foo">
    <section class="sidebar_on padding_top_half">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8 main_col">
                    <article id="terminology-291" class="post post-291 terminology type-terminology status-publish has-post-thumbnail hentry term-topic-health-library">
                        <div class="post_figure_and_info">
                            <div class="post_sub">
                                <span class="post_info post_date"><i class="fa fa-calendar"></i>{{$detail->created_at}}</span>
                                <span class="post_info post_categories">{{$detail->productCategory->category_name}}</span>
        						@if($detail->price!=0)
                                <span class="post_info post_author">Rp {{number_format($detail->price,0)}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hidden-md hidden-lg">
                            <a href="{{$detail->image}}" debug title="" target="">
                                <div style="height:350px">  <img src="{{$detail->image}}" id="bg" alt="" style="width:100%; height:100%"></div>
                            </a>
                        </div>
                        <p>
                        {!!$detail->description!!}
                        

                        <a href="https://wa.me/+6285800799904?text=Hallo,%20saya%20ingin%20memesan%20{{ $title }}" debug class="btn btn-primary with-icon" title="" target="_self">
                            Pesan Sekarang
                        </a>
                    </article>
                </div>
                <div id="sidebar" class="col-sm-4 col-md-4">
                    <!-- ===================== MULTIBOX ========================-->
                    <div class="widget plethora-multibox-widget bg_vcenter hidden-xs">
                        <div class="">
                            <!-- ========================== TEASER BOX ==========================-->
                            <div class="teaser_box wpb_content_element text-left skincolored_section with_button">
                                <div class="figure">
                                    <a href="{{$detail->image}}" debug title="" target="">
                                        <div class="figure stretchy_wrapper ratio_16-9">  <img src="{{$detail->image}}" id="bg" alt="" style="width:100%; height:100%"></div>
                                    </a>
                                </div>
                            </div>

                            <!-- END======================= TEASER BOX ==========================-->
                        </div>
                    </div>

                    <aside id="categories-3" class="widget widget_categories">
                        <h4>Produk Lainnya</h4>
                        <ul>
                            @foreach($otherProduct as $key)
                            <li class="cat-item cat-item-9" style="border-bottom:1px solid #dadada"><a href="/product/detail/{{str_replace(' ','_',$key->title)}}" title='{{$key->title}}'>{{$key->title}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
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
