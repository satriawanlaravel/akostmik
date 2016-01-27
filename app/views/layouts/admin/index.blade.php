<html>
<head>
  <title>Halaman Adminstrator</title>
  <link rel="shortcut icon" href="<?php echo URL::to('assets1/img/stmik.png') ?>">
  <!-- bootstrap 3.0.2 -->
  <link href="{{ asset('assets1/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets1/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets1/css/ionicons.min.css') }}" rel="stylesheet" type="text/css">    
  <link href="{{ asset('assets1/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets1/css/AdminLTE.css') }}" rel="stylesheet" type="text/css">
  @yield('cssAdd')
</head>
<body class="skin-blue">
  <!-- header logo: style can be found in header.less -->
  @include('layouts.admin.headeradmin') 
  <div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
      <!-- sidebar: style can be found in sidebar.less -->
      @include('layouts.admin.sitebaradmin') 
      <!-- /.sidebar -->
    </aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
      <!-- Content Header (Page header) -->
      @include('layouts.admin.pagehider')
      <!-- Main content -->
      <section class="content">
        @include('addons.alert')                               
        @yield('content')  
        @yield('contenttambahan')               
      </section><!-- /.content -->
    </aside><!-- /.right-side -->
  </div><!-- ./wrapper -->  

  <script src="{{ asset('assets1/jQuery/jQuery-2.1.3.min.js') }}" type="text/javascript"></script> 
  <script src="{{ asset('assets1/js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets1/js/bootstrap.min.js') }}" type="text/javascript"></script>
  @yield('jsAdd')
  <script src="{{ asset('assets1/js/AdminLTE/app.js') }}" type = "text/javascript"></script>  
</body>
</html>