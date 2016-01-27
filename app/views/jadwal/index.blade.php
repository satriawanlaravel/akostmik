@extends('layouts.admin.index')

@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
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
@stop
@section('content')

<a href="jadwal/create" class="btn btn-primary" style="style'=>'width: 170px;">
    <i class="fa fa-plus"></i>
    Buat Jadwal Baru    
</a>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-list-ol"></i> <b>List Data Jadwal</b>
        </h3>
    </div>
    <div class="box-body">          
        <table class="table table-bordered" id="lM">                        
            <thead>
                <tr class="active bg-light-blue">         
                    <th class="text-center"><div class="style3">No</div></th>
                    <th class="text-center"><div class="style3">Nama Mahasiswa</div></th>
                    <th class="text-center"><div class="style3">Prodi</div></th>
                    <th class="text-center"><div class="style3">Kelas</div></th>
                    <th class="text-center"><div class="style3">Nama Matakuliah</div></th>                    
                    <th class="text-center"><div class="style3">Nama Dosen</div></th>
                    <th class="text-center"><div class="style3">Ruangan</div></th>
                    <th class="text-center"><div class="style3">Semester</div></th>
                    <th class="text-center"><div class="style3">Tahun</div></th>
                    <th class="text-center" style="width: 11s0px;"><div class="style3">Aksi</div></th>
                </tr>
            </thead>
            <tbody>
                <tr>        
                    <?php $no = 1 ?>
                    @foreach($jadwal as $key => $value)
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-left"><div class="style1">{{ $value->krs->mahasiswa->nama_mahasiswa }}</div></td>                
                    <td class="text-center"><div class="style4">{{ $value->krs->mahasiswa->kode_prodi }}</div></td>                
                    <td class="text-center"><div class="style4">{{ $value->kelas->kelas }}</div></td>
                    <td class="text-left"><div class="style1">{{ $value->krs->matakuliah->nama_matakuliah }}</div></td>
                    <td class="text-left"><div class="style1">{{ $value->dosen->nama_dosen }}</div></td>
                    <td class="text-center"><div class="style4">{{ $value->ruangan->nama_ruangan }}</div></td>
                    <td class="text-center"><div class="style4">{{ $value->krs->semester }}</div></td>
                    <td class="text-center"><div class="style4">{{ $value->tahun_ajaran }}</div></td>
                    <td class="text-center"><div class="style4">               
                        <a href="{{ URL::to('administrator/jadwal/destroy'.$value->idjadwal) }}" onclick="return confirm('Yakin data ini dihapus!!')" class="glyphicon glyphicon-trash"></a></div>
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

