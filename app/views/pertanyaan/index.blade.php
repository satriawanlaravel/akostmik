@extends('layouts.admin.index')

@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-plus-square-o"></i> Tambah Pertanyaan
        </h3>
    </div><!-- /.box-header -->
    <div class="box-body"> 
        {{Form::open(array('url'=>'administrator/pertanyaan/store','class'=>'form-horizontal'))}}                
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('pertanyaan','Pertanyaan')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::textarea('pertanyaan', Input::old('pertanyaan'), array('class' => 'form-control','required','rows'=>4,'placeholder'=>'isi pertanyaan kuesioner')) }}                                
            </div>
        </div>      
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Simpan Data', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}
                <a href="{{ URL::to('administrator/pertanyaan') }}" class="btn btn-danger" style="width : 110px">Batal Simpan</a>
            </div>
        </div>         
        {{Form::close()}}
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
                    <th class="text-center" style="width: 30px;">No</th>                            
                    <th class="text-center">Uraian Bahan Evaluasi Proses Belajar Mengajar(PBM)</th>                
                    <th class="text-center" style="width: 110px;">Aksi</th>
                </tr>                          
            </thead>
            <tbody>                        
                <tr>               
                    <?php $n = 1;?>
                    @foreach($pertanyaan as $value)  
                    <td class="text-center">{{$n++}}</td>                               
                    <td class="text-left">{{$value->pertanyaan}}</td>                
                    <td class="text-center">
                        <a href="{{URL::to('administrator/pertanyaan/edit'.$value->kode_pertanyaan)}}" onclick="return confirm('Yakin ingin diubah data ini!!')" class="glyphicon glyphicon-edit"></a> |                                     
                        <a href="{{URL::to('administrator/pertanyaan/destroy'.$value->kode_pertanyaan)}}" onclick="return confirm('Yakin ingin hapus data ini!!')" class="glyphicon glyphicon-trash"></a>
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