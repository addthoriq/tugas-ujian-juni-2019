@extends('layouts.app')
@section('title','Kategori Buku')
@section('css')
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Kategori Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{route('home.index')}}>Beranda</a></li>
              <li class="breadcrumb-item"><a href={{route('member.index')}}>Kategori Buku</a></li>
              <li class="breadcrumb-item active">Tambah Kategori Buku</a></li>
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
            <a href="{{route('member.index')}}" class="btn btn-warning btn-sm text-white"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>
      <!-- /.card-body -->
        <div class="card-body">

            {!! form_start($form) !!}
            {!! form_row($form->name)!!}
            {!! form_row($form->number_phone)!!}
            {!! form_row($form->address)!!}
            {!! form_row($form->gender)!!}
            {!! form_row($form->place_of_birth)!!}
            {!! form_row($form->date_of_birth)!!}

        </div>

        <div class="card-footer">

            {!! form_rest($form) !!}

        </div>

            {!! form_end($form, $renderRest = true) !!}

      </div>

    </section>
    <!-- /.content -->
@endsection
