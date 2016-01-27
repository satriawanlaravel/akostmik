@extends('layouts.admin.index')
@section('content')
@include('addons.alert')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-plus-square-o"></i> Ubah Ruangan
        </h3>
    </div><!-- /.box-header --> 
    <hr/>
    <div class="box-body">         
        <form class="form-horizontal" action="{{URL::to('administrator/ruangan/update' . $ruangan->kode_ruangan); }}" method="POST">
            <div class="form-group">
                <div class="col-sm-2">
                    {{Form::label('kode_ruangan','Kode Ruangan')}}
                </div>
                <div class="col-lg-9">
                    {{Form::text('kode_ruangan',$ruangan->kode_ruangan, array('class'=>'form-control','required','pleaceholder'=>'kode ruangan'))}}                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    {{Form::label('nama_ruangan','Nama Ruangan')}}
                </div>
                <div class="col-lg-9">
                    {{Form::text('nama_ruangan',$ruangan->nama_ruangan, array('class'=>'form-control','required','pleaceholder'=>'nama ruangan'))}}                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {{ Form::submit('Ubah', array('class' => 'btn btn-primary')) }}
                    <a href="{{ URL::to('administrator/ruangan') }}" class="btn btn-danger">Batal</a>   
                </div>
            </div>
        </form>        
    </div>
</div>
@stop