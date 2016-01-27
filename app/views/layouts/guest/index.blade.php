<!DOCTYPE html>
<html>    
<title>AKOSTMIK-Bumigora</title>
<head>
    <link rel="shortcut icon" href="<?php echo URL::to('assets2/img/stmik.png'); ?>">
    @include('layouts.guest.css')                
</head>        
<body class="skin-blue fixed">
    <header class="header">
        <b class="logo" style="font-family: fantasy">
        </b>    
        <nav class="navbar navbar-static-top" role="navigation">        
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left"> 
        <aside class="right-side">  
            @include('layouts.guest.chead')                
            <div class="content">                                                        
             @include('addons.alert')
               <section>    
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="well-sm">                                                         
                                <div  id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img class="img-rounded" src="{{asset('image/bg1.png')}}" alt="First slide">
                                        </div>
                                        <div class="item">
                                            <img class="img-rounded" src="{{asset('image/bg2.png')}}" alt="Second slide">
                                        </div>
                                        <div class="item">
                                            <img class="img-rounded" src="{{asset('image/bg3.png')}}" alt="Third slide">
                                        </div>
                                        <div class="item">
                                            <img class="img-rounded" src="{{asset('image/bg4.png')}}" alt="four slide">
                                        </div>
                                        <div class="item">
                                            <img class="img-rounded" src="{{asset('image/bg5.png')}}" alt="five slide">
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                                <h5 align ="justify" style="font: sans-serif;">
                                    Sistem Informasi Kuesioner-Online STMIK bumigora mataram merupakan 
                                    sistem informasi yang mengelolah data proses belajar mengajar.
                                    Sistem ini bertujuan untuk mengevaluasi proses belajar mengajar guna meningkatkan kualitas 
                                    dan kuantitas pembelajaran yang berlangsung di STMIK Bumigora Mataram.
                                    Website STMIK Bumigora Mataram : <a href="http://stmikbumigora.ac.id">stmikbumigora.ac.id</a>
                                </h5>
                                {{-- <a href="{{URL::to('/login')}}" >
                                    {{ Form::submit('Log In Administrator', array('class' => 'btn btn-primary','style'=>'width: 173px;','role'=>'form')) }}
                                </a> --}}
                                <a href="{{URL::to('/logindosen')}}" >
                                    {{ Form::submit('Log In Dosen', array('class' => 'btn btn-primary','style'=>'width: 173px;','role'=>'form')) }}
                                </a>
                                <br/>
                                <br/>
                                Copyright © 2015 STMIK Bumigora Mataram <br/>
                                Created By : Satriawan-Samawa<br/>
                                Email : satriawanlaravel@gmail.com
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <h2 style="color:#2064ff;"><i class="fa fa-cloud-upload fa-fw fa-2x"></i>Create Acount</h2>
                            <p style="color:#4e5d6c;">
                                <i>Bagi mahasiswa yang belum memiliki acount, silahkan buat acount anda untuk bisa mengakses website aplikasi kuesioner PBM ini.</i>   
                            </p>
                            <div class="box-tools">
                                <div class="well-sm">  
                                    {{ Form::open(['url' => '/registermhs','class'=>'form-horizontal']) }}
                                    <div class="form-group">
                                        {{ Form::text('nim', Input::old('nim'), ['class' => 'form-control', 'required','placeholder'=>'NIM']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('first_name', Input::old('first_name'), ['class' => 'form-control', 'required','placeholder'=>'nama depan']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::text('last_name', Input::old('last_name'), ['class' => 'form-control', 'required','placeholder'=>'nama belakang']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'required','placeholder'=>'masukkan email anda']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::password('password', ['class'=>'form-control', 'required','placeholder'=>'************************']) }}
                                    </div>
                                    <div class="form-group">
                                      {{ Form::password('password_confirmation', ['class'=>'form-control', 'required','placeholder'=>'************************']) }}
                                  </div>       
                                  <div class="form-group">
                                      <input type="submit" name="register" value="Register" class="btn btn-primary" style="width: 170px;"/>
                                      <a href="{{ URL::to('/resetPasswordmhs') }}" class="btn btn-primary" style="width: 170px;"><i class="fa fa-refresh"></i> Reset Password</a>
                                  </div>
                                  {{ Form::close() }}
                              </div>
                          </div> 
                      </div>       
                  </div>
              </div>
          </section>
      </div>
  </aside>
</body>
@include('layouts.guest.js')
</html>
