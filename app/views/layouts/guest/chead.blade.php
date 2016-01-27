<section class="content-header">    
    <div class="code-wrap">
        <img src="{{ asset('assets2/img/logo.png')}}" alt="logo"> 
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->                
                <li class="user-menu">
                    {{ Form::open(['url' => '/cekLoginmhs','class'=>'form-inline','rol'=>'form']) }}
                    <div class="form-group">
                        {{ Form::email('email', Input::old('email'), ['class'=>'form-control','required','size'=>30,'placeholder'=>'masukkan email anda']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', ['class'=>'form-control','required','size'=>30,'placeholder'=>'********************']) }}
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Log in" class="btn btn-default" style="width: 100px;"/>
                    </div>
                    {{Form::close()}}
                </li>             
            </ul>
        </div>
    </div>
</section>