@extends('layouts.app') 
@section('content')
<div class="head_panel">
                <div id="map" class="map"></div>
                <div class="hgroup">
                    <div class="title diagonal-bgcolor-trans">
                        <div class="container">
                            <h1>{{ $title }}</h1>
                        </div>
                    </div>
                    <div class="subtitle body-bg_section">
                        <div class="container">
                            <p>Untuk pemesanan atau konsultasi silakan datang/hubungi kami</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="brand-colors"></div>
            <div class="main foo" data-colorset="foo">
                <section class="vc_row wpb_row vc_row-fluid no_padding">
                    <div class="container">
                        <div class="row">
                            
                            <div class="wpb_column vc_column_container col-sm-6 col-md-6 boxed_plus">
                                <div class="wpb_wrapper">
                                    <div class="vc_empty_space" style="height: 64px;"><span class="vc_empty_space_inner"></span></div>
                                    <div class="wpb_single_image wpb_content_element vc_align_left">
                                        <figure class="wpb_wrapper vc_figure">
                                            <div class="vc_single_image-wrapper vc_box_border_grey">
                                                <img width="103" height="100" src="/assets/theme/images/icon_med_book.png" class="vc_single_image-img attachment-medium" alt="" />
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="vc_separator wpb_content_element vc_separator_align_left vc_sep_width_100 vc_sep_pos_align_center vc_sep_color_grey vc_separator-has-text">
                                        <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
                                        <h4>Kontak</h4>
                                        <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                                    </div>
                                    <div class="wpb_text_column wpb_content_element">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element">
                                                <div class="wpb_wrapper">
                                                   @foreach($phone as $key=>$value)
                                                    <p><strong>{{$value}} (<a href="tel:{{$value}}">Phone</a>/<a href="https://wa.me/{{$value}}?text=Hallo,%20saya%20ingin%berkonsultasi%20">Whatsapp</a>)</strong></p>
                                                    @endforeach
                                                    <p><strong>{{$email->value}}</strong></p>
                                                    <p>
                                                        <strong>	
                                                        @foreach ($address as $key)
                            <p>
                                       {{$key->location}}<br />
                                            {{$key->address}}
                                            </p>
                                        @endforeach
                                                        </strong>
                                                    </p>

                                                    <aside id="plethora-aboutus-widget-2" class="widget aboutus-widget">
                                                        <div class="pl_about_us_widget  ">
                                                            <p class="social">
                                                            @foreach ($social_media as $key)
                                                            <a href="{{$key->url}}" target="_blank" title="{{$key->type}}"><i class="{{$key->icon}}"></i></a>
                                                            @endforeach
                                                            </p>
                                                        </div>
                                                        </aside>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="wpb_column vc_column_container col-sm-6 col-md-6 boxed_plus">
                                <div class="wpb_wrapper">
                                    <div class="vc_empty_space" style="height: 64px;"><span class="vc_empty_space_inner"></span></div>
                                    <div class="wpb_single_image wpb_content_element vc_align_left">
                                        <figure class="wpb_wrapper vc_figure">
                                            <div class="vc_single_image-wrapper vc_box_border_grey">
                                                <img width="103" height="100" src="/assets/theme/images/icon_med_book.png" class="vc_single_image-img attachment-medium" alt="" />
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="vc_separator wpb_content_element vc_separator_align_left vc_sep_width_100 vc_sep_pos_align_center vc_sep_color_grey vc_separator-has-text">
                                        <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
                                        <h4>Jam Operasional</h4>
                                        <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                                    </div>
                                    <div class="wpb_text_column wpb_content_element">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element">
                                                <div class="wpb_wrapper">
                                                    <div class="timetable">
                                                        <table class="timetable_hours">
                                                           @foreach($operational as $key)
                                                            <tr>
                                                                <td>{{$key->day}}</td>
                                                                <td>{{$key->hour}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              
                                </div>
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
         <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDWbH8y7NLi_pX0DbGDvvS4B9dRlNKzds4'></script>
        <script type='text/javascript'>
        /* <![CDATA[ */
        var themeConfig = {"GENERAL":{"debug":false,"onePagerScrollSpeed":300},"GOOGLE_MAPS":{"maps":[{"id":"map","lat":"-6.219159","lon":"106.8986125","desc":"","type":"ROADMAP","pins_enabled":false,"zoom":14,"marker":true,"markerTitle":"We are right here!","infoWindow":"","markerImageSrc":"","markerImageWidth":"","markerImageHeight":"","markerAnchorX":"","markerAnchorY":"","markerType":"animated","type_switch":true,"type_switch_style":"DROPDOWN_MENU","type_switch_position":"TOP_RIGHT","pan_control":true,"pan_control_position":"RIGHT_CENTER","zoom_control":true,"zoom_control_style":"SMALL","zoom_control_position":"LEFT_CENTER","scrollWheel":false,"styles":null,"disableDefaultUI":false,"scale_control":false,"animatedMarker":true}]},"NEWSLETTERS":{"messages":{"successMessage":"SUCCESS","errorMessage":"ERROR","required":"This field is required.","remote":"Please fix this field.","url":"Please enter a valid URL.","date":"Please enter a valid date.","dateISO":"Please enter a valid date ( ISO ).","number":"Please enter a valid number.","digits":"Please enter only digits.","creditcard":"Please enter a valid credit card number.","equalTo":"Please enter the same value again.","name":"Please specify your name","email":{"required":"We need your email address to contact you","email":"Your email address must be in the format of name@domain.com"}}},"PARTICLES":{"enable":true,"color":"#bcbcbc","opacity":0.8,"bgColor":"transparent","bgColorDark":"transparent","colorParallax":"#4D83C9","bgColorParallax":"transparent"}};
        /* ]]> */
        </script>
        <script type='text/javascript' src='https://plethorathemes.com/healthflex/wp-content/themes/healthflex/includes/core/assets/js/libs/googlemaps/googlemaps.min.js'></script>
   
@endsection