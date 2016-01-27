<?php namespace App\Controllers;

use App\Models\Kelas;
use App\Controllers\BaseController;
use View;
use Validator;
use Input;
use Redirect;

class KelasController extends BaseController{

	public function index(){
		$kls = Kelas::all();
		$jml = Kelas::all()->count();
		$datakls = array(
			'datakls' => $kls,
			'jml' => $jml
			);
		return View::make('kelas.index',$datakls);
	}

	public function create(){
		return View::make('kelas.create');
	}

	public function store(){
		$rules = array(
			/*'idkelas' => 'required',*/
			'kelas' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('administrator/kelas')
			->withErrors($validator)
			->with('msge','Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
		}else{
			$in = Input::all();
			$kls = new Kelas();
			$kls->kelas = $in['kelas'];
			$kls->save();
			return Redirect::to('administrator/kelas')
			->with('msgs','Kelas berhasil disimpan.');
		}
	}

	public function edit($idkelas){
		$kelas = Kelas::find($idkelas);
		$datakelas = array(
			'kls' => $kelas,
			);
		return View::make('kelas.edit', $datakelas);
	}

	public function update($idkelas){
		$rules =array(
			'kelas' => 'required',
			);
		$validator = Validator::make(Input::all(),$rules);
		if ($validator->fails()) {
			return Redirect::to('administrator/kelas/edit' . $idkelas)->withErrors($validator)
			->with('msge', 'Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
		} else {
            #id data valid save to database
			$kls = Kelas::find($idkelas);			
			$kls->kelas = Input::get('kelas');
			$kls->update();
            #if success
			return Redirect::to('administrator/kelas')
			->with('msgs', 'Kelas berhasil diubah!');
		}
	}

	public function destroy($idkelas){
		$kls = Kelas::find($idkelas);
		$kls->delete();
		return Redirect::to('administrator/kelas')
		->with('msgs','Kelas berhasil dihapus!');
	}
}