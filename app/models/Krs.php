<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Krs extends Eloquent {

    protected $fillable = ['nim','semester','kode_matakuliah','status_krs'];
    protected $table = 'krs';
    protected $primaryKey = 'id_krs';
    public $timestamps = false;

    public function kelas(){
        return $this->hasOne('App\Models\Kelas');
    }

    public function matakuliah() {
        return $this->belongsTo('App\Models\Matakuliah', 'kode_matakuliah');
    }

    public function mahasiswa() {
        return $this->belongsTo('App\Models\Mahasiswa', 'nim');
    }

    public function jadwal(){
        return $this->hasMany('App\Models\Jadwal','id_krs');
    }

}
