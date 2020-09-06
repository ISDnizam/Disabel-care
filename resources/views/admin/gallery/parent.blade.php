@extends('layouts/admin/master')
@section('title', "$title")
@section('content')

    <!-- partial -->
        <div class="content-wrapper">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@mdo"  style="margin-bottom:20px">Tambah Gallery</button>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$title}}</h4>
              <div class="row">
                <div class="col-12">
                  @if ($message = Session::get('success'))
                   <div class="alert alert-fill-success" role="alert">
                    <i class="ti-info-alt"></i>
                    {{ $message }}
                  </div>
                    @endif
             
                    @if ($message = Session::get('failed'))
                    <div class="alert alert-fill-danger" role="alert">
                      <i class="ti-info-alt"></i>
                      {{ $message }}
                    </div>
                    @endif

                    <div class="row portfolio-grid">

                    @foreach($gallery as $key)
						@if($key->type=='image')
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                          <figure class="effect-text-in">
                            <img src="{{$key->full_path}}" alt="image"/>
                            <figcaption>
                              <h4>{{$key->name}}</h4>
                              <p><a href="/admin/gallery/delete/{{$key->id_gallery}}" class="btn btn-danger pull-right btn-sm">Hapus</a></p>
                            </figcaption>
                          </figure>
                        </div>
                        @endif
                    @endforeach

                      </div>
                </div>
              </div>
            </div>
          </div>


          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Video</h4>
              <div class="row">
                <div class="col-12">
                    <div class="row portfolio-grid">

                    @foreach($gallery as $key)
						@if($key->type=='video')
                        <div class="col-sm-4 col-md-4">
                                <iframe width="100%" height="300" src="{{$key->full_path}}"> </iframe>
                              <p style="text-align:-webkit-center"><a href="/admin/gallery/delete/{{$key->id_gallery}}" class="btn btn-danger pull-right btn-sm">Hapus</a></p>

                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

<div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form class="form-sample" action="/admin/gallery/action_add" method="post" enctype="multipart/form-data"> 
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
    <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type:</label>
            <select class="form-control" id="type" name="type" onchange="setType()">
            <option value="image">Foto</option>
            <option value="video">Video</option>
            </select>
        </div>
        <div id="form_image">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Judul:</label>
                <input type="text" class="form-control" id="recipient-name"  name="name">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Foto:</label>
                <input type="file" class="form-control" name="file"  accept=".jpg,.jpeg,.png"/>
            </div>
        </div>

        <div id="form_video">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Url:</label>
                <input type="text" class="form-control" id="recipient-name"  name="full_path">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
    </div>
    </form>
    </div>
</div>
</div>


<script>
    (function($) {
        $('#form_image').show();
        $('#form_video').hide();
  'use strict';
  $('#exampleModal-4').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var modal = $(this)
    modal.find('.modal-title').text('Tambah Gallery')
  })
})(jQuery);

function setType(){
    var type =$('#type').val();
    if(type=='video'){
        $('#form_image').hide();
        $('#form_video').show();
    }else{
        $('#form_image').show();
        $('#form_video').hide();
    }
}
</script>
@endsection