@extends('layouts/admin/master')
@section('title', "$title")
@section('content')
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
                  <form class="form-sample" action="{{ route('settings.edit', $edit->id_setting) }}" method="post"  enctype="multipart/form-data">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pengaturan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="form[title]" value="{{$edit->name}}" disabled/>
                          </div>
                        </div>
                      </div>

                        <div class="col-md-6">

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Value</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="form[value]" value="{{$edit->value}}" />
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

  <script src="/assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="/assets/admin/vendors/js/vendor.bundle.addons.js"></script>
@endsection