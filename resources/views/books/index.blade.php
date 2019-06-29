@extends('layouts.app')
@section('title','Daftar Buku')
@section('css')
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home.index')}}>Beranda</a></li>
              <li class="breadcrumb-item active">Daftar Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">

        <div class="card-header">
            <a href="{{route('book.create')}}" class="btn btn-warning btn-sm text-white"><i class="fas fa-plus-circle"></i> Tambah</a>
        </div>
      <!-- /.card-body -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th width="5%">No</th>
                 <th>Kategori</th>
                 <th>Penulis</th>
                 <th>Judul</th>
                 <th>Penerbit</th>
                 <th>Jumlah</th>
                 <th>Tahun terbit</th>
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
    <script src="{{asset('adminlte3/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminlte3/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script type="text/javascript">
    var table;
    $(function() {
        table = $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{$ajax}}',
            order: [[0,'asc']],
            columns: [
                { data: 'id', searchable: true, orderable: true},
                { data: 'category_id', searchable: true, orderable: true},
                { data: 'author', searchable: true, orderable: true},
                { data: 'title', searchable: true, orderable: true},
                { data: 'publisher', searchable: true, orderable: true},
                { data: 'quantity', searchable: true, orderable: true},
                { data: 'year_of_released', searchable: true, orderable: true},
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
