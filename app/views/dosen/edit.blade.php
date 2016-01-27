@extends('layouts.admin.index')
@section('content')
@include('addons.alert')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-plus-square-o"></i> Ubah Dosen
        </h3>
    </div><!-- /.box-header --> 
    <hr/>
    <div class="box-body"> 
       <form action="{{ URL::to('administrator/dosen/update'. $dosen->nik); }}" method="POST" accept-charset="utf-8" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('nik','NIK')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('nik', $dosen->nik, array('class' => 'form-control','required','placeholder'=>'NIK')) }}                
            </div>
        </div>   
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('nama_dosen','Nama Dosen')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('nama_dosen', $dosen->nama_dosen, array('class' => 'form-control','required','placeholder'=>'Nama Dosen')) }}
            </div>
        </div>  
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('field_studi','Field Studi')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('field_studi', $dosen->field_studi, array('class' => 'form-control','required','placeholder'=>'Field Studi')) }}            
            </div>
        </div>    
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('alumni','Alumni')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('alumni', $dosen->alumni, array('class' => 'form-control','required','placeholder'=>'Alumni')) }}
            </div>
        </div>   
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('status_dosen','Status Dosen')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('status_dosen', $dosen->status_dosen, array('class' => 'form-control','required','placeholder'=>'Status Dosen')) }}            
            </div>
        </div>   
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('alamat_email','Alamat Email')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('alamat_email', $dosen->alamat_email, array('class' => 'form-control','required','placeholder'=>'Alamat Email')) }}                
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Ubah', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}          
                <a href="{{ URL::to('administrator/dosen') }}" class="btn btn-danger" style="width : 110px">Batal</a>
            </div>
        </div>      
    </form>      
</div>
@stop
