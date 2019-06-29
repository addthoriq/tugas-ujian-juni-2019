@extends('layouts.app')
@section('title','Daftar Buku')
@section('css')
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Daftar Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home.index')}}>Beranda</a></li>
              <li class="breadcrumb-item"><a href={{route('book.index')}}>Daftar Buku</a></li>
              <li class="breadcrumb-item active">Tambah Daftar Buku</a></li>
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
            <a href="{{route('book.index')}}" class="btn btn-warning btn-sm text-white"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>
      <!-- /.card-body -->
        <div class="card-body">

            {!! form_start($form) !!}
            {!! form_row($form->category_id, $option = ['selected' => $books->category_id])!!}
            {!! form_row($form->isbn, $option = ['value' => $books->isbn])!!}
            {!! form_row($form->author, $option = ['value' => $books->author])!!}
            {!! form_row($form->title, $option = ['value' => $books->title])!!}
            {!! form_row($form->publisher, $option = ['value' => $books->publisher])!!}
            {!! form_row($form->place_of_released, $option = ['value' => $books->place_of_released])!!}
            {!! form_row($form->year_of_released, $option = ['value' => $books->year_of_released])!!}
            {!! form_row($form->quantity, $option = ['value' => $books->quantity])!!}

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
