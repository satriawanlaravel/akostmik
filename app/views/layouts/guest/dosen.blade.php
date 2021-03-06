<!DOCTYPE html>
<html class="bg-grey">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo URL::to('assets2/img/stmik.png'); ?>">
    <title>Login Dosen</title>
    @include('layouts.guest.css')  
</head>
<body class="">
    <div class="form-box" id="login-box" style="width:365px">
        @include('addons.alert')
        <div class="header">Login<br/><br/><b>D O S E N</b></div>
        <form action="{{ URL::to('/cekLogindsn') }}" method="post">
            <div class="body bg-gray">
                <div class="form-group">
                    Email
                    {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'required','placeholder'=>'masukkan email anda']) }}
                </div>
                <div class="form-group">
                    Password
                    {{ Form::password('password', ['class'=>'form-control', 'required','placeholder'=>'*******************']) }}
                </div>
                <button type="submit" class="btn bg-olive btn-block"><i class="fa fa-sign-in"> Login</i></button>
                <a href="{{ URL::to('/register') }}">->> Buat akun</a><br>
                <a href="{{ URL::to('/resetPassworddsn') }}">->> Reset Password</a><br>
                <a href="{{ URL::to('/') }}">->> Kembali</a>                
            </div>
        </form>
        <div class="header">
        </div>     
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>   
    </div>
    @include('layouts.guest.js')
</body>
</html>