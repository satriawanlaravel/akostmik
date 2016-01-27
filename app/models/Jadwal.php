<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Jadwal extends Eloquent {

  protected $fillable = ['idjadwal','idkelas','id_krs','tahun_ajaran','kode_ruangan','nik','gangep'];
  protected $table = 'jadwal';
  protected $primaryKey = 'idjadwal';
  public $timestamps = false;

  

  public function Krs() {
    return $this->belongsTo('App\Models\Krs', 'id_krs');
  }

  public function Dosen(){
   return $this->belongsTo('App\Models\Dosen','nik');
 }

 public function Ruangan(){
   return $this->belongsTo('App\Models\Ruangan','kode_ruangan');
 }

 public function Kelas(){
   return $this->belongsTo('App\Models\Kelas','idkelas');
 }

 public function Jawaban(){
  return $this->hasMany('App\Models\Jawaban','idjadwal');
}

}