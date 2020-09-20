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
                    <p>Mari Lawan Keterbatasan Tanpa Batas</p>
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
                <div class="wpb_column vc_column_container col-sm-12 col-md-6 margin_bottom_grid">
                    <div class="wpb_wrapper">
                        <div class="wpb_text_column wpb_content_element">
                            <div class="wpb_wrapper">
                                <p>
                                  {!! $about->value !!}
                                </p>
                            </div>
                        </div>
                        <div class="vc_separator wpb_content_element vc_separator_align_left vc_sep_width_100 vc_sep_pos_align_center vc_sep_color_grey vc_separator-has-text">
                            <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
                            <h4>Lokasi</h4>
                            <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                        </div>
                        <div class="wpb_text_column wpb_content_element">
                            <div class="wpb_wrapper">
                            @foreach ($address as $key)
                            <p>
                                       {{$key->location}}<br />
                                            {{$key->address}}
                                            </p>
                                        @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wpb_column vc_column_container col-sm-12 col-md-6">
                    <div class="wpb_wrapper">
                        <div class="wpb_video_widget wpb_content_element vc_clearfix vc_video-aspect-ratio-169 vc_video-el-width-100 vc_video-align-left">
                            <div class="wpb_wrapper">
                                <div class="wpb_video_wrapper">
                                    <iframe width="420" height="315" src="https://www.youtube.com/embed/5v75wULnVvY?autoplay=1"> </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section
        style="background-image: url('/assets/images/slide.jpg');"
        class="vc_row wpb_row vc_row-fluid secondary_section text-center transparent_film vcenter bgimage bg_vcenter"
    >
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
