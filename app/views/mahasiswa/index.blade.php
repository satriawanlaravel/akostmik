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
        {{ Form::open(['url' => 'administrator/mahasiswa/importMahasiswa', 'files' => true]) }}
        <div class="form-group">
            <label for="exampleInputFile">Data Mahasiswa .xlsx (file excel)</label>
            <input type="file" id="exampleInputFile" name="excel" class="fa fa-folder-open" accept=".xlsx">
            <p class="help-block">Masukkan data mahasiswa (file excel)</p>
        </div>
        <input type="submit" name="import" value="Import File" class="btn btn-primary" style="width: 100px;">
        {{Form::close()}}
    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-list-ol"></i> <b>List Data Mahasiswa</b>
        </h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered" id="lM">                        
            <thead>
                <tr class="active bg-light-blue">                
                    <th class="text-center"><div class="style3">Nim</div></th>
                    <th class="text-center"><div class="style3">Nama Mahasiswa</div></th>                
                    <th class="text-center"><div class="style3">Alamat</div></th>
                    <th class="text-center"><div class="style3">Program Studi</div></th>
                    <th class="text-center" style="width: 110px;"><div class="style3">Aksi</div></th>            
                </tr>
            </thead>
            <tbody>
                <tr>                
                    @foreach ($mahasiswa as $value)                
                    <td class="text-center"><div class="style4">{{ $value->nim }}</div></td>
                    <td><div class="style1">{{ $value->nama_mahasiswa }}</div></td>
                    <td><div class="style1">{{ $value->alamat }}</div></td>
                    <td class="text-center"><div class="style4">{{ $value->prodi->nama_prodi }}</div></td>
                    <td class="text-center"><div class="style4">                    
                        <a href="{{ URL::to('administrator/mahasiswa/edit'. $value->nim) }}" onclick="return confirm('Yakin, Data ini akan diubah !')" class="glyphicon glyphicon-edit">

                        </a>
                        |
                        <a href="{{URL::to('administrator/mahasiswa/destroy'.$value->nim)}}" onclick="return confirm('Sure, you want to delete this data!')" class="glyphicon glyphicon-trash"></a> |                                                                          
                        <a href="{{ URL::to('administrator/mahasiswa/detail'.$value->nim) }}" class="glyphicon glyphicon-eye-open"></a>                                      
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>        
</div><!-- /.box-body -->
</div><!-- /.box -->
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

