<?php namespace App\Controllers;

use App\Models\Matakuliah;
use View;
use Validator;
use Input;
use Session;
use Redirect;
use Maatwebsite\Excel\Excel;

class MatakuliahController extends Excel {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
      $matakuliah = Matakuliah::all();
      $datamatakuliah = array(
        'matakuliah' => $matakuliah
        );

      return View::make('matakuliah.index', $datamatakuliah);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function importMatakuliah() {
    	$fileExcel = Input::file('excel');
    	if (empty($fileExcel)) {    		
    		return Redirect::to('administrator/matakuliah')
        ->with('msge', 'Input tidak boleh kosong!');
      } else {
        $excels = Excel::selectSheetsByIndex(0)->load($fileExcel, function($reader) {

        })->get();

        $rules = array(
          'kode_matakuliah' => 'required',
          'kode_prodi' => 'required',
          'nama_matakuliah' => 'required',
          'sks_teori' => 'required',
          'sks_praktek' => 'required',
          'sks_praktikum' => 'required'
          );

        $counter = 0;
        foreach ($excels as $key => $excel) {
         $validator = Validator::make($excel->toArray(), $rules);

         $cekada = Matakuliah::find($excel->kode_matakuliah);
         if ($cekada) {
          continue;
        }
        if ($validator->fails()) {
          continue;
        }
        $matakuliah = array(
          'kode_matakuliah' => $excel->kode_matakuliah,
          'kode_prodi' => $excel->kode_prodi,
          'nama_matakuliah' => $excel->nama_matakuliah,
          'sks_teori' => $excel->sks_teori,
          'sks_praktek' => $excel->sks_praktek,
          'sks_praktikum' => $excel->sks_praktikum
          );
        $tambah = Matakuliah::create($matakuliah);
        if ($tambah) {
          $counter++;
        }
      }
      if ($counter > 0) {        
       return Redirect::to('administrator/matakuliah')
       ->with('msgs', '<b>' . $counter . '</b> Data matakuliah berhasil diimport !');
     } else {    
       return Redirect::to('administrator/matakuliah')
       ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
     }
   }
 }

    /**
     * Detail a newly created resource in storage.
     *
     * @return Response
     */
    public function detail($kode_matakuliah) {
    	$matakuliah = Matakuliah::find($kode_matakuliah);
    	return View::make('matakuliah.detail')->with('matakuliah',$matakuliah);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($kode_matakuliah) {
      $matakuliah = Matakuliah::find($kode_matakuliah);
      $datamatakuliah = array(
        'matakuliah' => $matakuliah,
        );
      return View::make('matakuliah.edit',$datamatakuliah);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($kode_matakuliah) {
      $rules = [
      'kode_matakuliah' => 'required',
      'kode_prodi' => 'required',
      'nama_matakuliah' => 'required',
      'sks_teori' => 'required',
      'sks_praktek' => 'required',
      'sks_praktikum' => 'required'
      ];
      $validator = Validator::make(Input::all(), $rules);

      if($validator->fails()){
        return Redirect::to('administrator/matakuliah/edit' . $kode_matakuliah)->withErrors($validator)
        ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
      }else{
        $matakuliah = Matakuliah::find($kode_matakuliah);
        $matakuliah->kode_matakuliah = Input::get('kode_matakuliah');
        $matakuliah->kode_prodi = Input::get('kode_prodi');
        $matakuliah->nama_matakuliah = Input::get('nama_matakuliah');
        $matakuliah->sks_teori = Input::get('sks_teori');
        $matakuliah->sks_praktek = Input::get('sks_praktek');
        $matakuliah->sks_praktikum = Input::get('sks_praktikum');
        $matakuliah->update();
        return Redirect::to('administrator/matakuliah')->with('msgs', 'Matakuliah berhasil diubah!');
      }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($kode_matakuliah) {
    	$matakuliah = Matakuliah::find($kode_matakuliah);
    	$matakuliah->delete();    	
    	return Redirect::to('administrator/matakuliah')
      ->with('msgs','Matakuliah berhasil dihapus.');
    }

    /**
    * Search 
    *
    */

    public function search(){
    	$in = Input::get('search');
    	if(empty($in)){    		
    		return Redirect::to('administrator/matakuliah')
        ->with('msge','Masukkan kata kunci yang dicari !');
      }else{
        $matakuliah = Matakuliah::where('nama_matakuliah', 'LIKE', '%' . $in . '%')
        ->orWhere('kode_prodi', 'LIKE', '%' . $in . '%')
        ->get();
        $datamatakuliah = array(
          'matkul' => $matakuliah,
          );
        return View::make('matakuliah.search', $datamatakuliah);
      }
    }

  }
