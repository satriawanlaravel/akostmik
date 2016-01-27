@extends('layouts.admin.index')
@section('content')

<style type="text/css">
	.style1 {font-size: xx-small}
	.style3 {font-size: xx-small; font-weight: bold; text-align: center}
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
		font-family:helvetica;font-size:13px;
		width:95%;
		border-collapse: collapse;
	}
</style>

<h2 style="color:red">*Perhatian</h2>
Ketentuan sebelum mengimport data dosen,mahasiswa,matakuliah dan krs adalah sebagai berikut:<br>
1.Perhatikan jumlah field yang dibutuhkan oleh masing-masing tabel <i>(jumlah atribut, nama atribut)</i>.<br>
2.Mintalah data yang mau diimport di bagian PUSTIK sesuai dengan ketentuan no 1.
<div class="row">
	<div class="col-md-6">
		<div class="well-sm"> 
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">
						<b>Import Data Dosen</b>
					</h3>
				</div>
				<div class="box-body">   
					Adapun field yang dibutuhkan adalah sebagai berikut :       
					<table class="table table-bordered">                        
						<thead>
							<tr>     
								<th class="text-center" style="width: 50px;">No</th>
								<th class="text-center">Atribut</th>                
								<th class="text-center">keterangan</th>                
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">1</td>
								<td>NIK</td>                
								<td>NIK dosens</td>
							</tr>
							<tr>
								<td class="text-center">2</td>
								<td>nama_dosen</td>                
								<td>Nama dosen</td>
							</tr>
							<tr>
								<td class="text-center">3</td>
								<td>field_studi	</td>                
								<td>Field studi</td>
							</tr>
							<tr>
								<td class="text-center">4</td>
								<td>alumni</td>                
								<td>Alumni Dosen</td>
							</tr>
							<tr>
								<td class="text-center">5</td>
								<td>status_dosen</td>                
								<td>Status dosen</td>
							</tr>
							<tr>
								<td class="text-center">6</td>
								<td>alamat_email</td>                
								<td>Alamat email dosen</td>
							</tr>				
						</tbody>
					</table>        
				</div>
			</div>			 
		</div>		
	</div>
	<div class="col-md-6 col-md-offset-0">
		<div class="well-sm"> 
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">
						<b>Import Data Matakuliah</b>
					</h3>
				</div>
				<div class="box-body">   
					Adapun field yang dibutuhkan adalah sebagai berikut :       
					<table class="table table-bordered">                        
						<thead>
							<tr>     
								<th class="text-center" style="width: 50px;">No</th>
								<th class="text-center">Atribut</th>                
								<th class="text-center">keterangan</th>                
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">1</td>
								<td>kode_matakuliah</td>                
								<td>Kode Matakuliah</td>
							</tr>
							<tr>
								<td class="text-center">2</td>
								<td>kode_prodi</td>                
								<td>Kode prodi</td>
							</tr>
							<tr>
								<td class="text-center">3</td>
								<td>nama_matakuliah	</td>                
								<td>Nama matakuliah</td>
							</tr>
							<tr>
								<td class="text-center">4</td>
								<td>sks_teori</td>                
								<td>sks teori</td>
							</tr>
							<tr>
								<td class="text-center">5</td>
								<td>sks_praktek</td>                
								<td>sks praktek</td>
							</tr>
							<tr>
								<td class="text-center">6</td>
								<td>sks_praktikum</td>                
								<td>Sks praktikum</td>
							</tr>				
						</tbody>
					</table>        
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-6">
		<div class="well-sm"> 
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">
						<b>Import Data Mahasiswa</b>
					</h3>
				</div>
				<div class="box-body">   
					Adapun field yang dibutuhkan adalah sebagai berikut :       
					<table class="table table-bordered">                        
						<thead>
							<tr>     
								<th class="text-center" style="width: 50px;">No</th>
								<th class="text-center">Atribut</th>                
								<th class="text-center">keterangan</th>                
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">1</td>
								<td>nim</td>                
								<td>NIM mahasiswa</td>
							</tr>
							<tr>
								<td class="text-center">2</td>
								<td>nama_mahasiswa</td>                
								<td>Nama mahasiswa</td>
							</tr>
							<tr>
								<td class="text-center">3</td>
								<td>tempat_lahir</td>                
								<td>Tempat lahir mahasiswa bersangkutan</td>
							</tr>
							<tr>
								<td class="text-center">4</td>
								<td>tanggal_lahir</td>                
								<td>Tanggal lahir mahasiswa bersangkutan</td>
							</tr>
							<tr>
								<td class="text-center">5</td>
								<td>alamat</td>                
								<td>Alamat mahasiswa bersangkutan</td>
							</tr>
							<tr>
								<td class="text-center">6</td>
								<td>telepon</td>                
								<td>Nomor telepon mahasiswa bersangkutan</td>
							</tr>
							<tr>
								<td class="text-center">7</td>
								<td>jenis_kelamin</td>                
								<td>Jenis kelamin</td>
							</tr>
							<tr>
								<td class="text-center">8</td>
								<td>agama</td>                
								<td>Tempat lahir mahasiswa bersangkutan</td>
							</tr>
							<tr>
								<td class="text-center">9</td>
								<td>angkatan</td>                
								<td>Agama</td>
							</tr>
							<tr>
								<td class="text-center">10</td>
								<td>kode_prodi</td>                
								<td>Kode program studi mahasiswa</td>
							</tr>
						</tbody>
					</table>        
				</div>
			</div>

		</div>
	</div>

	<div class="col-md-6 col-md-offset-0">
		<div class="well-sm"> 
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">
						<b>Import Data KRS</b>
					</h3>
				</div>
				<div class="box-body">   
					Adapun field yang dibutuhkan adalah sebagai berikut :       
					<table class="table table-bordered">                        
						<thead>
							<tr>     
								<th class="text-center" style="width: 50px;">No</th>
								<th class="text-center">Atribut</th>                
								<th class="text-center">keterangan</th>                
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">1</td>
								<td>id_krs</td>                
								<td>id krs</td>
							</tr>
							<tr>
								<td class="text-center">2</td>
								<td>nim</td>                
								<td>NIM</td>
							</tr>
							<tr>
								<td class="text-center">3</td>
								<td>semester</td>                
								<td>semester</td>
							</tr>
							<tr>
								<td class="text-center">4</td>
								<td>kode_matakuliah</td>                
								<td>Kode matakuliah</td>
							</tr>
							<tr>
								<td class="text-center">5</td>
								<td>status_krs</td>                
								<td>Status krs</td>
							</tr>				
						</tbody>
					</table>        
				</div>
			</div>
		</div>
	</div>
</div>







@stop