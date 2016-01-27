@extends('layouts.admin.index')

@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="box-body">
    <div class="well" style="background: white;">
        {{ Form::open(['url' => 'administrator/dosen/importDosen', 'files' => true]) }}
        <div class="form-group">
            <label for="exampleInputFile">Data Dosen .xlsx (file excel)</label>
            <input type="file" name="excel" id="exampleInputFile" accept=".xlsx">
            <p class="help-block">Masukkan data dosen (file excel)</p>
        </div>
        <input type="submit" name="import" value="Import File" class="btn btn-primary" style="width: 100px;">
        {{ Form::close() }}
    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-list-ol"></i> <b>List Data Dosen</b>
        </h3>
    </div>
    <div class="box-body">          
        <table class="table table-bordered" id="lM">                        
            <thead>
                <tr class="active bg-light-blue">     
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama Dosen</th>
                    <th class="text-center">Field Studi</th>
                    <th class="text-center">Status Dosen</th>
                    <th class="text-center" style="width: 11s0px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($dosen as $value)
                    <td class="text-left">{{ $value->nik }}</td>
                    <td>{{ $value->nama_dosen }}</td>
                    <td>{{ $value->field_studi }}</td>
                    <td class="text-center">{{ $value->status_dosen }}</td>
                    <td class="text-center">                    
                        <a href="{{URL::to('administrator/dosen/edit'.$value->nik)}}" onclick="return confirm('Yakin, Data ini akan diubah !')" class="glyphicon glyphicon-edit"></a>
                        |
                        <a href="{{URL::to('administrator/dosen/destroy'.$value->nik)}}" onclick="return confirm('Sure, you want to delete this data!')" class="glyphicon glyphicon-trash"></a> |
                        <a href="{{URL::to('administrator/dosen/detail'.$value->nik)}}" class="glyphicon glyphicon-eye-open"></a>                                                                            
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