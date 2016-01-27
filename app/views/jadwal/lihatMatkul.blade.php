@extends('layouts.admin.index')
@section('content')

@if(Session::Has('msgs'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('msgs') }}    
</div>
@elseif(Session::Has('msge'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('msge') }}  
</div>
@endif

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Filter Jurusan dan Matakuliah</h3>
    </div><!-- /.box-header -->
    <hr>
    <div class="box-body"> 
        {{Form::open(['url'=>'administrator/kelasjadwal/bagiKelas','class'=>'form-horizontal','rol'=>'form'])}}  
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('jurusan','Jurusan')}}
            </div>
            <div class="col-lg-10">                
                {{ Form::text('kode_prodi',$kodeProdi,['class'=>'form-control','readonly' => true]) }}

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('matkul','Pilih MataKuliah')}}
            </div>
            <div class="col-lg-10">                
                <select name="nama_matakuliah" class="form-control">
                    <option value="">--Pilih Matakuliah--</option>
                    @foreach($matkulPro as $key => $matkul)
                    <option value="{{ $matkul->nama_matakuliah }}">{{ $matkul->nama_matakuliah }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Tampilkan ', array('class' => 'btn btn-primary','style'=>'width: 120px;')) }}                                 
            </div>
        </div>                 
        {{Form::close()}}
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#jurusan').change(function(){
            var jurusan = $('#jurusan').val();
            $.ajax({
                url  : "{{ URL::to('administrator/getMatkul') }}";
                data : " ",
                success : function(data){
                    $('#matakuliah').html(data);
                }
            });
        });
    });
</script>
@stop