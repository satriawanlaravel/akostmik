@extends('layouts.admin.index')
@section('content')

<!--  =========================================Filter====================================== -->

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Filter Jurusan</h3>
    </div><!-- /.box-header -->    
    <div class="box-body"> 
        {{Form::open(['url'=>'administrator/jadwal/bagiKelas','class'=>'form-horizontal','rol'=>'form','method'=>'POST'])}}     
        <div class="form-group">
            <div class="col-sm-2">
                {{ Form::label('jurusan','Pilih Jurusan') }}
            </div>
            <div class="col-lg-10">            
                {{ Form::select('jurusan', [''=>'--Pilih Jurusan--']+App\Models\Prodi::lists('nama_prodi', 'kode_prodi'), null, ['id' => 'jurusan','class'=>'form-control']) }}                
            </div>            
        </div> 
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('matakuliah','Pilih Matakuliah')}}
            </div>
            <div class="col-lg-10">                
                <select name="matakuliah" class="form-control" id="matakuliah">
                    <option value="">--Pilih Matakuliah--</option>                    
                </select>
            </div>            
        </div>          
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Filter ', array('class' => 'btn btn-primary','style'=>'width: 120px;')) }}
                <a href="{{ URL::to('administrator/jadwal') }}" class="btn btn-danger" style="width:120px;">kembali</a>                                 
            </div>
        </div>
        {{Form::close()}}                 
    </div>
</div>

<!--  =========================================End Filter====================================== -->


<!--  =========================================bagi Kelas====================================== -->

<!--  =========================================bagi Kelas====================================== -->
@stop

@section('jsAdd')

<script>
    $('#jurusan').on('change', function(e){
        console.log(e);
        var jur = e.target.value; 
    //ajax
    $.get('/pilih?jur=' + jur, function(data){
        $('#matakuliah').empty();
    //succes data
    $.each(data, function(index, pilihObj){
        $('#matakuliah').append('<option value="'+pilihObj.kode_matakuliah+'">'+pilihObj.nama_matakuliah+'</option>');
    });
});
});
</script>
@stop
