<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User; 
use App\Models\Dosen;
use Sentry;
use Cartalyst;
use View;
use Redirect;
use Validator;
use Input;
use Mail;
use DB;


class RegulerController extends BaseController{
	
	public function registerdsn(){
		$rules = array(
			'nik' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:5'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('/register')->with('msge','Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
		}else{
			#cek nik apakah terdaftar or tidak
			$input = Input::all();			
			$dos = new Dosen();
			$cekdos = Dosen::find($dos->nik = $input['nik']);									

			#mengecek nik apakah sudah digunakan atau belum
			$in = Input::get('nik');
			$user = DB::table('users')->where('nik','=',$in)->count();
			if(!$cekdos){				
				return Redirect::to('/register')->with('msge', 'NIK anda tidak terdaftar!');							
			}elseif($user >= 1){
				return Redirect::to('/register')->with('msge', 'NIK anda sudah digunakan untuk daftarkan akun');
			}else{
				try{
					#mencari group mahasiswa
					$dosenGroup = Sentry::findGroupByName('dosen');

					$dosen = Sentry::register(array(
						'nik' => Input::get('nik'),
						'first_name' => Input::get('first_name'),
						'last_name' => Input::get('last_name'),
						'email' => Input::get('email'),
						'password' => Input::get('password')
						),false);

					#$activationCode = $dosen->getActivationCode();
					#memasukkan data dalam group	
					$dosen->addGroup($dosenGroup);
					$emailVariables = [
					'first_name' => $dosen->first_name,
					'email' => $dosen->email,
					'code' => $dosen->getActivationCode()
					];
				}catch(Cartalyst\Sentry\Users\UserExistsException $e){
					return Redirect::to('/register')
					->with('msge','Email anda sudah pernah digunakan, silahkan coba email yang lain.');
				}

				Mail::send('mailTemplate.activationdsn', $emailVariables, function($pesan) use($dosen) {
					$pesan->to($dosen->email, $dosen->first_name.' '.$dosen->last_name)->subject('Aktifasi akun AKOSTMIK anda :)');
				});
				return Redirect::to('/logindosen')
				->with('msgs', 'Selamat, anda berhasil mendaftar. Agar bisa login silahkan buka link aktivasi yang kami kirim ke email '.$dosen->email);
			}
		}
	}

	public function activateMedsn(){
		$email = Input::get('email');
		$code = Input::get('activationCode');

		try {
			$dosen = Sentry::findUserByLogin($email);
			$dosen->attemptActivation($code);
		} catch (UserAlreadyActivatedException $e) {
			return Redirect::to('/')->with('msge', $e->getMessage());
		} catch (UserNotFoundException $e) {
			return Redirect::to('/')->with('msge', $e->getMessage());
		}

		return Redirect::to('/logindosen')->with('msgs', 'Selamat, akun anda sudah diaktifkan, silahkan login dengan akun yang sudah anda daftarkan :)');
	}

	public function cekLogindsn(){
		$rules = array(
			'email' => 'required|email',
			'password' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('/logindosen')
			->with('msge','Maaf,<br> Terjadi kesalahan.');
		}else{
			try{
				$credentials = array(
					'email' => Input::get('email'),
					'password' => Input::get('password')
					);
				$dosen = Sentry::authenticate($credentials, false);
				return Redirect::intended('/dosen')->with('msgs','Selamat Datang Diaplikasi Kuesioner PBM STMIK Bumigora Mataram.');		

			}catch(Cartalyst\Sentry\Users\WrongPasswordException $e){
				return Redirect::to('/logindosen')
				->with('msge','cek ulang password yang anda masukkan!');
			}catch(Cartalyst\Sentry\Users\UserNotFoundException $e){
				return Redirect::to('/logindosen')
				->with('msge','cek ulang email yang anda masukkan!');
			}
		}
	}

	public function profile(){
		$user = Sentry::getUser();
		return View::make('dashboarddosen.profile')
		->with('user', $user);
	}

	public function resetPassworddsn(){
		return View::make('layouts.guest.resetPassworddsn')
		->with('title','Reset Password Dosen');
	}

	public function prosesResetdsn(){
		$validator = Validator::make(Input::all(), ['email' => 'required|email']);

		if($validator->fails())
			return Redirect::back()->withErrors($validator)->withInput();

		try {
			$mahasiswa = Sentry::findUserByLogin(Input::get('email'));

			$mailVars = [
			'email' => $mahasiswa->email,
			'code' => $mahasiswa->getResetPasswordCode()
			];

			Mail::send('mailTemplate.mailResetdsn', $mailVars, function($pesan) use($mahasiswa) {
				$pesan->to($mahasiswa->email, $mahasiswa->first_name.' '.$mahasiswa->last_name)->subject('Reset Password Validasi');
			});

		} catch (UserNotFoundException $e) {
			return Redirect::back()->with('msge', $e->getMessage());
		}

		return Redirect::to('/logindosen')->with('msgs', 'Email validasi sudah kami kirim, silahkan dibuka pada email '.Input::get('email'));
	}

	public function makeNewPassworddsn(){
		$email = Input::get('email');
		$code = Input::get('resetCode');

		try {
			$mahasiswa = Sentry::findUserByLogin($email);
			if($mahasiswa->checkResetPasswordCode($code)){
				return View::make('layouts.guest.newPassworddsn')
				->with('title', 'Ganti Password');
			}else{
				return Redirect::to('/logindosen')->with('msge', 'Cracker detected!');
			}

		} catch (UserNotFoundException $e) {
			return Redirect::to('/logindosen')->with('msge', $e->getMessage());
		}
	}

	public function storePassworddsn(){
		$email = Input::get('email');
		$code = Input::get('resetCode');

		try {
			$mahasiswa = Sentry::findUserByLogin($email);
			if($mahasiswa->checkResetPasswordCode($code)){
				$validator = Validator::make(Input::all(), ['password' => 'confirmed|required|min:5']);

				if($validator->fails())
					return Redirect::back()->withInput()->withErrors($validator);

				$mahasiswa->attemptResetPassword($code, Input::get('password'));

				return Redirect::to('/logindosen')->with('msgs', 'Selamat anda sudah berhasil mereset password anda, silahkan login dengan password baru anda :)');

			}else{
				return Redirect::to('/logindosen')->with('msge', 'Cracker detected!');
			}

		} catch (UserNotFoundException $e) {
			return Redirect::to('/logindosen')->with('msge', $e->getMessage());
		}
	}

	public function ubahPassword(){
		$user = Sentry::getUser();
		return View::make('dashboarddosen.ubahPassword')->with('user', $user);
	}

	public function logoutdsn(){
		Sentry::logout();
		return Redirect::to('/logindosen')
		->with('msgs','Terimah kasih telah mengunjungi Aplikasi kami.');
	}
}