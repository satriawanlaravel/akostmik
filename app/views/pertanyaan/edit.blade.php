@extends('layouts.admin.index')
@section('content')
@include('addons.alert')
<div class="box box-primary">
   <div class="box-header">
    <h3 class="box-title">
        <i class="fa fa-plus-square-o"></i> Ubah Pertanyaan
    </h3>
</div><!-- /.box-header --> 
<hr/>
<div class="box-body">         
    <form class="form-horizontal" action="{{ URL::to('administrator/pertanyaan/update' .$pertanyaan->kode_pertanyaan); }}" method="POST">          
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('pertanyaan','Pertanyaan')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::textarea('pertanyaan', $pertanyaan->pertanyaan, array('class' => 'form-control','required','rows'=>5,'placeholder'=>'isi pertanyaan kuesioner')) }}                
                
            </div>
        </div>      
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Ubah', array('class' => 'btn btn-primary','style'=>'width: 173px;')) }}          <a href="{{ URL::to('administrator/pertanyaan') }}" class="btn btn-danger">Batal</a>
            </div>
        </div>         
    </form>      
</div>
</div>
@stop