@extends('layouts.admin.index')
@section('content')
<div class="col-sm-12">	
	<div class="row">
		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{ $userData['all'] }}</h3>
					<p>Jumlah Registrasi</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!-- ./col -->
		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{ $userData['active'] }}<sup style="font-size: 20px"></sup>					
					</h3>
					<p>User Aktif</p>
				</div>
				<div class="icon">
					<i class="fa fa-check"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!-- ./col -->
		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{ $userData['notActive'] }}</h3>
					<p>User Belum Aktif</p>
				</div>
				<div class="icon">
					<i class="fa fa-power-off"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div><!-- ./col -->
	</div>


	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">
				<i class="glyphicon glyphicon-stats"></i> <b>Statistik Pendaftaran 
			</b>
		</h3>
	</div>
	<div class="box-body">			
		<div style="width: 80%" >
			<canvas id="canvas" height="350" width="500"></canvas>
		</div>
		<script>
			var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

			var barChartData = {
				labels : ["Jumlah User Registrasi","Jumlah User Aktif","Jumlah User Belum Aktif"],
				datasets : [
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,0.8)",
					highlightFill : "rgba(151,187,205,0.75)",
					highlightStroke : "rgba(151,187,205,1)",
					data : [ {{ $userData['all'] }},{{ $userData['active'] }},{{ $userData['notActive'] }}]
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
</div>
@stop
@section('jsAdd')
<script src="{{ asset('assets1/js/Chart.min.js') }}" type="text/javascript"></script> 
@stop