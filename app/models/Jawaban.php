<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
/**
* Model Jawaban
*/
class Jawaban extends Eloquent{
	protected $table = 'jawaban';
	protected $primaryKey = 'kode_jawaban';
	public $timestamps = false;
	protected $fillable = [
	'kode_jawaban',
	'kode_pertanyaan',
	'jawabanganda',
	'tanggal_pengisian',
	'kritiksaran',
	'idjadwal'];

	public function Jawaban(){
		return $this->belongsTo('App\Models\Jadwal','idjadwal');
	}
}