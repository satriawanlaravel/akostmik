<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Dosen extends Eloquent {

	protected $fillable = ['nik','nama_dosen','field_studi','alumni','status_dosen','alamat_email'];
	protected $table = 'dosen';
	protected $primaryKey = 'nik';
	public $timestamps = false;

	public function Jadwal(){
		return $this->hasMany('App\Models\Jadwal','nik');
	}
}
