@extends('layouts.admin.index')
@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">
			<i class="fa fa-plus-square-o"></i> Tambah Kelas
		</h3>
	</div><!-- /.box-header -->	
	<div class="box-body"> 
		{{Form::open(array('url'=>'administrator/kelas/store','class'=>'form-horizontal'))}}        
		<div class="form-group">
			<div class="col-sm-2">
				{{Form::label('kelas','Kelas')}}
			</div>
			<div class="col-sm-10">
				{{Form::text('kelas',Input::old('kelas'),['class'=>'form-control','required','placeholder'=>'Kelas'])}}				
			</div>
		</div>            
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				{{ Form::submit('Simpan Data', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}
				<a href="{{ URL::to('administrator/kelas') }}" class="btn btn-danger" style="width : 110px">Batal Simpan</a>
			</div>
		</div>         
		{{Form::close()}}
	</div>
</div>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">
			<i class="fa fa-list-ol"></i> List Data Kelas
		</h3>
	</div>
	<div class="box-body">			
		<table class="table table-bordered" id="lM">						
			<thead>
				<tr class="active bg-light-blue">					
					<th class="text-center" style="width: 50px;">No</th>
					<th class="text-center">Daftar Data Kelas</th>				               
					<th class="text-center" style="width: 130px;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach($datakls as $key => $value)
					<td class="text-center">{{ $value->idkelas }}</td>
					<td class="text-center">{{ $value->kelas }}</td>				
					<td class="text-center">					
						<a href="{{ URL::to('administrator/kelas/edit'.$value->idkelas) }}" onclick="return confirm('Yakin ingin diubah data ini!!')" class="glyphicon glyphicon-edit"></a> |
						<a href="{{ URL::to('administrator/kelas/destroy'.$value->idkelas) }}" onclick="return confirm('Yakin ingin hapus data ini!')" class="glyphicon glyphicon-trash"></a>                                      
					</td>
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


