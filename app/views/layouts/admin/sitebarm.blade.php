<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('assets1/img/avatar5.png') }}" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
      <p>
       {{ Sentry::getUser()->first_name }}
     </p>
     <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
   </div>
 </div>
 <!-- search form -->
 <form action="#" method="get" class="sidebar-form">
  <div class="input-group">
    <input type="text" name="q" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
      <button type="submit" name="seach" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
    </span>
  </div>
</form>
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
  <li class="active">
    <a href="{{ URL::to('mahasiswa') }}">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>                     
  <li class="active">
    <a href="{{ URL::to('/mahasiswa/kuesioner') }}">
      <i class="glyphicon glyphicon-list-alt"></i> <span>Isi Kuesioner</span>           
    </a>        
  </li>
  <li class="active">
    <a href="{{ URL::to('mahasiswa/ubahPassword') }}">
      <i class="glyphicon glyphicon-cog"></i><span>Manajemen Akun</span>            
    </a>        
  </li>       
</ul>
</section>
<!-- /.sidebar -->
