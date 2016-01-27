@extends('layouts.admin.index')
@section('content')
@include('addons.alert')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">
			<i class="fa fa-plus-square-o"></i> Ubah Matakuliah
		</h3>
	</div><!-- /.box-header -->	
	<hr/>
	<div class="box-body"> 
		{{Form::open(array('url'=>'administrator/matakuliah/update'. $matakuliah->kode_matakuliah,'class'=>'form-horizontal'))}}
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('kode_matakuliah','Kode Matakuliah')}}
			</div>
			<div class="col-sm-10">
				{{Form::text('kode_matakuliah',$matakuliah->kode_matakuliah,['class'=>'form-control','required','placeholder'=>'kode matakuliah'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('kode_prodi','Kode Prodi')}}
			</div>
			<div class="col-sm-10">
				{{Form::text('kode_prodi',$matakuliah->kode_prodi,['class'=>'form-control','required','placeholder'=>'kode prodi'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('nama_matakuliah','Nama Matakuliah')}}
			</div>
			<div class="col-sm-10">
				{{Form::text('nama_matakuliah',$matakuliah->nama_matakuliah,['class'=>'form-control','required','placeholder'=>'nama matakuliah'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('sks_teori','SKS Teori')}}
			</div>
			<div class="col-sm-10">
				{{Form::text('sks_teori',$matakuliah->sks_teori,['class'=>'form-control','required','placeholder'=>'sks teori'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('sks_praktek','SKS Praktek')}}
			</div>
			<div class="col-sm-10">
				{{Form::text('sks_praktek',$matakuliah->sks_praktek,['class'=>'form-control','required','placeholder'=>'sks praktek'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('sks_praktikum','SKS Praktikum')}}
			</div>
			<div class="col-sm-10">
				{{Form::text('sks_praktikum',$matakuliah->sks_praktikum,['class'=>'form-control','required','placeholder'=>'sks praktikum'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				{{ Form::submit('Ubah', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}
				<a href="{{ URL::to('administrator/matakuliah') }}" class="btn btn-danger" style="width : 110px">Batal</a>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
@stop