@extends('layout/admin/master')
@section('title', "$title")
@section('content')

    <!-- partial -->
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{$title}}</h4>
              <div class="row">
                <div class="col-12">
                  @if (session('status'))
                      <div class="alert alert-fill-success" role="alert">
                      <i class="ti-info-alt"></i>
                          {{ session('status') }}
                      </div>
                  @endif
                  <div class="table-responsive">
                    <table id="order-listingD" class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Status</th>
            							<th>Created At</th>
            							<th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
						            @foreach($list as $p)
                        <tr>
                          <td>{{ $p->name }}</td>
                          <td>{{ $p->email }}</td>
                          <td>{{ $p->status }}</td>
            							<td>{{ $p->created_at }}</td>
            							<td>
            								<a href="/admin/users/edit/{{ $p->id }}"  class="btn btn-warning">Edit</a>
              							<a href="/admin/users/delete/{{ $p->id }}"  class="btn btn-danger">Delete</a>
            							</td>
                        </tr>
            						@endforeach
                      </tbody>
                    </table>
                       {!! $list->links() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

  <script src="/assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="/assets/admin/vendors/js/vendor.bundle.addons.js"></script>

        <script type="text/javascript">
          
          (function($) {
            'use strict';
            $(function() {
              $('#order-listing').DataTable({
                "aLengthMenu": [
                  [5, 10, 15, -1],
                  [5, 10, 15, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                  search: ""
                }
              });
              $('#order-listing').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
              });
            });
          })(jQuery);
        </script>

@endsection