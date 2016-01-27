@extends('layouts.admin.indexd')
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><b><i class="glyphicon glyphicon-edit"></i> Ubah Password Dosen</b></h3>
	</div><!-- /.box-header -->    
	<div class="box-body"> 
		{{Form::open(array('class'=>'form-horizontal','url'=>'')) }}        
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('first_name','Nama Depan')}}
			</div>
			<div class="col-lg-10"> 
				{{ Form::text('first_name',$user->first_name, array('class' => 'form-control','required','disabled'=>true)) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('last_name','Nama Belakang')}}
			</div>
			<div class="col-lg-10"> 
				{{ Form::text('last_name',$user->last_name, array('class' => 'form-control','required','disabled'=>true)) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('email','Email')}}
			</div>
			<div class="col-lg-10"> 
				{{ Form::text('email',$user->email, array('class' => 'form-control','required','disabled'=>true)) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('password','Password')}}
			</div>
			<div class="col-lg-10"> 
				{{ Form::text('password', Input::old('password'),array('class' => 'form-control','required','placeholder'=>'password')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('konfirmasi_password','Konfirmasi Password')}}
			</div>
			<div class="col-lg-10"> 
				{{ Form::text('konfirmasi_password',Input::old('konfirmasi_password'), array('class' => 'form-control','required','placeholder'=>'konfirmasi password')) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				{{ Form::submit('Ubah Akun', array('class' => 'btn btn-primary','style'=>'width: 120px;')) }}
				<a href="{{ URL::to('dosen') }}" class="btn btn-danger" style="width : 120px">Batal</a>
			</div>
		</div>         
		{{Form::close()}}
	</div>
</div>
@stop