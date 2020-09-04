@extends('layout/admin/master')
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
                  <form class="form-sample" action="{{ route('user.edit', $edit->id) }}" method="post">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{$edit->name}}"/>
                          </div>
                        </div>

                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{$edit->email}}"/>
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level</label>
                          <div class="col-sm-9">
                            <select name="status" class="form-control" id="status">
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                            </select>
                          </div>
                        </div>

                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="/admin/users">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>

  <script src="/assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="/assets/admin/vendors/js/vendor.bundle.addons.js"></script>
  <script type="text/javascript">
  $('#status').val('{{$edit->status}}')
</script>
@endsection