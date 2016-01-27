<?php namespace App\Controllers;

use App\Models\Ruangan;
use App\Controllers\BaseController;
use View;
use Session;
use Validator;
use Input;
use Redirect;

class RuanganController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$ruangan = Ruangan::all();
    	$jml = Ruangan::all()->count();
    	$dataruangan = [
    	'ruangan' => $ruangan,
    	'jml' => $jml,
    	];

    	return View::make('ruangan.index', $dataruangan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
    	return View::make('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
    	$rules = array(
       'kode_ruangan' => 'required',
       'nama_ruangan' => 'required'
       );

    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails()) {    		
    		return Redirect::to('administrator/ruangan/create')->withErrors($validator)
        ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
      } else {
        $in = Input::all();
        $ruangan = new Ruangan();
        $cekdata = Ruangan::find($ruangan->kode_ruangan = $in['kode_ruangan']);
        if ($cekdata) {            
         return Redirect::to('administrator/ruangan/create')
         ->with('msge', 'Maaf, Kode ruangan sudah ada!');
       } else {
         $ruangan->kode_ruangan = $in['kode_ruangan'];
         $ruangan->nama_ruangan = $in['nama_ruangan'];
         $ruangan->save();             
         return Redirect::to('administrator/ruangan')
         ->with('msgs', 'Ruangan berhasil disimpan!');
       }
     }
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function search() {
    	$in = Input::get('cari');
    	if (empty($in)) {    		
    		return Redirect::to('administrator/ruangan')
        ->with('msge', 'Masukkan kata kunci yang dicari !');
      } else {
        $ruangan = Ruangan::where('kode_ruangan', 'LIKE', '%' . $in . '%')
        ->orWhere('nama_ruangan', 'LIKE', '%' . $in . '%')
        ->get();
        $data = array(
          'ruangan' => $ruangan,
          );
        return View::make('ruangan.search', $data);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($kode_ruangan) {
    	$ruangan = Ruangan::find($kode_ruangan);
    	$dataruangan = array(
       'ruangan' => $ruangan,
       );
    	return View::make('ruangan.edit', $dataruangan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($kode_ruangan) {
    	$rules = array(
       'kode_ruangan' => 'required',
       'nama_ruangan' => 'required'
       );
    	$validator = validator::make(Input::all(), $rules);
    	if ($validator->fails()) {    		
    		return Redirect::to('administrator/ruangan/edit', $kode_ruangan)
        ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
      } else {
        $input = Input::all();
        $ruangan = Ruangan::find($kode_ruangan);
        $ruangan->kode_ruangan = $input['kode_ruangan'];
        $ruangan->nama_ruangan = $input['nama_ruangan'];
        $ruangan->update();          
        return Redirect::to('administrator/ruangan')
        ->with('msgs', 'Ruangan berhasil diubah');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($kode_ruangan) {
    	$ruangan = Ruangan::find($kode_ruangan);
    	$ruangan->delete();    	
    	return Redirect::to('administrator/ruangan')
      ->with('msgs', 'Ruangan berhasil dihapus!!');
    }

  }
