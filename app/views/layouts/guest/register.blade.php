<!DOCTYPE html>
<html class="bg-grey">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo URL::to('assets2/img/stmik.png'); ?>">
    <title>Register Dosen</title>    
    @include('layouts.guest.css')  
</head>
@include('addons.alert')
<body class="">
    <div class="form-box" id="login-box" style="width:385px">
        <div class="header">Form Pendaftaran<br/><br/><b>A K U N - D O S E N</b></div>
        <form action="{{ URL::to('/registerdsn') }}" method="post">
            <div class="body bg-gray">
                <div class="form-group">
                    NIK
                    {{ Form::text('nik', Input::old('nik'), ['class'=>'form-control','required','placeholder'=>'NIK']) }}
                </div>
                <div class="form-group">
                    Nama Depan
                    {{ Form::text('first_name', Input::old('first_name'), ['class'=>'form-control','required','placeholder'=>'nama depan']) }}                
                </div>          
                <div class="form-group">
                    Nama Belakang
                    {{ Form::text('last_name', Input::old('last_name'), ['class'=>'form-control','required','placeholder'=>'nama belakang']) }}                
                </div>          
                <div class="form-group">
                    Email
                    {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'required','placeholder'=>'masukkan email anda']) }}
                </div>
                <div class="form-group">
                    Password
                    {{ Form::password('password', ['class'=>'form-control','required','placeholder'=>'masukkan password anda']) }} 
                </div>
                <div class="form-group">
                    Konfermasi Password
                    {{ Form::password('password_confirmation', ['class'=>'form-control','required','placeholder'=>'masukkan ulang password anda']) }} 
                </div>            
                <button type="submit" class="btn bg-olive btn-block">Register</button>                
                Sudah punya <a href="{{ URL::to('/logindosen') }}">akun?</a> atau <a href="{{ URL::to('/') }}">Kembali?</a>
            </div>                        
        </form>
        <div class="header">        
        </div>
        <br/><br/><br/>
    </div>
    @include('layouts.guest.js')   
</body>
</html>