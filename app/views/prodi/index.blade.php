@extends('layouts.admin.index')

@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-plus-square-o"></i> Tambah Prodi
        </h3>
    </div><!-- /.box-header -->
    <div class="box-body"> 
        {{Form::open(array('url'=>'administrator/prodi/store','class'=>'form-horizontal'))}}
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('kode_prodi','Kode Prodi')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('kode_prodi', Input::old('kode_prodi'), array('class' => 'form-control','required','placeholder'=>'kode prodi')) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('jenjang','Jenjang')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('jenjang', Input::old('jenjang'), array('class' => 'form-control','required','placeholder'=>'jenjang')) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('jurusan','Jurusan')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('jurusan', Input::old('jurusan'), array('class' => 'form-control','required','placeholder'=>'jurusan')) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('nama_prodi','Nama Prodi')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('nama_prodi', Input::old('nama_prodi'), array('class' => 'form-control','required','placeholder'=>'nama prodi')) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Simpan Data', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}
                <a href="{{ URL::to('administrator/prodi') }}" class="btn btn-danger" style="width : 110px">Batal Simpan</a>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>


<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-list-ol"></i> <b>List Data Prodi</b>
        </h3>
    </div>
    <div class="box-body">          
        <table class="table table-bordered table-responsive" id="lM">                        
            <thead>
                <tr  class="active bg-light-blue">                
                    <th class="text-center" style="width: 200px;">Kode Prodi</th>
                    <th class="text-center">Jenjang</th>
                    <th class="text-center">Jurusan</th>                
                    <th class="text-center">Nama Program Studi</th>                
                    <th class="text-center" style="width: 100px;">Aksi</th>                
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($prodi as $value)
                    <td class="text-center">{{ $value->kode_prodi }}</td>
                    <td class="text-center">{{ $value->jenjang }}</td>
                    <td>{{ $value->jurusan }}</td>
                    <td>{{ $value->nama_prodi }}</td>
                    <td class="text-center">
                        <a href="{{ URL::to('administrator/prodi/edit'.$value->kode_prodi) }}" onclick="return confirm('Yakin ingin diubah data ini!!')" class="glyphicon glyphicon-edit"></a> |
                        <a href="{{ URL::to('administrator/prodi/destroy'. $value->kode_prodi) }}" onclick="return confirm('Yakin ingin hapus data ini!')" class="glyphicon glyphicon-trash"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
</div>

<!-- Modal   data-toggle="modal" data-target="#myModal"-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-edit"></i> Ubah Prodi
                </h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('class'=>'form-horizontal','url'=>'administrator/prodi/update')) }}        
                <div class="form-group">
                    <div class="col-sm-2">
                        {{Form::label('kode_prodi','Kode Prodi')}}
                    </div>
                    <div class="col-lg-10"> 
                        {{ Form::text('kode_prodi', Input::old('kode_prodi'), array('class' => 'form-control','required','placeholder'=>'kode prodi')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        {{Form::label('jenjang','Jenjang')}}
                    </div>
                    <div class="col-lg-10"> 
                        {{ Form::text('jenjang', Input::old('jenjang'), array('class' => 'form-control','required','placeholder'=>'jenjang')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        {{Form::label('jurusan','Jurusan')}}
                    </div>
                    <div class="col-lg-10"> 
                        {{ Form::text('jurusan', Input::old('jurusan'), array('class' => 'form-control','required','placeholder'=>'jurusan')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        {{Form::label('nama_prodi','Nama Prodi')}}
                    </div>
                    <div class="col-lg-10"> 
                        {{ Form::text('nama_prodi', Input::old('nama_prodi'), array('class' => 'form-control','required','placeholder'=>'nama prodi')) }}                                
                    </div>
                </div>                          
                <div class="modal-footer">
                    {{ Form::submit('Ubah', array('class' => 'btn btn-primary')) }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>               
                </div>     
                {{Form::close()}}
            </div>          
        </div>
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