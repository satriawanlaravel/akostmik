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
			<i class="fa fa-list-ol"></i> <b>Matakuliah Terevaluasi</b>
		</h3>
	</div>
	<div class="box-body">          
		<table class="table table-bordered table-responsive">                        
			<thead>
				<tr class="active bg-light-blue">                				
					<th rowspan="2" class="active bg-light-blue"><div class="style1">Program Studi</div></th>
					<th rowspan="2" class="active bg-light-blue"><div class="style1">Jumlah Jadwal</div></th>					
					<th colspan="2" class="active bg-light-blue"><div class="style1">Jumlah Terevaluasi</div></th>
					<th colspan="2" class="active bg-light-blue"><div class="style1">Jumlah Tak Terevaluasi</div></th>
					<th rowspan="2" class="active bg-light-blue"><div class="style1">Semester</div></th>
					<th rowspan="2" class="active bg-light-blue"><div class="style1">Tahun Ajaran</div></th>	              
				</tr>
				<tr class="active bg-light-blue">               
					<th class="active bg-light-blue"><div class="style1">Jumlah</div></th>
					<th class="active bg-light-blue"><div class="style1">%</div></th>	
					<th class="active bg-light-blue"><div class="style1">Jumlah</div></th>
					<th class="active bg-light-blue"><div class="style1">%</div></th>
				</tr>				
			</thead>			
			<tbody>
				<tr>			
					@foreach($evaluasi as $key => $val)				
					<td><div class="style3">{{ $val->nama_prodi }}</div></td>								
					<td class="text-center"><div class="style3">{{ $val->JmlJadwal }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->JmlJdw_Terevaluasi }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->Persentase_Terevaluasi }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->Takterevaluasi }}</div></td>		
					<td class="text-center"><div class="style3">{{ $val->Persentase_TakTerevaluasi }}</div></td>
					<td class="text-center"><div class="style3">{{ $val->gangep }}</div></td>	
					<td class="text-center"><div class="style3">{{ $val->tahun_ajaran }}</div></td>	
				</tr>
				@endforeach
			</tbody>
		</table>        
	</div>
</div>			

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">
			<i class="glyphicon glyphicon-stats"></i> <b>Evaluasi PBM Prodi {{$val->nama_prodi}} / {{ $val->gangep }} / {{ $val->tahun_ajaran }}
		</b>
	</h3>
</div>
<div class="box-body">			
	<div style="width: 80%" >
		<canvas id="canvas" height="380" width="600"></canvas>
	</div>
	<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

		var barChartData = {
			labels : ["Jumlah Jadwal","Jumlah Terevaluasi","Jumlah Tak Terevaluasi"],
			datasets : [
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [{{ $val->JmlJadwal }},{{ $val->JmlJdw_Terevaluasi }},{{ $val->Takterevaluasi }}]
			},
			
			]

		}
		window.onload = function(){
			var ctx = document.getElementById("canvas").getContext("2d");
			window.myBar = new Chart(ctx).Bar(barChartData, {
				responsive : true
			});
		}
	</script>		
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
			"bPaginate": false,
			"bLengthChange": true,
			"bFilter": false,
			"bSort": false,
			"bInfo": false,
			"bAutoWidth": false
		});
	});

</script>        

@stop

