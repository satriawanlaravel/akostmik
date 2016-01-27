<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Prodi;
use View;
use Redirect;
use Session;
use Input;
use Validator;

class ProdiController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() { 
    	$prodi = Prodi::all();
    	$jml = Prodi::all()->count();
    	$dataprodi = [
    	'prodi' => $prodi,
    	'jml' => $jml
    	];

    	return View::make('prodi.index', $dataprodi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    /*public function create() {
    	return View::make('prodi.create');
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
    	$rules = array(
           'kode_prodi' => 'required',
           'jenjang' => 'required',
           'jurusan' => 'required',
           'nama_prodi' => 'required',
           );

    	$validation = Validator::make(Input::all(), $rules);

        # using function for validation data prodi

    	if ($validation->fails()) {    		
    		return Redirect::to('administrator/prodi')->withErrors($validation)
            ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
        } else {
            # if the data is valid
            $in = Input::all();
            $prodi = new prodi();

            $cekdata = Prodi::find($prodi->kode_prodi = $in['kode_prodi']);
            if ($cekdata) {            
             return Redirect::to('administrator/prodi')
             ->with('msge', 'Maaf, Kode prodi sudah ada!');
         } else {
             $prodi->kode_prodi = $in['kode_prodi'];
             $prodi->jenjang = $in['jenjang'];
             $prodi->jurusan = $in['jurusan'];
             $prodi->nama_prodi = $in['nama_prodi'];
             $prodi->save();             
             return Redirect::to('administrator/prodi')
             ->with('msgs', 'Prodi berhasil disimpan!');
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
    	$in = Input::get('search');
    	if (empty($in)) {    		
    		return Redirect::to('administrator/prodi')
            ->with('msge', 'Masukkan kata kunci yang dicari !');
        } else {
            $prodi = Prodi::where('kode_prodi', 'LIKE', '%' . $in . '%')
            ->orWhere('jurusan', 'LIKE', '%' . $in . '%')
            ->get();
            $data = array(
              'prodi' => $prodi,
              );
            return View::make('prodi.search', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($kode_prodi) {
    	$prodi = Prodi::find($kode_prodi);
    	$dataprodi = array(
           'prodi' => $prodi,
           );
    	return View::make('prodi.edit', $dataprodi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($kode_prodi) {
    	$rules = array(
           'nama_prodi' => 'required',
           'jenjang' => 'required',
           'jurusan' => 'required',
           'nama_prodi' => 'required',
           );
    	$validator = Validator::make(Input::all(), $rules);
        #if is not valid
    	if ($validator->fails()) {
    		return Redirect::to('administrator/prodi/edit' . $kode_prodi)->withErrors($validator)
            ->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
        } else {
            #id data valid save to database            
            $prodi = Prodi::find($kode_prodi);
            $prodi->nama_prodi = Input::get('nama_prodi');
            $prodi->jenjang = Input::get('jenjang');
            $prodi->jurusan = Input::get('jurusan');
            $prodi->nama_prodi = Input::get('nama_prodi');
            $prodi->save();
            #if success
            return Redirect::to('administrator/prodi')
            ->with('msgs', 'Prodi berhasil diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($kode_prodi) {
    	$prodi = Prodi::find($kode_prodi);
    	$prodi->delete();    	
    	return Redirect::to('administrator/prodi')->with('msgs', 'Prodi berhasil dihapus!');
    }

}
