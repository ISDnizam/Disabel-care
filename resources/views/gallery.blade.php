@extends('layouts.app') @section('content')
<div class="head_panel">
    <div style="background-image: url(/assets/theme/images/slider-6.jpg);" class="full_width_photo bg_vtop parallax-window">
        <div class="hgroup">
            <div class="title diagonal-bgcolor-trans">
                <div class="container">
                    <h1>Gallery</h1>
                </div>
            </div>

            <div class="subtitle body-bg_section">
                <div class="container">
                    <p>Berikut adalah gallery list produk kami, beberapa adalah yang sudah dipesan oleh client kami.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="brand-colors"></div>
<div class="main foo" data-colorset="foo">
    <section class="vc_row wpb_row vc_row-fluid">
        <div class="container">
            <div class="row">
                <div class="vc_separator wpb_content_element vc_separator_align_left vc_sep_width_100 vc_sep_pos_align_center vc_sep_color_grey vc_separator-has-text">
                    <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
                    <h4>Foto</h4>
                    <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                </div>
                <div class="team_members_grid row">
                    @foreach($gallery as $key)
						@if($key->type=='image')
                            <div class="col-sm-6 col-md-4">
                                <div class="team_member teaser_box centered same_height_col white_section" style="margin-bottom:20px">
                                    <a
                                        href="{{$key->full_path}}"
                                        class="linkify figure stretchy_wrapper ratio_1-1" target="_blank">
                                        <img src="{{$key->full_path}}"  alt="" style="width:100%; height:100%">
                                        </a>

                                    <div class="content boxed with_button">
                                        <div class="hgroup">
                                            <strong>{{$key->name}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div style="margin-top: 80px;" class="vc_separator wpb_content_element vc_separator_align_left vc_sep_width_100 vc_sep_pos_align_center vc_sep_color_grey vc_separator-has-text">
                    <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
                    <h4>Video</h4>
                    <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                </div>
                <div class="team_members_grid row">
                    @foreach($gallery as $key)
						@if($key->type=='video')
                            <div class="col-sm-6 col-md-6">
                                <iframe width="100%" height="300" src="{{$key->full_path}}"> </iframe>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
<section style="background-image: url('/assets/theme/images/doctor_blue_left.jpg');" class="vc_row wpb_row vc_row-fluid secondary_section text-center transparent_film vcenter bgimage bg_vcenter">
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
