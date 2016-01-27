@extends('layouts.admin.index')
@section('content')
@include('addons.alert')
<div class="box box-primary">
   <div class="box-header">
    <h3 class="box-title">
        <i class="fa fa-plus-square-o"></i> Ubah Program Studi
    </h3>
</div><!-- /.box-header --> 
<hr/>
<div class="box-body"> 
    {{Form::open(array('class'=>'form-horizontal','url'=>'administrator/prodi/update' . $prodi->kode_prodi)) }}        
    <div class="form-group">
        <div class="col-sm-2">
            {{Form::label('kode_prodi','Kode Prodi')}}
        </div>
        <div class="col-lg-10"> 
            {{ Form::text('kode_prodi',$prodi->kode_prodi, array('class' => 'form-control','required','placeholder'=>'kode_prodi')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2">
            {{Form::label('jenjang','Jenjang')}}
        </div>
        <div class="col-lg-10"> 
            {{ Form::text('jenjang',$prodi->jenjang, array('class' => 'form-control','required','placeholder'=>'jenjang')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2">
            {{Form::label('jurusan','Jurusan')}}
        </div>
        <div class="col-lg-10"> 
            {{ Form::text('jurusan',$prodi->jurusan, array('class' => 'form-control','required','placeholder'=>'jurusan')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2">
            {{Form::label('nama_prodi','Nama Prodi')}}
        </div>
        <div class="col-lg-10"> 
            {{ Form::text('nama_prodi',$prodi->nama_prodi, array('class' => 'form-control','required','placeholder'=>'nama prodi')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            {{ Form::submit('Ubah', array('class' => 'btn btn-primary','style'=>'width: 120px;')) }}
            <a href="{{ URL::to('administrator/prodi') }}" class="btn btn-danger" style="width : 120px">Batal</a>
        </div>
    </div>         
    {{Form::close()}}        
</div>
</div>
@stop