@extends('layouts.admin.index')
@section('content')
<div class="box tools">
    <div class="box-header">
        <h3 class="box-title"><b><u>DETIL DATA DOSEN </u></b></h3>        
        <div class="box-tools">
            <div class="col-lg-4 pull-right">               
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding ">  
        <table class="table table-condensed table-hover">
            <tr>
                <th style="width: 250px;">NIK</th>
                <td>:</td>
                <td>{{ $dosen->nik }}</td>
            </tr>            
            <tr>
                <th>Nama Dosen</th>
                <td>:</td>
                <td>{{ $dosen->nama_dosen }}</td>
            </tr>  
            <tr>
                <th>Field Studi</th>
                <td>:</td>
                <td>{{ $dosen->field_studi }}</td>
            </tr>  
            <tr>
                <th>Alumni</th>
                <td>:</td>
                <td>{{ $dosen->alumni }}</td>
            </tr>
            <tr>
                <th>Status Dosen</th>
                <td>:</td>
                <td>{{ $dosen->status_dosen }}</td>
            </tr>
            <tr>
                <th>Alamat Email</th>
                <td>:</td>
                <td>{{ $dosen->alamat_email }}</td>
            </tr>               
        </table>        
        <div class="form-group">
            <a class="btn btn-primary btn-small pull-right" href="{{URL::to('administrator/dosen')}}">
                <i class="icon-arrow-left icon-white"></i> Kemabli
            </a>       
        </div>
    </div> 
</div>  
@stop