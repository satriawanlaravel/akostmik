@extends('layouts.admin.index')
@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><b><u>Filter Mahasiswa / Prodi</u></b></h3>
	</div><!-- /.box-header -->    
	<div class="box-body"> 
		{{Form::open(['url'=>'administrator/rekapitulasi/filterAlldata','class'=>'form-horizontal','rol'=>'form','method'=>'POST'])}}     
		<div class="form-group">
			<div class="col-sm-2">
				{{ Form::label('kode_prodi','Pilih Jurusan') }}
			</div>
			<div class="col-lg-10">            
				{{ Form::select('kode_prodi', [''=>'--Pilih Jurusan--']+App\Models\Prodi::lists('nama_prodi', 'kode_prodi'), null, ['id' => 'kode_prodi','class'=>'form-control']) }}                
			</div>            
		</div> 
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('semester','Pilih Semester')}}
			</div>
			<div class="col-lg-10">                
				<select name="gangep" class="form-control">
					<option value="">--Pilih Semester--</option>                    					
					<option value="ganjil">Ganjil</option>													
					<option value="genap">Genap</option>													
				</select>
			</div>            
		</div>      
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('tahun_ajaran','Pilih Tahun Ajaran')}}
			</div>
			<div class="col-lg-10">                
				<select name="tahun_ajaran" class="form-control">
					<option value="">--Pilih Tahun Ajaran--</option>                    
					@for($i=date('Y'); $i>=date('Y')-3; $i-=1)
					<option value="{{ $i }}">{{$i}}</option>
					@endfor									
				</select>
			</div>            
		</div>        
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button class="btn btn-primary"><i class="fa fa-check"> Tampilkan</i></button>
				<a href="{{'/administrator'}}" class="btn btn-danger"><i class="fa fa-refresh"> Batal</i></a>
			</div>
		</div>
		{{Form::close()}}                 
	</div>
</div>
@stop