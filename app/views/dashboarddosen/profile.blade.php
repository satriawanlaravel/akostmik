@extends('layouts.admin.indexd')
@section('content')
<div class="box tools">
	<div class="box-header">
		<h3 class="box-title"><b><u>P R O F I L E</u></b></h3>        
		<div class="box-tools">
			<div class="col-lg-4 pull-right">               
			</div>
		</div>
	</div>
	<div class="box-body table-responsive no-padding ">  
		<table class="table table-condensed table-hover">
			<tr>
				<th style="width: 250px;">Nama Depan</th>
				<td>:</td>
				<td>
					{{ $user->first_name }}
				</td>
			</tr>
			<tr>
				<th style="width: 250px;">Nama Belakang</th>
				<td>:</td>
				<td>
					{{ $user->last_name }}
				</td>
			</tr>
			<tr>
				<th style="width: 250px;">Email</th>
				<td>:</td>
				<td>
					{{ $user->email }}
				</td>
			</tr>
			<tr>
				<th style="width: 250px;">Member Sejak</th>
				<td>:</td>
				<td>
					{{ $user->activated_at }}
				</td>
			</tr>
			<tr>
				<th style="width: 250px;">Login Terakhir</th>
				<td>:</td>
				<td>
					{{ $user->last_login }}
				</td>
			</tr>
		</table>		
	</div> 
</div>  
@stop