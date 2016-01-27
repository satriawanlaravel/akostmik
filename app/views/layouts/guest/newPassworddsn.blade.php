<!DOCTYPE html>
<html class="bg-grey">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo URL::to('assets2/img/stmik.png'); ?>">
    <title>New Password Dosen</title>    
    @include('layouts.guest.css')  
</head>
@include('addons.alert')
<body class="">
    <div class="form-box" id="login-box" style="width:385px">
        <div class="header"><b>New Password Dosen</b></div>
        {{ Form::open(['route' => 'new.passworddsn', 'class' => 'form-horizontal', 'role' => 'form']) }}
        <div class="body bg-gray">                
            <div class="form-group">
                Password
                {{ Form::password('password', ['class'=>'form-control','required','placeholder'=>'masukkan password anda']) }} 
            </div>
            <div class="form-group">
                Konfermasi Password
                {{ Form::password('password_confirmation', ['class'=>'form-control','required','placeholder'=>'masukkan ulang password anda']) }} 
            </div>   
            {{ Form::hidden('email', Input::get('email')) }}
            {{ Form::hidden('resetCode', Input::get('resetCode')) }}
            <button type="submit" class="btn bg-olive btn-block">Simpan Password</button>                
            Sudah punya <a href="{{ URL::to('/logindosen') }}">akun?</a> atau <a href="{{ URL::to('/') }}">Kembali?</a>
        </div>                        
        {{ Form::close() }}
        <div class="header">        
        </div>
        <br/><br/><br/>
    </div>
    @include('layouts.guest.js')   
</body>
</html>