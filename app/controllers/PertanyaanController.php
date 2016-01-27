<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pertanyaan;
use View;
Use Redirect;
Use Session;
use Input;
use Validator;

class PertanyaanController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$pertanyaan = Pertanyaan::all();
    	$datapertanyaan = [
    	'pertanyaan' => $pertanyaan,
    	];

    	return View::make('pertanyaan.index', $datapertanyaan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
    	return View::make('pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
    	$rules = array(         
         'pertanyaan' => 'required'
         );

    	$validator = Validator::make(Input::all(), $rules);
    	if ($validator->fails()) {    		
    		return Redirect::to('administrator/pertanyaan')->withErrors($validator)
            ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
        } else {
            $in = Input::all();
            $pertanyaan = new Pertanyaan();
            $pertanyaan->pertanyaan = $in['pertanyaan'];
            $pertanyaan->save();           
            return Redirect::to('administrator/pertanyaan')->with('msgs', 'Pertanyaan berhasil disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function search() {
    	$in = Input::get('search');
    	if(empty($in)){    		
    		return Redirect::to('administrator/pertanyaan')
            ->with('msge', 'Masukkan kata kunci yang dicari !');
        }else{
            $pertanyaan = Pertanyaan::where('kode_pertanyaan', 'LIKE', '%' . $in . '%')
            ->get();
            $datapertanyaan = array(
              'pertanyaan' => $pertanyaan,
              );
            return View::make('pertanyaan.search', $datapertanyaan);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $kode_pertanyaan
     * @return Response
     */
    public function edit($kode_pertanyaan) {
    	$pertanyaan = Pertanyaan::find($kode_pertanyaan);
    	$datapertanyaan = array(
         'pertanyaan' => $pertanyaan,
         );
    	return View::make('pertanyaan.edit', $datapertanyaan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $kode_pertanyaan
     * @return Response
     */
    public function update($kode_pertanyaan) {
    	$rules = array(            
         'pertanyaan' => 'required'
         );

    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails()) {    		
    		return Redirect::to('administrator/pertanyaan/edit', $kode_pertanyaan)
            ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
        } else {
            $in = Input::all();
            $pertanyaan = Pertanyaan::find($kode_pertanyaan);            
            $pertanyaan->pertanyaan = $in['pertanyaan'];
            $pertanyaan->update();          
            return Redirect::to('administrator/pertanyaan')
            ->with('msgs', 'Pertanyaan berhasil diupdate !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($kode_pertanyaan) {
    	$pertanyaan = Pertanyaan::find($kode_pertanyaan);
    	$pertanyaan->delete();   	
    	return Redirect::to('administrator/pertanyaan')
      ->with('msgs','Pertanyaan berhasil dihapus !');
  }

}
