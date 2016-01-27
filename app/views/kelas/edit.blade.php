@extends('layouts.admin.index')
@section('content')
@include('addons.alert')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">
			<i class="fa fa-plus-square-o"></i> Ubah Kelas
		</h3>
	</div><!-- /.box-header -->	
	<hr/>
	<div class="box-body"> 
		{{Form::open(array('url'=>'administrator/kelas/update'. $kls->idkelas,'class'=>'form-horizontal'))}}        
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('kelas','Kelas')}}
			</div>
			<div class="col-sm-10">
				{{Form::text('kelas',$kls->kelas,['class'=>'form-control','required','placeholder'=>'Kelas'])}}				
			</div>
		</div>            
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				{{ Form::submit('Ubah', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}                     
				<a href="{{ URL::to('administrator/kelas') }}" class="btn btn-danger" style="width : 110px">Batal</a>
			</div>
		</div>         
		{{Form::close()}}
	</div>
</div>
@stop