<?php namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\matkulProdi;
use App\Models\viewKelas;
use Validator;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class JadwalController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$jadwal =Jadwal::all();    
      return View::make('jadwal.index')
      ->with('jadwal',$jadwal);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
    	return View::make('jadwal.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getKelas() {
    	$kodeProdi = Input::get('jurusan');
    	$namaMatakuliah = Input::get('matakuliah');
    	if (empty($namaMatakuliah)) {    		
    		return Redirect::intended('administrator/jadwal/create')        
        ->with('msge', 'Maaf,,,,<br>Lengkapi Inputan anda!');
      } else { 

        $getKelas = DB::table('prodi')
        ->join('mahasiswa','prodi.kode_prodi','=','mahasiswa.kode_prodi')
        ->join('krs','krs.nim','=','mahasiswa.nim')
        ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
        ->where('prodi.kode_prodi','=',$kodeProdi)
        ->where('matakuliah.kode_matakuliah','=',$namaMatakuliah)
        ->get();

          /*dd(Input::all());
          dd($datagetkelas);*/


          if(($getKelas) == null){
           Session::flash('msge','Maaf,,,<br>Tidak ada mahasiswa yang mengambil matakuliah tersebut.');
           return Redirect::to('administrator/jadwal/create');
         }else{
           return View::make('jadwal.bagiKelas')->with('bagi',$getKelas);
         }
       }
     }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function saveKelas() {
      $rules = array(
        'id_krs' => 'required',
        'idkelas' => 'required',
        'kode_ruangan' => 'required',
        'gangep' => 'required',
        'tahun_ajaran' => 'required',
        'nik' => 'required',
        );
      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails()) {
        return Redirect::to('administrator/jadwal')
        ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
      } else {
        $counter = 0;
        foreach (Input::get('id_krs') as $key => $idkrs) {
          $data = array(
           'id_krs' => $idkrs,
           'idkelas' => Input::get('idkelas'),
           'nik' => Input::get('nik'),
           'kode_ruangan' => Input::get('kode_ruangan'),
           'gangep' => Input::get('gangep'),
           'tahun_ajaran' => Input::get('tahun_ajaran'),
           );          

          $tambah = Jadwal::create($data);

          if ($tambah)
            $counter++;
        }
        if ($counter > 0) {
          Session::flash('msgs', 'Sukses, Jadwal berhasil dibuat!!');
        }else{
         Session::flash('msge', 'Ada kesalahan, coba lagi!');
       }
       return Redirect::to('administrator/jadwal');
     }
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($idjadwal) {
    	$kelas = Jadwal::find($idjadwal);
    	$kelas->delete();    	
    	return Redirect::to('/administrator/jadwal')
      ->with('msgs',$kelas->krs->mahasiswa->nama_mahasiswa.' berhasil dihapus dari kelas '.'<b>'.$kelas->kelas->kelas.'<b/>');
    }

    public function pilihJUrusan(){
    	$jurusan = DB::table('prodi');
    	$datajur = array(
       'jurusan' => $jurusan,
       );
    	return View::make('kelasjadwal.create', $datajur);   
    }

  }
