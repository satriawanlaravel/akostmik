<?php namespace App\Controllers;

use App\Models\Krs;
use View;
use Redirect;
use Session;
use Validator;
use Input;
use Maatwebsite\Excel\Excel;

class KrsController extends Excel {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$krs = Krs::all();    	
    	$datakrs = array(
       'krs' => $krs       
       );

    	return View::make('krs.index', $datakrs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function importKrs() {
    	$fileExcel = Input::file('excel');
    	if (empty($fileExcel)) {    		
    		return Redirect::to('administrator/krs')
        ->with('msge', 'Inputan tidak boleh kosong.');
      } else {
        $excels = Excel::selectSheetsByIndex(0)->load($fileExcel, function($reader) {

        })->get();

            #validasi data
        $rules = array(
          'nim' => 'required',
          'semester' => 'required',
          'kode_matakuliah' => 'required',
          'status_krs' => 'required'
          );

        $counter = 0;
        foreach ($excels as $key => $excel) {

         $Validator = Validator::make($excel->toArray(), $rules);
         $cekada = Krs::find($excel->id_krs);

         if ($cekada) {
          continue;
        }
        if ($Validator->fails()) {
          continue;
        }
        $krs = array(
          'nim' => $excel->nim,
          'semester' => $excel->semester,
          'kode_matakuliah' => $excel->kode_matakuliah,
          'status_krs' => $excel->status_krs,
          );

        $tambah = Krs::create($krs);
        if ($tambah) {
          $counter++;
        }
      }
      if ($counter > 0) {            
       return Redirect::to('administrator/krs')
       ->with('msgs', 'Berhasil import <b>' . $counter . '</b> data krs');
     } else {         
       return Redirect::to('administrator/krs')
       ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
     }
   }
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id_krs) {
    	$krs = Krs::find($id_krs);
    	$krs->delete();
    	return Redirect::to('administrator/krs')
      ->with('msgs','Krs berhasil dihapus !');
    }

  }
