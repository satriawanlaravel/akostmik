<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Ruangan extends Eloquent {

	protected $fillable = ['kode_ruangan','nama_ruangan'];
	protected $table ='ruangan';
	protected $primaryKey = 'kode_ruangan';
	public $timestamps = false;

	public function Jadwal(){
		return $this->hasMany('App\Models\Jadwal','kode_ruangan');
	}

}
