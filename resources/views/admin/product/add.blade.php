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
                  <form class="form-sample" action="/admin/product/action_add" method="post" enctype="multipart/form-data">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Judul</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="form[title]"/>
                          </div>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gambar</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" name="file"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kategori</label>
                          <div class="col-sm-9">
                          <select class="form-control" id="exampleFormControlSelect2" name="form[id_product_category]">
                            @foreach($productCategory as $key)
                      <option value="{{$key->id_product_category}}">{{$key->category_name}}</option>
                      @endforeach
                    </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Harga</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="form[price]"/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Desckripsi</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="form[description]"   id="summernoteExample"></textarea>
                          </div>
                        </div>
                      </div>


                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="/admin/product">Cancel</a>

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