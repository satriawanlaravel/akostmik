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
<div class="box-body">
    <div class="well" style="background: white;">
        {{ Form::open(['url' => 'administrator/matakuliah/importMatakuliah', 'files' => true]) }}
        <div class="form-group">            
            <input type="file" id="exampleInputFile" name="excel" accept=".xlsx">
            <p class="help-block">Masukkan data matakuliah (file excel)</p>
        </div>
        <input type="submit" name="import" value="Import File" class="btn btn-primary" style="width: 100px;">
        {{Form::close()}}
    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-list-ol"></i> <b>List Data Ruangan</b>
        </h3>
    </div>
    <div class="box-body">          
        <table class="table table-bordered" id="lM">                        
            <thead>
                <tr  class="active bg-light-blue">    
                    <th class="text-center" style="width: 200px;"><div class="style3">Kode Matakuliah</div></th>
                    <th class="text-center" style="width: 250px;"><div class="style3">Program Studi</div></th>
                    <th class="text-center"><div class="style3">Nama Matakuliah</div></th>
                    <th class="text-center" style="width: 100px;"><div class="style3">Aksi</div></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($matakuliah as $value)
                    <td class="text-center"><div class="style4">{{ $value->kode_matakuliah }}</div></td>
                    <td class="text-center"><div class="style4">{{ $value->Prodi->nama_prodi }}</div></td>
                    <td><div class="style1">{{ $value->nama_matakuliah }}</div></td>
                    <td class="text-center"><div class="style3">
                        <a href="{{ URL::to('administrator/matakuliah/edit'.$value->kode_matakuliah) }}" onclick="return confirm('Yakin ingin diubah data ini!!')" class="glyphicon glyphicon-edit"></a>
                        |
                        <a href="{{ URL::to('administrator/matakuliah/destroy'. $value->kode_matakuliah)}}" onclick="return confirm('Yakin ingin Dihapus data ini!!')" class="glyphicon glyphicon-trash"></a>  
                        |
                        <a href="{{URL::to('administrator/matakuliah/detail'.$value->kode_matakuliah)}}" class="glyphicon glyphicon-eye-open"></a></div>
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