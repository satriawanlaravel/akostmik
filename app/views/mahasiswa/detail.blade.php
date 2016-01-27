@extends('layouts.admin.index')
@section('content')
<div class="box tools">
    <div class="box-header">
        <h3 class="box-title"><b><u>DETAIL DATA MAHASISWA </u></b></h3>        
        <div class="box-tools">
            <div class="col-lg-4 pull-right">               
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding ">  
        <table class="table table-condensed table-hover">
            <tr>
                <th style="width: 250px;">NIM</th>
                <td>:</td>
                <td>{{ $mahasiswa->nim }}</td>
            </tr>            
            <tr>
                <th>Nama Mahasiswa</th>
                <td>:</td>
                <td>{{ $mahasiswa->nama_mahasiswa }}</td>
            </tr>  
            <tr>
                <th>Tempat Lahir</th>
                <td>:</td>
                <td>{{ $mahasiswa->tempat_lahir }}</td>
            </tr>  
            <tr>
                <th>Tanggal Lahir</th>
                <td>:</td>
                <td>{{ $mahasiswa->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ $mahasiswa->alamat }}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>:</td>
                <td>{{ $mahasiswa->telepon }}</td>
            </tr>   
            <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td>{{ $mahasiswa->jenis_kelamin }}</td>
            </tr>   
            <tr>
                <th>Agama</th>
                <td>:</td>
                <td>{{ $mahasiswa->agama }}</td>
            </tr>   
            <tr>
                <th>Angkatan</th>
                <td>:</td>
                <td>{{ $mahasiswa->angkatan }}</td>
            </tr>               
            <tr>
                <th>Nama Prodi</th>
                <td>:</td>
                <td>{{ $mahasiswa->Prodi->nama_prodi }}</td>
            </tr>             
        </table>        
        <div class="form-group">
            <a class="btn btn-primary btn-small pull-right" href="{{URL::to('administrator/mahasiswa')}}">
                <i class="icon-arrow-left icon-white" style="width:170px";></i> Kembali
            </a>       
        </div>
    </div> 
</div>  
@stop