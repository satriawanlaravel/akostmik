<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Matakuliah extends Eloquent {

	protected $fillable = ['kode_matakuliah','nama_matakuliah','kode_prodi','sks_teori','sks_praktek','sks_praktikum'];
	protected $table = 'matakuliah';    
	protected $primaryKey = 'kode_matakuliah';
	public $timestamps = false;

	public function prodi() {
		return $this->belongsTo('App\Models\Prodi', 'kode_prodi');
	}

}
