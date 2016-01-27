<?php namespace App\Models;

/**
*  proses rekapitulasi
*/
use Illuminate\Database\Eloquent\Model as Eloquent;

class Rekap extends Eloquent{
	protected $table = 'v_interprestasi';
	public $timestamps = false;
	
}