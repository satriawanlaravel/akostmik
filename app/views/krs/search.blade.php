@extends('layouts.admin.index')
@section('content')
@if(count($krs)==0)
<div class="alert alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <h4>Informasi!</h4>
    <p>Data Tidak Ditemukan!!</p>         
    <p>
        <a href="{{URL::to('administrator/krs')}}" class="btn btn-danger">Kembali Pencarian Data</a>  
    </p>
</div>
@else
<div class="box tools">
    <div class="box-header">
        <h3 class="box-title"><b><u>DATA KRS</u></b></h3>  
        <div class="box-tools">
            <div class="col-lg-4 pull-right">
                <form action="{{URL::to('/administrator/krs/carikrs')}}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" placeholder="NIM Mahasiswa">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> Search!</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding ">            
        <table class="table table-bordered table-hover">
            <tr class="active">
                <th class="text-center" style="width: 200px;">NIM</th>
                <th class="text-center">Nama Mahasiswa</th>
                <th class="text-center">Semester</th>                
                <th class="text-center">Matakuliah</th>                
                <th class="text-center">Status KRS</th>                
                <th class="text-center" style="width: 100px;">Aksi</th>                
            </tr>
            <tr>
                @foreach ($krs as $value)
                <td class="text-center">{{ $value->nim }}</td>
                <td class="text-center">{{$value->mahasiswa->nama_mahasiswa}}</td>
                <td class="text-center">{{ $value->semester }}</td>
                <td>{{ $value->matakuliah->nama_matakuliah }}</td>
                <td>{{ $value->status_krs }}</td>
                <td class="text-center">                   
                    <a href="{{ URL::to('administrator/krs/delete'. $value->id_krs) }}" onclick="return confirm('Yakin ingin hapus data ini!')" class="glyphicon glyphicon-trash"></a>                                      
                </td>
            </tr>
            @endforeach
        </table>        
    </div>
    <div class="form-group">
        <a class="btn btn-primary btn-small pull-right" href="{{URL::to('/administrator/krs')}}">
            <b class="icon-arrow-left icon-white" style="width: 173px;">Kembali</b> 
        </a>       
    </div>
</div>
@endif
@stop