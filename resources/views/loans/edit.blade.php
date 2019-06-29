@extends('layouts.app')
@section('title','Peminjaman Buku')
@section('css')
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Peminjaman Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home.index')}}>Beranda</a></li>
              <li class="breadcrumb-item"><a href={{route('loan-book.index')}}>Peminjaman Buku</a></li>
              <li class="breadcrumb-item active">Edit Data</a></li>
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
            <a href="{{route('loan-book.index')}}" class="btn btn-warning btn-sm text-white"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>
      <!-- /.card-body -->
        <div class="card-body">

            {!! form_start($form) !!}
            {!! form_row($form->member_id, $option = ['selected' => $loans->member_id])!!}
            {!! form_row($form->book_id, $option = ['selected' => $loans->book_id])!!}
            {!! form_row($form->quantity, $option = ['value' => $loans->quantity])!!}
            {!! form_row($form->status, $option = ['selected' => $loans->status])!!}
            {!! form_row($form->period_loan, $option = ['value' => $loans->period_loan])!!}
            {!! form_row($form->date_of_loan, $option = ['value' => $loans->date_of_loan])!!}
            {!! form_row($form->return_of_loan, $option = ['value' => $loans->return_of_loan])!!}

        </div>

        <div class="card-footer">

            {!! form_rest($form) !!}

        </div>

            {!! form_end($form, $renderRest = true) !!}

      </div>

    </section>
    <!-- /.content -->
@endsection
@section('script')
<script src="{{asset('adminlte3/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
        $('.select2').select2()
    })
</script>
@endsection
