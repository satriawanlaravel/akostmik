@extends('layouts.admin.index')

@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-plus-square-o"></i> Tambah Ruangan
        </h3>
    </div><!-- /.box-header -->    
    <div class="box-body"> 
        {{Form::open(array('url'=>'administrator/ruangan/store','class'=>'form-horizontal'))}}
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('kode_ruangan','Kode Ruangan')}}
            </div>
            <div class="col-lg-9">
                {{Form::text('kode_ruangan',Input::old('kode_ruangan'),array('class'=>'form-control','required','pleaceholder'=>'kode ruangan'))}}                
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('nama_ruangan','Nama Ruangan')}}
            </div>
            <div class="col-lg-9">
                {{Form::text('nama_ruangan',Input::old('nama_ruangan'),array('class'=>'form-control','required','pleaceholder'=>'nama ruangan'))}}                
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Simpan Data', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}                                                                                                              
                <a href="{{ URL::to('administrator/ruangan') }}" class="btn btn-danger" style="width : 110px">Batal Simpan</a>
            </div>
        </div>
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
                    <th class="text-center" style="width: 200px;">Kode Ruangan</th>
                    <th class="text-center">Nama Ruangan</th>                
                    <th class="text-center" style="width: 100px;">Aksi</th>                
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($ruangan as $value)
                    <td class="text-center">{{ $value->kode_ruangan }}</td>
                    <td class="text-center">{{ $value->nama_ruangan }}</td>                
                    <td class="text-center">
                        <a href="{{URL::to('administrator/ruangan/edit'.$value->kode_ruangan)}}" onclick="return confirm('Yakin ingin diubah data ini!!')"class="glyphicon glyphicon-edit"></a> |                                     
                        <a href="{{URL::to('administrator/ruangan/destroy'. $value->kode_ruangan)}}" onclick="return confirm('Yakin ingin hapus data ini!')" class="glyphicon glyphicon-trash"></a>                                                                                                                 
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