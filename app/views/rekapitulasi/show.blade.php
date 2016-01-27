@extends('layouts.admin.index')
@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
	.style1 {font-size: 13px; font-weight: bold; text-align: center}
	.style3 {font-size: 11px}
	.style4 {font-size: xx-small; font-weight: bold; text-align: left }
</style>
<style>
	html,body{font-family:helvetica;font-size:15px;width:100%}
	table, td
	{
		border: 1px solid #000;padding:3px;
	}
	table
	{
		font-family:helvetica;font-size:14px;
		width:95%;
		border-collapse: collapse;
	}
</style>
@stop
@section('content')			
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">
			<i class="fa fa-list-ol"></i> <b>List Data Hasil Evaluasi</b>
		</h3>
	</div>
	<div class="box-body">          
		<table class="table table-bordered table-responsive" id="lM">                        
			<thead>
				<tr  class="active bg-light-blue">                
					<th style="width: 20px;"><div class="style1">No</div></th>
					<th><div class="style1">Prodi</div></th>
					<th><div class="style1">Matakuliah</div></th>					
					<th><div class="style1">Nama Dosen</div></th>
					<th><div class="style1">Semester</div></th>							
					<th><div class="style1">Kelas</div></th>
					<th><div class="style1">Jml Mhs</div></th>
					<th><div class="style1">Responden</div></th>                
					<th style="width: 80px;"><div class="style1">Jml Tdk Isi</div></th>       
					<th style="width: 60px;"><div class="style1">%</div></th> 
					<th style="width: 100px;"><div class="style1">Keterangan</div></th>
					<th><div class="style1">Tahun Ajaran</div></th>	              
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php $no = 1 ?>
					@foreach($rkp as $key => $val)
					<td><div class="style3">{{ $no++ }}</div></td>
					<td><div class="style3">{{ $val->kode_prodi }}</div></td>
					<td><div class="style3">{{ $val->nama_matakuliah }}</div></td>	
					<td><div class="style3">{{ $val->nama_dosen }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->semester }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->kelas }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->tot_mahasiswa }}</div></td>			
					<td class="text-center"><div class="style3">{{ $val->tot_mhs_isi }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->tot_mhs_tdk_isi }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->PresentaseIndex }}</div></td>
					<td><div class="style3">{{ $val->keterangan }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->tahun_ajaran }}</div></td>	
				</tr>
				@endforeach
			</tbody>
		</table>        
	</div>
</div>	


@stop

@section('jsAdd')
<script src="{{ asset('assets1/js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets1/js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assets1/js/Chart.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		$("#lM").dataTable({
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false
		});
	});

</script>        

@stop

