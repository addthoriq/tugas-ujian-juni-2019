@extends('layouts.app')
@section('title','Kategori Buku')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">

      <!-- /.card-body -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-hover">
               <thead>
               <tr>
                 <th width="5%">No</th>
                 <th>Category Name</th>
                 <th>Created At</th>
                 <th>Action</th>
               </tr>
               </thead>
               <tbody>
               </tbody>
           </table>

        </div>

      </div>

    </section>
    <!-- /.content -->
@endsection
@section('script')
@section('script')
  <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/custom.js') }}"></script>
  <script type="text/javascript">
    var table;
    $(function() {
        table = $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{$ajax}}',
            order: [[2,'desc']],
            columns: [
                { data: 'id', searchable: true, orderable: true},
                { data: 'name', searchable: true, orderable: true},
                { data: 'created_at', searchable: true, orderable: true},
                { data: 'action', searchable: false, orderable: false}
            ],
            columnDefs: [{
              "targets": 0,
              "searchable": false,
              "orderable": false,
              "data": null,
              "title": 'No',
              "render": function (data, type, full, meta) {
                  return meta.settings._iDisplayStart + meta.row + 1;
              }
            }],
        });
    });
  </script>
@endsection
