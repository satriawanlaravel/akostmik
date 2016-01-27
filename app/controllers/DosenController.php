<?php namespace App\Controllers;

use App\Models\Dosen;
use View;
use Input;
use Redirect;
use Validator;
use Session;
use Maatwebsite\Excel\Excel;

class DosenController extends Excel {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$dosen = Dosen::all();    	
    	$datadosen = array(
        'dosen' => $dosen       
        );

    	return View::make('dosen.index', $datadosen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function importDosen() {
    	$fileExcel = Input::file('excel');
    	if (empty($fileExcel)) {    		
    		return Redirect::to('administrator/dosen')
        ->with('msge', 'Input tidak boleh kosong!');
      } else {
        $excels = Excel::selectSheetsByIndex(0)->load($fileExcel, function($reader) {

        })->get();

          #validation data
        $rules = array(
          'nik' => 'required',
          'nama_dosen' => 'required',
          'field_studi' => 'required',
          'alumni' => 'required',
          'status_dosen' => 'required',
          'alamat_email' => 'required'
          );

        $counter = 0;

        foreach ($excels as $key => $excel) {
         $validator = Validator::make($excel->toArray(), $rules);
         $cekada = Dosen::find($excel->nik);

         if ($cekada) {
          continue;
        }

        if ($validator->fails()) {
          continue;
        }
        $dosens = array(
          'nik' => $excel->nik,
          'nama_dosen' => $excel->nama_dosen,
          'field_studi' => $excel->field_studi,
          'alumni' => $excel->alumni,
          'status_dosen' => $excel->status_dosen,
          'alamat_email' => $excel->alamat_email
          );

        $tambah = Dosen::create($dosens);

        if ($tambah) {
          $counter++;
        }
      }

      if ($counter > 0) {         
        return Redirect::to('administrator/dosen')
        ->with('msgs', ' <b>' . $counter . '</b> Data dosen berhasil di import!');
      } else {       
        return Redirect::to('administrator/dosen')
        ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku!');
      }
    }
  }


  public function edit($nik) {
   $dosen = Dosen::find($nik);
   $datadosen = array(
     'dosen' => $dosen,
     );
   return View::make('dosen.edit', $datadosen);
 }

 public function update($nik){
  $rules = array(
   'nik' => 'required',
   'nama_dosen' => 'required',
   'field_studi' => ' required',
   'alumni' => ' required',
   'status_dosen' => 'required',
   'alamat_email' => ' required'
   );

  $validator = Validator::make(Input::all(), $rules);
  if($validator->fails()){      
    return Redirect::to('administrator/dosen/edit'.$nik)->withErrors($validator)
    ->with('msge','Maaf, terjadi kesalahan');
  }else{
    $dosen = Dosen::find($nik);
    $dosen->nama_dosen = Input::get('nik');
    $dosen->nama_dosen = Input::get('nama_dosen');
    $dosen->field_studi = Input::get('field_studi');
    $dosen->alumni = Input::get('alumni');
    $dosen->status_dosen = Input::get('status_dosen');
    $dosen->alamat_email = Input::get('alamat_email');
    $dosen->update();      
    return Redirect::to('administrator/dosen')
    ->with('msgs','Dosen berhasil diupdate !');
  }

}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function search() {
    	$in = Input::get('search');
    	if (empty($in)) {    		
    		return Redirect::to('administrator/dosen')
        ->with('msge', 'Masukkan kata kunci yang dicari !');
      } else {
        $dosen = Dosen::where('nama_dosen', 'LIKE', '%' . $in . '%')
        ->get();
        $data = array(
         'dosen' => $dosen,
         );
        return View::make('dosen.search', $data);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($nik) {
    	$dosen = Dosen::find($nik);
    	$dosen->delete();    	
    	return Redirect::to('administrator/dosen')
      ->with('msgs', 'Dosen berhasil dihapus!');
    }

    public function detail($nik) {
    	$dosen = Dosen::find($nik);
    	return View::make('dosen.detail')->with('dosen', $dosen);
    }

  }
