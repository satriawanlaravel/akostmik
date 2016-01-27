<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Prodi extends Eloquent {

	protected $fillable =['kode_prodi','jenjang','jurusan','nama_prodi'];
	protected $table = 'prodi';
	protected $primaryKey = 'kode_prodi';
	public $timestamps = false;

	public function Mahasiswa() {
		return $this->hasMany('App\Models\Mahasiswa', 'kode_prodi');
	}

	public function Matakuliah() {
		return $this->hasMany('App\Models\Matakuliah', 'kode_prodi');
	}

}
