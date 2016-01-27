@extends('layouts.admin.index')
@section('content')
<div class="box tools">
    <div class="box-header">
        <h3 class="box-title"><b><u>DETIL DATA MATAKULIAH </u></b></h3>        
        <div class="box-tools">
            <div class="col-lg-4 pull-right">               
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding ">  
        <table class="table table-condensed table-hover">
            <tr>
                <th style="width: 250px;">Kode Matakuliah</th>
                <td>:</td>
                <td>{{ $matakuliah->kode_matakuliah }}</td>
            </tr>            
            <tr>
                <th>Nama Matakuliah</th>
                <td>:</td>
                <td>{{ $matakuliah->nama_matakuliah }}</td>
            </tr>  
            <tr>
                <th>Kode Prodi</th>
                <td>:</td>
                <td>{{ $matakuliah->Prodi->nama_prodi }}</td>
            </tr>  
            <tr>
                <th>SKS Teori</th>
                <td>:</td>
                <td>{{ $matakuliah->sks_teori }}</td>
            </tr>  
            <tr>
                <th>SKS Praktek</th>
                <td>:</td>
                <td>{{ $matakuliah->sks_praktek }}</td>
            </tr>
            <tr>
                <th>SKS Praktikum</th>
                <td>:</td>
                <td>{{ $matakuliah->sks_praktikum }}</td>
            </tr>            
        </table>        
        <div class="form-group">
            <a class="btn btn-primary btn-small pull-right" href="{{URL::to('/administrator/matakuliah')}}">
                <i class="icon-arrow-left icon-white"></i> Kembali
            </a>       
        </div>
    </div> 
</div>  
@stop