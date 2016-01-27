@extends('layouts.admin.index')
@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="box-body">
    <div class="well" style="background: white;">
        {{ Form::open(['url' => 'administrator/krs/importKrs', 'files' => true]) }}
        <div class="form-group">
            <label for="exampleInputFile">Data KRS .xlsx (file excel)</label>
            <input type="file" id="exampleInputFile" name="excel" accept=".xlsx">
            <p class="help-block">Masukkan data krs (file excel)</p>
        </div>
        <input type="submit" name="import" value="Import File" class="btn btn-primary" style="width: 100px;">
        {{Form::close()}}
    </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-list-ol"></i> List Data KRS
        </h3>
    </div>
    <div class="box-body">          
        <table class="table table-bordered" id="lM">                        
            <thead>
                <tr class="active bg-light-blue">
                    <th class="text-center" style="width: 200px;">NIM</th>
                    <th class="text-center">Nama Mahasiswa</th>
                    <th class="text-center">Semester</th>                
                    <th class="text-center">Matakuliah</th>                
                    <th class="text-center">Status KRS</th>                                               
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($krs as $key => $value)
                    <td class="text-center">{{ $value->nim }}</td>
                    <td class="text-center">{{$value->mahasiswa->nama_mahasiswa}}</td>
                    <td class="text-center">{{ $value->semester }}</td>
                    <td>{{ $value->matakuliah->nama_matakuliah }}</td>
                    <td class="text-center">{{ $value->status_krs }}</td>                
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