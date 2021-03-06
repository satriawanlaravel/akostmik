<!DOCTYPE html>
<html class="bg-grey">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo URL::to('assets2/img/stmik.png'); ?>">
    <title>Reset Password Dosen</title>    
    @include('layouts.guest.css')  
</head>
@include('addons.alert')
<body class="">
    <div class="form-box" id="login-box" style="width:385px">
        <div class="header">Reset Password<br/><br/><b>DOSEN</b></div>
        <form action="{{ URL::to('/prosesResetdsn') }}" method="POST">
            <div class="body bg-gray">            
                <div class="form-group">
                    Email
                    {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'required','placeholder'=>'masukkan email anda']) }}
                </div>                
                <button type="submit" class="btn bg-olive btn-block"><i class="fa fa-refresh"> Reset Password</i></button>                
                Sudah punya <a href="{{ URL::to('/') }}">akun?</a>
            </div>                        
        </form>
        <div class="header">        
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    </div>
    @include('layouts.guest.js')   
</body>
</html>