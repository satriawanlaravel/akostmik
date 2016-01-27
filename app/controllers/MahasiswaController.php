<?php namespace App\Controllers;

use App\Models\Mahasiswa;
use View;
use Redirect;
use Session;
use Validator;
use Input;
use Maatwebsite\Excel\Excel;

class MahasiswaController extends Excel {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $mahasiswa = Mahasiswa::orderBy('nim','DESC')->get();        
        return View::make('mahasiswa.index')
        ->with('mahasiswa',$mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function importMahasiswa() {
        $fileExcel = Input::file('excel');
        if (empty($fileExcel)) {            
            return Redirect::to('administrator/mahasiswa')
            ->with('msge','Input tidak boleh kosong.');
        } else {
            $excels = Excel::selectSheetsByIndex(0)->load($fileExcel, function ($reader) {

            })->get();

            #validation data
            $rules = array(
                'nim' => 'required',
                'nama_mahasiswa' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'angkatan' => 'required',                
                'kode_prodi' => ' required'
                );
            $counter = 0;

            foreach ($excels as $key => $excel) {
                $validation = Validator::make($excel->toArray(), $rules);
                $cekada = Mahasiswa::find($excel->nim);

                if ($cekada) {
                    continue;
                }
                if ($validation->fails()) {
                    continue;
                }
                $mahasiswa = array(
                    'nim' => $excel->nim,
                    'nama_mahasiswa' => $excel->nama_mahasiswa,
                    'tempat_lahir' => $excel->tempat_lahir,
                    'tanggal_lahir' => $excel->tanggal_lahir,
                    'alamat' => $excel->alamat,
                    'telepon' => $excel->telepon,
                    'jenis_kelamin' => $excel->jenis_kelamin,
                    'agama' => $excel->agama,
                    'angkatan' => $excel->angkatan,                
                    'kode_prodi' => $excel->kode_prodi
                    );

                $tambah = Mahasiswa::create($mahasiswa);
                if ($tambah) {
                    $counter++;
                }
            }
            if ($counter > 0) {                
                return Redirect::to('administrator/mahasiswa')
                ->with('msgs', '<b>' . $counter . '</b> Data mahasiswa berhasil diimport.');
            } else {

                return Redirect::to('administrator/mahasiswa')
                ->with('msge', 'Tidak ada data yang di import.');
            }
        }
    }

    public function edit($nim){
        $mahasiswa = Mahasiswa::find($nim);
        $datamahasiswa = array(
            'mahasiswa' => $mahasiswa,
            );

        return View::make('mahasiswa.edit', $datamahasiswa);
    }

    public function update($nim){
        $rules = array(
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'angkatan' => 'required',        
            'kode_prodi' => ' required'
            );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){            
            return Redirect::to('administrator/mahasiswa')
            ->withErrors($validator)
            ->with('msge','Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
        }else{
            $mahasiswa = Mahasiswa::find($nim);
            $mahasiswa->nim = Input::get('nim');
            $mahasiswa->nama_mahasiswa = Input::get('nama_mahasiswa');
            $mahasiswa->tempat_lahir = Input::get('tempat_lahir');
            $mahasiswa->tanggal_lahir = Input::get('tanggal_lahir');
            $mahasiswa->alamat = Input::get('alamat');
            $mahasiswa->telepon = Input::get('telepon');
            $mahasiswa->jenis_kelamin = Input::get('jenis_kelamin');
            $mahasiswa->agama = Input::get('agama');
            $mahasiswa->angkatan = Input::get('angkatan');            
            $mahasiswa->kode_prodi = Input::get('kode_prodi');
            $mahasiswa->update();
            
            return Redirect::to('administrator/mahasiswa')
            ->with('msgs','Mahasiswa berhasil diupdate ! ');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function search() {
        $in = Input::get('search');
        if (empty($in)) {            
            return Redirect::to('administrator/mahasiswa')
            ->with('msge', 'Masukkan kata kunci yang dicari !');
        } else {
            $mahasiswa = Mahasiswa::where('nim', 'LIKE', '%' . $in . '%')
            ->orWhere('nama_mahasiswa', 'LIKE', '%' . $in . '%')
            ->get();
            $datamahasiswa = array(
                'mahasiswa' => $mahasiswa,
                );
            return View::make('mahasiswa.search', $datamahasiswa);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($nim) {
        $mahasiswa = Mahasiswa::find($nim);
        $mahasiswa->delete();        
        return Redirect::to('administrator/mahasiswa')
        ->with('msgs', 'Mahasiswa berhasil dihapus!');
    }

    public function detail($nim) {
        $mahasiswa = Mahasiswa::find($nim);
        return View::make('mahasiswa.detail')
        ->with('mahasiswa', $mahasiswa);
    }

}
