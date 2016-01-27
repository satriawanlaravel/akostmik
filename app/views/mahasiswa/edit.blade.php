@extends('layouts.admin.index')
@section('content')
@include('addons.alert')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-plus-square-o"></i> Ubah Mahasiswa
        </h3>        
    </div><!-- /.box-header --> 
    <hr/>
    <div class="box-body"> 
       <form action="{{ URL::to('administrator/mahasiswa/update'. $mahasiswa->nim); }}" method="POST" accept-charset="utf-8" class="form-horizontal">
           <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('nim','NIM')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('nim', $mahasiswa->nim, array('class' => 'form-control','required','placeholder'=>'NIM')) }}
            </div>
        </div>   
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('nama_mahasiswa','Nama Mahasiswa')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('nama_mahasiswa', $mahasiswa->nama_mahasiswa, array('class' => 'form-control','required','placeholder'=>'Nama Mahasiswa')) }}
            </div>
        </div> 
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('tempat_lahir','Tempat Lahir')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('tempat_lahir', $mahasiswa->tempat_lahir, array('class' => 'form-control','required','placeholder'=>'Tempat Lahir')) }}
            </div>
        </div> 
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('tanggal_lahir','Tanggal Lahir')}}
            </div>
            <div class="col-lg-10"> 
                {{Form::input('date', 'tanggal_lahir', $mahasiswa->tanggal_lahir, ['class' => 'form-control', 'required','placeholder' => 'tanggal lahir']);}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('alamat','Alamat')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('alamat', $mahasiswa->alamat, array('class' => 'form-control','required','placeholder'=>'Alamat')) }}
            </div>
        </div> 
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('telepon','Telepon')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::text('telepon', $mahasiswa->telepon, array('class' => 'form-control','required','placeholder'=>'Telepon')) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                {{Form::label('jenis_kelamin','Jenis Kelamin')}}
            </div>
            <div class="col-lg-10"> 
                {{ Form::select('jenis_kelamin', array(''=>'--Pilih Jenis Kelamin--',
                    'L' => 'Laki - Laki',
                    'P' => 'Perempuan'),
                    null,array('class' => 'form-control','required')) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    {{Form::label('agama','Agama')}}
                </div>
                <div class="col-lg-10"> 
                    {{ Form::select('agama', array(''=>'--Pilih Agama--',
                        'Islam' => 'Islam',
                        'Kristen' => 'Kristen',
                        'Hindu' => 'Hindu',
                        'Katolik' => 'Katolik',
                        'Konghucu' => 'Konghucu',
                        'Budha' => 'Budha'),
                        null, array('class' => 'form-control','required')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        {{Form::label('angkatan','Angkatan')}}
                    </div>
                    <div class="col-lg-10"> 
                        {{ Form::text('angkatan', $mahasiswa->angkatan, array('class' => 'form-control','required','placeholder'=>'angkatan')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        {{Form::label('kode_prodi','Program Studi')}}
                    </div>
                    <div class="col-lg-10">                 
                        {{ Form::select('kode_prodi', array('' => '--Pilih Prodi--')
                            +App\Models\Prodi::lists('nama_prodi','kode_prodi'),
                            null, array('class' => 'form-control','required')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Ubah', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}
                            <a href="{{ URL::to('administrator/mahasiswa') }}" class="btn btn-danger" style="width : 110px">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @stop
