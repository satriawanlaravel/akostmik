<section class="sidebar">

    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('assets1/img/avatar5.png') }}" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>
                {{ Sentry::getUser()->first_name }}
            </br>            
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="seach" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>
<ul class="sidebar-menu">
    <li class="active">
        <a href="{{ URL::to('administrator') }}">
            <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span>
        </a>
    </li>        
    <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-book"></i>
            <span>Data Master</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('administrator/dosen') }}"><i class="fa fa-angle-double-right"></i> Dosen</a></li>
            <li><a href="{{ URL::to('administrator/mahasiswa') }}"><i class="fa fa-angle-double-right"></i> Mahasiswa</a></li>
            <li><a href="{{ URL::to('administrator/prodi') }}"><i class="fa fa-angle-double-right"></i> Program Studi</a></li>
            <li><a href="{{ URL::to('administrator/matakuliah') }}"><i class="fa fa-angle-double-right"></i> Matakuliah</a></li>
            <li><a href="{{ URL::to('administrator/krs') }}"><i class="fa fa-angle-double-right"></i> KRS</a></li>
            <li><a href="{{ URL::to('administrator/kelas') }}"><i class="fa fa-angle-double-right"></i> Kelas</a></li>
            <li><a href="{{ URL::to('administrator/ruangan') }}"><i class="fa fa-angle-double-right"></i> Ruangan</a></li>
            <li><a href="{{ URL::to('administrator/pertanyaan') }}"><i class="fa fa-angle-double-right"></i> Pertanyaan</a></li>               
        </ul>
    </li>
    <li class="active">
        <a href="{{ URL::to('administrator/jadwal') }}">
            <i class="glyphicon glyphicon-list-alt"></i><span>Data Mengajar</span>            
        </a>        
    </li>
    <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i>
            <span>Rekapitulasi PBM</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('administrator/rekapitulasi') }}"><i class="fa fa-angle-double-right"></i> Hasil Evaluasi</a></li>
            <li><a href="{{ URL::to('administrator/rekapitulasi/allresponden') }}"><i class="fa fa-angle-double-right"></i> Total Mahasiswa / Prodi</a></li>
            <li><a href="{{ URL::to('administrator/rekapitulasi/terevaluasi') }}"><i class="fa fa-angle-double-right"></i> Matakuliah Terevaluasi</a></li>
            <li><a href="{{ URL::to('administrator/rekapitulasi/cetakLaporan') }}"><i class="fa fa-angle-double-right"></i> Cetak Laporan</a></li>            
        </ul>
    </li>  

    <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-cog"></i>
            <span>Manajemen Akun</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('administrator/tambahAkun') }}"><i class="fa fa-angle-double-right"></i> Tambah Akun</a></li>
            <li><a href="{{ URL::to('administrator/ubahPassword') }}"><i class="fa fa-angle-double-right"></i> Ubah Akun</a></li>                        
        </ul>
    </li>      
</ul>
</section>
