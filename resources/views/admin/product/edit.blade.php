<link rel="stylesheet" href="http://www.urbanui.com/justdo/template/vendors/summernote/dist/summernote-bs4.css">
   <!-- End plugin css for this page -->
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
                  <form class="form-sample" action="{{ route('product.edit', $edit->id_product) }}" method="post"  enctype="multipart/form-data">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Judul Produk</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="form[title]" value="{{$edit->title}}"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kategori</label>
                          <div class="col-sm-9">
                          <select class="form-control" id="categoryProduct" name="form[id_product_category]">
                            @foreach($productCategory as $key)
                            <option value="{{$key->id_product_category}}"  @if ($edit->id_product_category == $key->id_product_category)  selected @endif >{{$key->category_name}}</option>
                            @endforeach
                          </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Harga</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="form[price]" value="{{$edit->price}}"/>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gambar</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" name="file"/>
                          </div>
                        </div>
                       
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Deskripsi</label>
                          <div class="col-sm-9">
                          <!-- <div id="quillExample1" class="quill-container">
                          {{$edit->description}}
                          </div> -->
                          <textarea class="form-control" name="form[description]"  id="summernoteExample">{{$edit->description}}</textarea>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        @if ($edit->image !== '')
                            <img src="{{$edit->image}}" style="width: 100%; height: 500px"  >
                        @endif
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