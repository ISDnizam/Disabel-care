@extends('layouts/admin/master') @section('title', "$title") @section('content') @php $social_media = json_decode($edit->value); $i=0; @endphp

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

                            @foreach($social_media as $key)
                            @php $i++;
                            @endphp
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Social Media</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="" value="{{$key->type}}" disabled/>
                                        <input type="text" class="form-control" name="value[{{$i}}][type]" value="{{$key->type}}" hidden/>
                                        <input type="text" class="form-control" name="value[{{$i}}][icon]" value="{{$key->icon}}" hidden/>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Url</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="value[{{$i}}][url]" value="{{$key->url}}" />
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a class="btn btn-light" href="/admin/setting">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
