@extends('layouts.admin.indexm')
@section('content')
<div class="box tools">
    <div class="text-center">
        <h3 class="box-title" style="center-text"><b>KUESIONER PBM STMIK BUMIGORA MATARAM</b></h3>
        <br/>
    </div>
</div>
<div class="box tools">    
    <div class="box-header">            
        <div class="col-md-6">
            <div class="well-sm">
                <table class="table table-condensed">
                    <br/>   
                    <tr>
                        <th>Prodi  </th>
                        <td>:</td>
                        <td>{{ $getprofil->prodi->jurusan }}</td>
                    </tr>
                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td>{{ $getprofil->prodi->jenjang }}</td>
                    </tr>
                    <tr>
                        <th>Dosen  </th>
                        <td>:</td>
                        <td>
                            @foreach ($pilihmatkul as $key => $value)
                            {{ $value->nama_dosen }}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Kelas  </th>
                        <td>:</td>
                        <td>
                            @foreach ($pilihmatkul as $key => $value)
                            {{ $value->kelas }}
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well-sm">
                <table class="table table-condensed">
                    <br/>
                    <tr>
                        <th>Angkatan</th>
                        <td>:</td>
                        <td>
                         @foreach ($pilihmatkul as $key => $value)
                         {{ $value->angkatan }}
                         @endforeach
                     </td>
                 </tr>
                 <tr>
                    <th>Semester</th>
                    <td>:</td>
                    <td> 
                        @foreach ($pilihmatkul as $key => $value)
                        {{ $value->semester }}
                        @endforeach</td>
                    </tr>
                    <tr>
                        <th>Matakuliah</th>
                        <td>:</td>
                        <td>
                           @foreach ($pilihmatkul as $key => $value)
                           {{ $value->nama_matakuliah }}
                           @endforeach
                       </td>
                   </tr>
                   <tr>
                    <th>Tanggal Pengisian  </th>
                    <td>:</td>
                    <td>{{ date('j-F-Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<!-- awal kuesioner-->
{{Form::open(['url'=>'mahasiswa/kuesioner/saveKuis','class'=>'form-horizontal'])}}  
<div class="box tools">
    <div class="box-body"> 
        <div class="test-left">
            <h5>Penilaian sistem perkuliahan oleh Mahasiswa yang ditujukan kepada Dosen, Pastikan semua pernyataan sudah Anda respon dengan klik nilai antara 1 sampai dengan 5. <b style='color:red;'>(
                1 = Sangat Tidak Sesuai; 2 = Tidak Sesuai; 3 = Moderat; 4 = Sesuai; 5 = Sangat Sesuai)</b>.
                <br/>
                <br/>
            </h5>
        </div>           
        <table class="table table-bordered">
            <thead>
                <tr class="active ">
                    <th rowspan="2" class="text-center" style="width: 30px;">No</th>
                    <th rowspan="2" class="text-center">Uraian Bahan Evaluasi Proses Belajar Mengajar</th>
                    <th colspan="5" class="text-center">S K O R</th>
                </tr>
                <tr class="active">
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>
                    <th class="text-center">5</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1;?>
                @foreach($pertanyaan as $key => $value)
                <input type="hidden" name="kode_pertanyaan[]" value="{{ $value->kode_pertanyaan }}">
                <tr>
                    <td class="text-center">{{ $n++ }}</td>
                    <td>{{ $value->pertanyaan }}</td>
                    @foreach(range(0,4) as $a)
                    <td>                        
                        <input type="radio" value="{{ $a+1 }}" name="jawabanganda[<?php echo $key; ?>]">
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        <div class="form-group">
            <div class="col-lg-12">
                <b>Masukan kritik dan saran bagi Dosen yang bersangkutan :</b>
                {{ Form::textarea('kritiksaran', Input::old('kritiksaran'),array('class' => 'form-control','required','rows'=>3)) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                {{ Form::submit('Kirim', array('class' => 'btn btn-primary','style'=>'width: 110px;')) }}
                <a href="{{ URL::to('mahasiswa/kuesioner') }}" class="btn btn-danger" style="width: 110px">Batal</a>
            </div>
        </div>
        <br/><b style='color:red;'>* <u>Perhatian</u></b><br/>
        Jika semua pernyataan sudah Anda respon dengan benar, maka Anda bisa klik tombol "kirim" untuk dimasukkan ke dalam database. Apabila sudah terkirim, maka data tidak dapat diubah.

        <br/>
        <br/>
        <br/>

        Terima Kasih..
    </div>
    <div align="right">
        <input type="text" name="idjadwal"  size="1" value="
        @foreach ($pilihmatkul as $key => $value)
        {{ $value->idjadwal }}
        @endforeach" readonly="false">
    </div>
</div>
{{Form::close()}}
@stop

