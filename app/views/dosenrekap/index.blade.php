@extends('layouts.admin.indexd')
@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title"><b><u>Filter Data Laporan</u></b></h3>
	</div><!-- /.box-header -->    
	<div class="box-body"> 
		{{Form::open(['url'=>'dosen/dosenrekap/cetakLapdosen','class'=>'form-horizontal','rol'=>'form','method'=>'POST'])}}     
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
				<select name="gangep" class="form-control" id="gangep">
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
				<select name="tahun_ajaran" class="form-control" id="tahun_ajaran">
					<option value="">--Pilih Tahun Ajaran--</option>                    
					@for($i=date('Y'); $i>=date('Y')-3; $i-=1)
					<option value="{{ $i }}">{{$i}}</option>
					@endfor									
				</select>
			</div>            
		</div>        
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button class="btn btn-primary" id="cetakdosen"><i class="fa fa-print"> Cetak Laporan</i></button>
				<a href="{{'/dosen'}}" class="btn btn-danger"><i class="fa fa-refresh"> Batal</i></a>
			</div>
		</div>
		{{Form::close()}}                 
	</div>
</div>
@stop
@section('jsAdd')
<script src="{{ asset('assets1/js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets1/js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script> 
<script type="text/javascript">
	$('document').ready(function(){
		$("#cetakdosen").click(function(event){
			event.preventDefault();
			var prodi = $('#kode_prodi').val();
			var gangep = $('#gangep').val();
			var tahun = $('#tahun_ajaran').val();
			window.open("{{ URL::to('dosen/dosenrekap/cetakLapdosen?prodi=') }}"+decodeURIComponent(prodi)+"&gangep="+decodeURIComponent(gangep)+"&tahun="+decodeURIComponent(tahun));
		});
	});
</script> 
@stop