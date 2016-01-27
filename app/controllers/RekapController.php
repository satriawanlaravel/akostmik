<?php namespace App\Controllers;
use App\Models\Rekap;
use App\Controllers\BaseController;
use View;
use Input;
use Redirect;
use DB;
use Maatwebsite\Excel\Excel;
/**
* Hasil Rekapan kuesioner 
*/
class RekapController extends Excel{


	public function indexd(){
		$rekap = Rekap::all();
		$datarekap = ['rkp' => $rekap ];
		return View::make('dosenrekap.index',$datarekap);
	}

	public function cetakLapdosen(){
		$prodi = Input::get('prodi');
		$gangep = Input::get('gangep');
		$tahun = Input::get('tahun');
		
		$rekap1 = DB::table('v_interprestasi')
		->where('kode_prodi','=',$prodi)
		->where('gangep','=',$gangep)
		->where('tahun_ajaran','=',$tahun)
		->get();		
		$rekap2 = DB::table('v_Persentase_JmlMhs_PerProdi')
		->where('kode_prodi','=',$prodi)
		->where('gangep','=',$gangep)
		->where('tahun_ajaran','=',$tahun)
		->get();	
		$rekap3 = DB::table('v_persentase_terevaluasi_takterevaluasi')
		->where('kode_prodi','=',$prodi)
		->where('gangep','=',$gangep)
		->where('tahun_ajaran','=',$tahun)
		->get();			
		$rekap4 = DB::table('v_jadwal')
		->where('kode_prodi','=',$prodi)
		->where('gangep','=',$gangep)
		->where('tahun_ajaran','=',$tahun)
		->get();				
		$datarekap = [
		'cetak1' => $rekap1,
		'cetak2' => $rekap2,
		'cetak3' => $rekap3,
		'cetak4' => $rekap4,	
		];						
		if(($rekap1)==null || ($rekap2)==null || ($rekap3)==null || ($rekap4)==null){
			echo "Tidak ada data.";
			exit;
		}else{
			return View::make('dosenrekap.cetakLapdosen',$datarekap);	
		}
	}
#-------------------Rekapan Untuk Administrator--------------------------
	public function index(){	
		return View::make('rekapitulasi.index');
	}

	public function filterShowdata(){
		$prodi = Input::get('kode_prodi');
		$gangep = Input::get('gangep');
		$tahun = Input::get('tahun_ajaran');
		if(empty($prodi) || empty($gangep) || empty($tahun)){
			return Redirect::to('administrator/rekapitulasi')
			->with('msge', 'Maaf.....<br>Inputan tidak beleh ada yang kosong!');
		}else{
			$rekap = DB::table('v_interprestasi')
			->where('kode_prodi','=',$prodi)
			->where('gangep','=',$gangep)
			->where('tahun_ajaran','=',$tahun)
			->get();				
			$datarekap = ['rkp' => $rekap];	
			if(($rekap) == null){
				return Redirect::to('administrator/rekapitulasi')
				->with('msge', 'Maaf.....<br>Tidak ada data di database!');
			}else{
				return View::make('rekapitulasi.show',$datarekap);
			}
		}
	}

	public function allresponden(){	
		return View::make('rekapitulasi.allresponden');
	}

	public function filterAlldata(){
		$prodi = Input::get('kode_prodi');
		$gangep = Input::get('gangep');
		$tahun = Input::get('tahun_ajaran');
		if(empty($prodi) || empty($gangep) || empty($tahun)){
			return Redirect::to('administrator/rekapitulasi/allresponden')
			->with('msge', 'Maaf.....<br>Inputan tidak boleh ada yang kosong!');
		}else{
			$rekap = DB::table('v_Persentase_JmlMhs_PerProdi')
			->where('kode_prodi','=',$prodi)
			->where('gangep','=',$gangep)
			->where('tahun_ajaran','=',$tahun)
			->get();		

			$datagrafik = ['all' => $rekap];	
			if(($rekap) == null){
				return Redirect::to('administrator/rekapitulasi/allresponden')
				->with('msge', 'Maaf.....<br>Tidak ada data didatabase!');
			}else{
				return View::make('rekapitulasi.showall',$datagrafik);			
			}
		}
	}

	public function terevaluasi(){	
		return View::make('rekapitulasi.terevaluasi');
	}

	public function filterAllterevaluasi(){
		$prodi = Input::get('kode_prodi');
		$gangep = Input::get('gangep');
		$tahun = Input::get('tahun_ajaran');
		if(empty($prodi) || empty($gangep) || empty($tahun)){
			return Redirect::to('administrator/rekapitulasi/terevaluasi')
			->with('msge', 'Maaf.....<br>Inputan tidak boleh ada yang kosong!');
		}else{
			$rekap = DB::table('v_persentase_terevaluasi_takterevaluasi')
			->where('kode_prodi','=',$prodi)
			->where('gangep','=',$gangep)
			->where('tahun_ajaran','=',$tahun)
			->get();		

			$dataevaluasi = ['evaluasi' => $rekap];	
			if(($rekap) == null){
				return Redirect::to('administrator/rekapitulasi/terevaluasi')
				->with('msge', 'Maaf.....<br>Tidak ada data di database!');
			}else{
				return View::make('rekapitulasi.showterevaluasi',$dataevaluasi);
			}
		}
	}


	public function cetakLaporan(){
		return View::make('rekapitulasi.cetakLaporan');
	}


	public function exportExcel(){
		$prodi = Input::get('kode_prodi');
		$gangep = Input::get('gangep');
		$tahun = Input::get('tahun_ajaran');
		if(empty($prodi) || empty($gangep) || empty($tahun)){
			return Redirect::to('administrator/rekapitulasi/cetakLaporan')
			->with('msge', 'Maaf.....<br>Inputan tidak boleh ada yang kosong!');
		}else{
			$rekap1 = DB::table('v_interprestasi')
			->where('kode_prodi','=',$prodi)
			->where('gangep','=',$gangep)
			->where('tahun_ajaran','=',$tahun)
			->get();
			Excel::create('Laporan Evaluasi Proses Belajar Mengajar', function($excel) use ($rekap1) {
			// Set the properties
				$excel->setTitle('Evaluasi Proses Belajar Mengajar')
				->setCreator('STMIK Bumigora Mataram');
				$excel->sheet('Data PBM', function($sheet) use ($rekap1) {
					$row = 1;
					$sheet->row($row, array(
						'No',
						'Kode Prodi',
						'Nama Matakuliah',
						'Nama Dosen',
						'Semester',
						'Kelas',
						'Total Mahasiswa',
						'Total Mahasiswa Isi',
						'Total Mahasiswa Tidak Isi',
						'Presentase Index',
						'Keterangan',
						'Tahun Ajaran'
						));
					$no = 1;						
					foreach ($rekap1 as $val) {						
						$sheet->row(++$row, array(
							$no++,
							$val->kode_prodi,
							$val->nama_matakuliah,
							$val->nama_dosen,
							$val->semester,
							$val->kelas,
							$val->tot_mahasiswa,
							$val->tot_mhs_isi,
							$val->tot_mhs_tdk_isi,
							$val->PresentaseIndex,
							$val->keterangan,
							$val->tahun_ajaran
							));
					}
				});
			})->export('xls');
}
}

public function cetakLap(){
	$prodi = Input::get('prodi');
	$gangep = Input::get('gangep');
	$tahun = Input::get('tahun');
	
	$rekap1 = DB::table('v_interprestasi')
	->where('kode_prodi','=',$prodi)
	->where('gangep','=',$gangep)
	->where('tahun_ajaran','=',$tahun)
	->get();		
	$rekap2 = DB::table('v_Persentase_JmlMhs_PerProdi')
	->where('kode_prodi','=',$prodi)
	->where('gangep','=',$gangep)
	->where('tahun_ajaran','=',$tahun)
	->get();	
	$rekap3 = DB::table('v_persentase_terevaluasi_takterevaluasi')
	->where('kode_prodi','=',$prodi)
	->where('gangep','=',$gangep)
	->where('tahun_ajaran','=',$tahun)
	->get();			
	$rekap4 = DB::table('v_jadwal')
	->where('kode_prodi','=',$prodi)
	->where('gangep','=',$gangep)
	->where('tahun_ajaran','=',$tahun)
	->get();				
	$datarekap = [
	'cetak1' => $rekap1,
	'cetak2' => $rekap2,
	'cetak3' => $rekap3,
	'cetak4' => $rekap4,	
	];						
	if(($rekap1)==null || ($rekap2)==null || ($rekap3)==null || ($rekap4)==null){
		echo "Tidak ada data.";
		exit;
	}else{
		return View::make('rekapitulasi.cetakLap',$datarekap);	
	}
}

public function Petunjuk(){
	return View::make('petunjuk.index');
}



public function filterData(){
	$in = Input::get('kode_prodi');
	$a = Input::get('semester');
	if (empty($in)) {    		
		return Redirect::to('administrator/rekapitulasi/cetakLaporan')
		->with('msge', 'Maaf.....<br>Inputan tidak beleh kosong!');
	} else {
		$rekap = Rekap::where('kode_prodi','=',$in)
		->orWhere('semester','=',$a)
		->get();			
		dd($rekap);
		if(($rekap) == null){
			Session::flash('msge','Data kosong!');
			return Redirect::to('administrator/rekapitulasi');
		}else{
			return View::make('rekapitulasi.index', $rekap);
		}
	}
}	

}

