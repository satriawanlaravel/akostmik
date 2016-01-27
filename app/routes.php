<?php


$namespace = 'App\\Controllers\\';  
  /*
  |
  |--------------------------------------------------------------------------
  | Routes Aplikasi Kuesioner STMIK BUMIGORA MATARAM
  | Membuat Group Administrator
  |--------------------------------------------------------------------------
  |
 */
  Route::get('/auth/admin/login', $namespace.'LayoutController@login');
  Route::post('/cekLogin', $namespace.'AdminController@cekLogin');  
  Route::get('auth/admin/resetPasswordadmin',$namespace.'AdminController@resetPasswordadmin');
  Route::get('makeNewPasswordadmin', ['as' => 'forget.passwordadmin', 'uses' => 'App\\Controllers\\AdminController@makeNewPasswordadmin']);
  Route::post('prosesResetadmin', ['as' => 'resetPasswordadmin', 'uses' => 'App\\Controllers\\AdminController@prosesResetadmin']);
  Route::post('storeNewPasswordadmin', ['as' => 'new.passwordadmin', 'uses' => 'App\\Controllers\\AdminController@storePasswordadmin']);
  Route::Group(array('prefix' => 'administrator','before' => 'admin'), function(){

    $namespace = 'App\\Controllers\\';

    #==================administrator====================#
    Route::get('/', $namespace.'LayoutController@administrator');


    #==================Route Dosen====================#  
    Route::get('dosen', $namespace . 'DosenController@index');
    Route::post('dosen/importDosen', $namespace . 'DosenController@importDosen');
    Route::get('dosen/search', $namespace . 'DosenController@search');
    Route::get('dosen/detail{nik}', $namespace . 'DosenController@detail');
    Route::get('dosen/destroy{nik}', $namespace . 'DosenController@destroy');
    Route::get('dosen/edit{nik}', $namespace . 'DosenController@edit');
    Route::post('dosen/update{nik}', $namespace . 'DosenController@update');

    #==================prodi====================#
    Route::get('prodi', $namespace.'ProdiController@index');    
    Route::post('prodi/store', $namespace.'ProdiController@store');    
    Route::get('prodi/edit{kode_prodi}', $namespace . 'ProdiController@edit');
    Route::get('prodi/destroy{kode_prodi}',$namespace.'ProdiController@destroy');
    Route::post('prodi/update{kode_prodi}',$namespace .'ProdiController@update');

    #==================mahasiswa====================#
    Route::get('mahasiswa', $namespace . 'MahasiswaController@index');
    Route::post('mahasiswa/importMahasiswa', $namespace . 'MahasiswaController@importMahasiswa');
    Route::get('mahasiswa/destroy{nim}', $namespace . 'MahasiswaController@destroy');
    Route::get('mahasiswa/search', $namespace . 'MahasiswaController@search');
    Route::get('mahasiswa/detail{nim}', $namespace . 'MahasiswaController@detail');
    Route::get('mahasiswa/edit{nim}', $namespace . 'MahasiswaController@edit');
    Route::post('mahasiswa/update{nim}', $namespace . 'MahasiswaController@update');

    #==================matakuliah====================#
    Route::get('matakuliah', $namespace . 'MatakuliahController@index');
    Route::post('matakuliah/importMatakuliah', $namespace . 'MatakuliahController@importMatakuliah');
    Route::get('matakuliah/edit{kode_matakuliah}',$namespace .'MatakuliahController@edit');
    Route::post('matakuliah/update{kode_matakuliah}',$namespace .'MatakuliahController@update');
    Route::get('matakuliah/detail{kode_matakuliah}', $namespace .'MatakuliahController@detail');
    Route::get('matakuliah/destroy{kode_matakuliah}', $namespace . 'MatakuliahController@destroy');

    #==================Kelas====================#
    Route::get('kelas',$namespace.'KelasController@index');
    Route::post('kelas/store',$namespace.'KelasController@store');   
    Route::get('kelas/edit{idkelas}',$namespace.'KelasController@edit');
    Route::post('kelas/update{idkelas}', $namespace . 'KelasController@update');
    Route::get('kelas/destroy{idkelas}',$namespace.'KelasController@destroy');

    #==================KRS====================#
    Route::get('krs', $namespace . 'KrsController@index');
    Route::post('krs/importKrs', $namespace . 'KrsController@importKrs');
    Route::get('krs/search', $namespace . 'KrsController@search');
    Route::get('krs/destroy{id_krs}', $namespace . 'KrsController@destroy');

    #==================Ruangan====================# 
    Route::get('ruangan', $namespace . 'RuanganController@index');    
    Route::post('ruangan/store', $namespace . 'RuanganController@store');
    Route::get('ruangan/edit{kode_ruangan}', $namespace . 'RuanganController@edit');
    Route::post('ruangan/update{kode_ruangan}', $namespace . 'RuanganController@update');
    Route::get('ruangan/destroy{kode_ruangan}', $namespace . 'RuanganController@destroy');
    Route::get('ruangan/search', $namespace . 'RuanganController@search');

    #==================Pertanyaan====================#
    Route::get('pertanyaan', $namespace . 'PertanyaanController@index');    
    Route::post('pertanyaan/store', $namespace . 'PertanyaanController@store');
    Route::get('pertanyaan/edit{kode_pertanyaan}', $namespace . 'PertanyaanController@edit');
    Route::post('pertanyaan/update{kode_pertanyaan}', $namespace . 'PertanyaanController@update');
    Route::get('pertanyaan/destroy{kode_pertanyaan}', $namespace . 'PertanyaanController@destroy');
    Route::get('pertanyaan/search', $namespace . 'PertanyaanController@search');

    #==================jadwal====================#
    Route::get('jadwal', $namespace . 'JadwalController@index');
    Route::get('jadwal/create',$namespace . 'JadwalController@create');      
    Route::post('jadwal/bagiKelas',  $namespace . 'JadwalController@getKelas');
    Route::post('jadwal/saveKelas', $namespace . 'JadwalController@saveKelas');
    Route::get('jadwal/destroy{idjadwal}', $namespace . 'JadwalController@destroy');   

    #==================rekapitulasi====================#
    
    Route::get('rekapitulasi/filterData',$namespace . 'RekapController@filterData');
    Route::get('petunjuk',$namespace.'RekapController@petunjuk');    
    Route::get('rekapitulasi',$namespace . 'RekapController@index');
    Route::post('rekapitulasi/filterShowdata',$namespace .'RekapController@filterShowdata');
    Route::get('rekapitulasi/allresponden',$namespace . 'RekapController@allresponden');
    Route::post('rekapitulasi/filterAlldata',$namespace .'RekapController@filterAlldata');
    Route::get('rekapitulasi/terevaluasi',$namespace . 'RekapController@terevaluasi');
    Route::post('rekapitulasi/filterAllterevaluasi',$namespace .'RekapController@filterAllterevaluasi');
    Route::get('rekapitulasi/cetakLaporan',$namespace.'RekapController@cetakLaporan');    
    Route::post('rekapitulasi/exportExcel',$namespace.'RekapController@exportExcel');
    Route::get('rekapitulasi/cetakLap',$namespace .'RekapController@cetakLap');


   #==================admin====================#
    //Route::post('storePasswordadmin', $namespace .'AdminController@storePasswordadmin');
    Route::post('register',$namespace.'AdminController@register');
    Route::get('profile', $namespace .'AdminController@profile');
    Route::get('ubahPassword',$namespace .'AdminController@ubahPassword');
    Route::get('tambahAkun',$namespace .'AdminController@tambahAkun');
    Route::get('logout', $namespace.'AdminController@logout');

  });  

Route::get('/pilih', function(){

  $jur = Input::get('jur');

  $matakuliah = App\Models\Matakuliah::where('kode_prodi' ,'=',$jur)->get();

  return Response::json($matakuliah);              
});

  /*
  |
  |--------------------------------------------------------------------------
  | Routes Aplikasi Kuesioner STMIK BUMIGORA MATARAM
  | Membuat Group Mahasiswa
  |--------------------------------------------------------------------------
  |
 */

  Route::get('/', $namespace.'LayoutController@index');
  Route::post('/registermhs', $namespace.'GuestController@registermhs');
  Route::get('/activateMe', array('as' => 'activate.me','uses' =>'App\\Controllers\\GuestController@activateMe'));  
  Route::get('makeNewPassword', ['as' => 'forget.password', 'uses' => 'App\\Controllers\\GuestController@makeNewPassword']);
  Route::post('prosesResetmhs', ['as' => 'resetPasswordmhs', 'uses' => 'App\\Controllers\\GuestController@prosesResetmhs']);
  Route::post('storeNewPassword', ['as' => 'new.password', 'uses' => 'App\\Controllers\\GuestController@storePassword']);
  Route::post('/cekLoginmhs', $namespace.'GuestController@cekLoginmhs');
  Route::get('/resetPasswordmhs',$namespace.'GuestController@resetPasswordmhs');
  Route::Group(array('prefix' => 'mahasiswa','before' => 'mahasiswa'), function(){

    $namespace = 'App\\Controllers\\';
    #==================mahasiswa====================#
    Route::get('/', $namespace.'LayoutController@mahasiswa');    

    #==================Kuesioner====================#
    Route::get('kuesioner', $namespace . 'KuesionerController@index');
    Route::get('kuesioner/isiKuis{kode_matakuliah}', $namespace . 'KuesionerController@isiKuis');
    Route::post('kuesioner/saveKuis',$namespace . 'KuesionerController@saveKuis');    

    #==================profile dan ubah akun====================#
    Route::get('/profile', $namespace .'GuestController@profile');
    Route::get('/ubahPassword',$namespace.'GuestController@ubahPassword');

    #==================logout===================================#
    Route::get('logoutmhs', $namespace .'GuestController@logoutmhs');

  });

  /*
  |
  |--------------------------------------------------------------------------
  | Routes Aplikasi Kuesioner STMIK BUMIGORA MATARAM
  | Membuat Group Dosen
  |--------------------------------------------------------------------------
  |
 */

  Route::get('/logindosen', $namespace.'LayoutController@logindosen');
  Route::post('/cekLogindsn', $namespace.'RegulerController@cekLogindsn');  
  Route::get('resetPassworddsn',$namespace.'RegulerController@resetPassworddsn');
  Route::get('makeNewPassworddsn', ['as' => 'forget.passworddsn', 'uses' => 'App\\Controllers\\RegulerController@makeNewPassworddsn']);
  Route::get('activateMedsn', array('as' => 'activate.medsn','uses' =>'App\\Controllers\\RegulerController@activateMedsn'));  
  Route::post('prosesResetdsn', ['as' => 'resetPassworddsn', 'uses' => 'App\\Controllers\\RegulerController@prosesResetdsn']);
  Route::post('storeNewPassworddsn', ['as' => 'new.passworddsn', 'uses' => 'App\\Controllers\\RegulerController@storePassworddsn']);
  Route::get('/register', $namespace.'LayoutController@register');
  Route::post('/registerdsn', $namespace.'RegulerController@registerdsn');

  Route::Group(array('prefix' => 'dosen','before' => 'dosen'), function(){

    $namespace = 'App\\Controllers\\';
    Route::get('/profile', $namespace .'RegulerController@profile');

    #==================dosen====================#
    Route::get('/', $namespace.'LayoutController@dosen');
    Route::get('logoutdsn', $namespace .'RegulerController@logoutdsn');
    
    #==================Rekap====================#
    Route::get('dosenrekap',$namespace . 'RekapController@indexd');
    Route::get('dosenrekap/cetakLapdosen',$namespace .'RekapController@cetakLapdosen');

    #==================Ubah Password====================#
    Route::get('/ubahPassword',$namespace.'RegulerController@ubahPassword');
  });

  

  Route::get('/test',$namespace.'AdminController@cript');