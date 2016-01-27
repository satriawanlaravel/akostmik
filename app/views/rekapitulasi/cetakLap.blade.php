<!DOCTYPE html>
<html>
<head>
	<title>Laporan Evaluasi PBM STMIK BG</title>
	<style type="text/css">
		.style1 {font-size: 11px; text-align: left}
		.style3 {font-size: 13px; ; font-weight: bold; text-align: center}
		.style4 {font-size: 11px;  text-align: center }
	</style>
	<style type="text/css">
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
</head>
<body>
	<h2 align="center">Laporan Evaluasi Proses Belajar Mengajar</h2>
	<h3 align="center">Sekolah Tinggi Manajemen Informatika (STMIK) Bumigora Mataram</h3>
	@foreach($cetak2 as $key => $val)
	<h3 align="center">{{$val->nama_prodi}} / {{ $val->gangep }}</h3>
	<h2 align="center">{{ $val->tahun_ajaran }}</h2>
	<hr>
	<br>
	@endforeach
	<br>
	<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<b><i style="color:red">*</i><u> Jumlah Matakuliah Semester ({{$val->gangep}})</u></b></h4>
		<table width="1262" border="1" align="center">
			<tr>			
				<td class="style3">No</td>
				<td class="style3">Prodi</td>
				<td class="style3">Nama Matakuliah</td>
				<td class="style3">Nama Dosen</td>
				<td class="style3">Kelas</td>
				<td class="style3">Jumlah Mahasiswa</td>			
				<td class="style3">Semester</td>			
				<td class="style3">Tahun Ajaran</td>
			</tr>
			<tr>		
				<?php $no = 1 ?>	
				@foreach($cetak4 as $key => $val)	
				<td><div class="style4">{{ $no++ }}</div></td>		
				<td><div class="style4">{{ $val->kode_prodi }}</div></td>						
				<td class="text-center"><div class="style1">{{ $val->nama_matakuliah }}</div></td>
				<td class="text-center"><div class="style1">{{ $val->nama_dosen }}</div></td>
				<td class="text-center"><div class="style4">{{ $val->kelas }}</div></td>	
				<td class="text-center"><div class="style4">{{ $val->tot_mahasiswa }}</div></td>
				<td class="text-center"><div class="style4">{{ $val->gangep }}</div></td>	
				<td class="text-center"><div class="style4">{{ $val->tahun_ajaran }}</div></td>	
			</tr>
			@endforeach
		</table>
		<h4>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b><i style="color:red">*</i><u> Jumlah Matakuliah Terselenggara Semester ({{$val->gangep}})</u></b></h4>
			<table width="1262" border="1" align="center">
				<tr>
					<td class="style3">No</td>
					<td class="style3">Prodi</td>
					<td class="style3">Matakuliah</td>
					<td class="style3">Nama Dosen</td>
					<td class="style3">Semester</td>
					<td class="style3">Kelas</td>
					<td class="style3">Jml Mhs / Kelas</td>
					<td class="style3">Responden</td>
					<td class="style3">Jml Tdk Isi</td>
					<td class="style3">%</td>
					<td class="style3">Keterangan</td>
					<td class="style3">Tahun Ajaran</td>
				</tr>
				<tr>
					<?php $no = 1 ?>
					@foreach($cetak1 as $key => $val)
					<td><div class="style4">{{ $no++ }}</div></td>
					<td><div class="style4">{{ $val->kode_prodi }}</div></td>
					<td class="text-left"><div class="style1">{{ $val->nama_matakuliah }}</div></td>	
					<td class="text-left"><div class="style1">{{ $val->nama_dosen }}</div></td>
					<td class="text-center"><div class="style4">{{ $val->semester }}</div></td>
					<td class="text-center"><div class="style4">{{ $val->kelas }}</div></td>
					<td class="text-center"><div class="style4">{{ $val->tot_mahasiswa }}</div></td>			
					<td class="text-center"><div class="style4">{{ $val->tot_mhs_isi }}</div></td>
					<td class="text-center"><div class="style4">{{ $val->tot_mhs_tdk_isi }}</div></td>
					<td class="text-center"><div class="style4">{{ $val->PresentaseIndex }}</div></td>
					<td><div class="style4">{{ $val->keterangan }}</div></td>
					<td class="text-center"><div class="style4">{{ $val->tahun_ajaran }}</div></td>	
				</tr>
				@endforeach
			</table>				
			<br>
			<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b><i style="color:red">*</i><u> Total Keseluruhan Mahasiswa Semester ({{$val->gangep}})</u></b></h4>
				<table width="1262" border="1" align="center">
					<tr>                						
						<th rowspan="2"><div class="style3">Program Studi</div></th>
						<th rowspan="2"><div class="style3">Jumlah Mahasiswa</div></th>					
						<th colspan="2"><div class="style3">Jumlah Responden</div></th>
						<th colspan="2"><div class="style3">Jumlah Tak Terevaluasi</div></th>
						<th rowspan="2"><div class="style3">Semester</div></th>
						<th rowspan="2"><div class="style3">Tahun Ajaran</div></th>	              
					</tr>
					<tr>
						<th><div class="style3">Jumlah</div></th>
						<th><div class="style3">%</div></th>	
						<th><div class="style3">Jumlah</div></th>
						<th><div class="style3">%</div></th>	
					</tr>
					<tr>			
						@foreach($cetak2 as $key => $val)									
						<td><div class="style4">{{ $val->nama_prodi }}</div></td>							
						<td><div class="style4">{{ $val->Jml_Seluruh_Mhs }}</div></td>
						<td><div class="style4">{{ $val->JmlAll_mhs_isi_perProdi }}</div></td>
						<td><div class="style4">{{ $val->PersentaseMhsisi }}</div></td>
						<td><div class="style4">{{ $val->JmlAll_mhs_tdkisi_perProdi }}</div></td>
						<td><div class="style4">{{ $val->PersentaseMhsTdkisi }}</div></td>
						<td><div class="style4">{{ $val->gangep }}</div></td>	
						<td><div class="style4">{{ $val->tahun_ajaran }}</div></td>	
					</tr>
					@endforeach
				</table>	
				<br>
				<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b><i style="color:red">*</i><u> Jumlah Matakuliah Terevaluasi & Tak Terevaluasi Semester ({{ $val->gangep }})</u></b></h4>
					<table width="1262" border="1" align="center">
						<tr>                							
							<th rowspan="2"><div class="style3">Program Studi</div></th>
							<th rowspan="2"><div class="style3">Total Jadwal</div></th>					
							<th colspan="2"><div class="style3">Total Terevaluasi</div></th>
							<th colspan="2"><div class="style3">Total Tak Terevaluasi</div></th>
							<th rowspan="2"><div class="style3">Semester</div></th>
							<th rowspan="2"><div class="style3">Tahun Ajaran</div></th>	              
						</tr>
						<tr>               
							<th><div class="style3">Jumlah</div></th>
							<th><div class="style3">%</div></th>	
							<th><div class="style3">Jumlah</div></th>
							<th><div class="style3">%</div></th>
						</tr>	
						<tr>			
							@foreach($cetak3 as $key => $val)										
							<td><div class="style4">{{ $val->nama_prodi }}</div></td>						
							<td><div class="style4">{{ $val->JmlJadwal }}</div></td>
							<td><div class="style4">{{ $val->JmlJdw_Terevaluasi }}</div></td>
							<td><div class="style4">{{ $val->Persentase_Terevaluasi }}</div></td>
							<td><div class="style4">{{ $val->Takterevaluasi }}</div></td>		
							<td><div class="style4">{{ $val->Persentase_TakTerevaluasi }}</div></td>
							<td><div class="style4">{{ $val->gangep }}</div></td>	
							<td><div class="style4">{{ $val->tahun_ajaran }}</div></td>		
						</tr>
						@endforeach
					</table>	
					<br><br><br><br>
					<div align="left">
						<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui,</h3> <br><br><br><br><br><br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Kepala Badan Penjaminan Mutu</u></b>
						<br><br><br>
					</div>					
				</body>
				</html>

