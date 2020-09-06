@extends('layouts/admin/master') @section('title', "$title") @section('content')

<!-- partial -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if ($message = Session::get('success'))
                   <div class="alert alert-fill-success" role="alert">
                    <i class="ti-info-alt"></i>
                    {{ $message }}
                  </div>
                    @endif
                    <form class="form-sample" action="{{ route('settings.edit', $edit->name) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
                        <div class="row">
                            <input type="text" class="form-control" name="form[name]" value="{{$edit->name}}" hidden />

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">About</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="value"  id="summernoteExample">{{$edit->value}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a class="btn btn-light" href="/admin/setting">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- plugin js for this page -->
  <script src="http://www.urbanui.com/justdo/template/vendors/summernote/dist/summernote-bs4.min.js"></script>
  <!-- Custom js for this page-->
  <script src="http://www.urbanui.com/justdo/template/js/editorDemo.js"></script>
@endsection
