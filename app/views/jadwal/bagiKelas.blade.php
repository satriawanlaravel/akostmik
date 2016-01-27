@extends('layouts.admin.index')
@section('cssAdd')
<link href="{{ asset('assets1/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')

<div class="box tools">
    <div class="text-center">
        <h3 class="box-title" style="center-text"><b>DAFTAR MATAKULIAH MAHASISWA</b></h3>
        <br/>
    </div>
</div>

{{Form::open(['url'=>'administrator/jadwal/saveKelas','class'=>'form-horizontal'])}}
<div class="box box-primary">    
    <div class="box-body">          
        <table class="table table-bordered" id="lM">                        
            <thead>
                <tr  class="active bg-light-blue">  
                    <th><button type="button" class="btn btn-xs btn-primary checkbox-toggle"><i class="fa fa-check"></i></button></th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Nama Mahasiswa</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">Program Studi</th>
                    <th class="text-center">Nama Matakuliah</th>                                                    
                </tr>
            </thead>
            <tbody>                
                <tr>               
                    @foreach($bagi as $Key => $bgKelas)                    
                    <td>{{ Form::checkbox('id_krs[]', $bgKelas->id_krs) }}</td>              
                    <td class="text-center">{{ $bgKelas->nim }}</td>
                    <td class="text-left">{{ $bgKelas->nama_mahasiswa }}</td>
                    <td class="text-center">{{ $bgKelas->semester }}</td>
                    <td class="text-center">{{ $bgKelas->kode_prodi }}</td>
                    <td class="text-center">{{ $bgKelas->nama_matakuliah }}</td>                                    
                </tr>    
                @endforeach
            </tbody>
        </table>
        <div class="well">
           <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('kelas','Kelas')}}
            </div>
            <div class="col-lg-10">
                {{ Form::select('idkelas', [''=>'--Pilih Kelas--']+App\Models\Kelas::lists('kelas', 'idkelas'), null, ['id' => 'idkelas','class'=>'form-control','required']) }}                                         
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('dosen','Dosen')}}
            </div>
            <div class="col-lg-10">
             {{ Form::select('nik', [''=>'--Pilih Dosen--']+App\Models\Dosen::lists('nama_dosen', 'nik'), null, ['id' => 'nik','class'=>'form-control','required']) }}                                         
         </div>
     </div>
     <div class="form-group">
        <div class="col-sm-2">
            {{Form::label('ruangan','Ruangan')}}
        </div>
        <div class="col-lg-10">
         {{ Form::select('kode_ruangan', [''=>'--Pilih Ruangan--']+App\Models\Ruangan::lists('nama_ruangan', 'kode_ruangan'), null, ['id' => 'kode_ruangan','class'=>'form-control','required']) }}
     </div>
 </div>
 <div class="form-group">
    <div class="col-sm-2">
        {{Form::label('gangep','Semester')}}
    </div>
    <div class="col-lg-10">
        <select name="gangep" class="form-control">
          <option value="">Pilih Semester</option>
          <option value="ganjil">Ganjil</option>
          <option value="genap">Genap</option>
      </select>
  </div>
</div>
<div class="form-group">
    <div class="col-sm-2">
        {{Form::label('tahun','Tahun Ajaran')}}
    </div>                    
    <div class="col-lg-10">
        <select name="tahun_ajaran" class="form-control">
            <option value="">Tahun Ajaran</option>
            @for($i=date('Y'); $i>=date('Y')-3; $i-=1)
            <option value="{{ $i }}">{{$i}}</option>
            @endfor
        </select>                
    </div>                      
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {{ Form::submit('Buat Jadwal', ['class'=>'btn btn-primary','style'=>'width: 150px;']) }}
        <a href="{{ URL::to('administrator/jadwal') }}" class="btn btn-danger" style="width:150px;">Batal</a>
    </div>
</div>               
</div>
{{Form::close()}}
@stop

@section('jsAdd')
<!-- DATA TABES SCRIPT -->
<script src="{{ asset('assets1/js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets1/js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script> 
<!-- iCheck -->
<script type="text/javascript" src="{{ asset('packages/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $("#lM").dataTable();

        $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
            //Uncheck all checkboxes
            $("input[type='checkbox']").iCheck("uncheck");
        } else {
            //Check all checkboxes
            $("input[type='checkbox']").iCheck("check");
        }
        $(this).data("clicks", !clicks);
    });
    });
</script>    
@stop
