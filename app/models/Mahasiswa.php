<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Mahasiswa extends Eloquent {

	protected $fillable = ['nim','nama_mahasiswa','tempat_lahir','tanggal_lahir','alamat','telepon','jenis_kelamin','agama','angkatan','kode_prodi',];
	protected $table = 'mahasiswa';
	protected $primaryKey = 'nim';
	public $timestamps = false;

	public function prodi() {
		return $this->belongsTo('App\Models\Prodi', 'kode_prodi');
	}


}
