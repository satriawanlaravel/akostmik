<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Pertanyaan extends Eloquent {

	public $fillable = ['kode_pertanyaan','pertanyaan'];
	protected $table = 'pertanyaan';
	protected $primaryKey = 'kode_pertanyaan';    
	public $timestamps = false;

	public function kuesioner() {
		return $this->belongsTo('App\Models\Jawaban', 'kode_jawaban');
	}

}
