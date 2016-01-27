<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Kelas extends Eloquent{

	protected $fillable = ['idkelas','kelas'];
	protected $table = 'kelas';
	protected $primaryKey = 'idkelas';
	public $timestamps = false;

	public function Jadwal(){
		return $this->hasMany('App\Models\Jadwal','idkelas');
	}

}