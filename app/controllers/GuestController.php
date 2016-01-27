<?php namespace App\Controllers;

use App\Controllers\BaseController; 
use App\Models\User;
use App\Models\Mahasiswa;
use Sentry;
use Cartalyst;
use View;
use Redirect;
use Validator;
use Input;
use Auth;
use DB;
use Mail;

class GuestController extends BaseController{

	public function registermhs(){
		$rules = array(
			'nim' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:5'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('/')->with('msge','Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
		}else{
			# validasi nim yang tidak terdaftar
			$in = Input::all();
			$maha = new Mahasiswa();
			$ceknim = Mahasiswa::find($maha->nim = $in['nim']);

			# validasi nim yang sudah digunakan
			$input = Input::get('nim');
			$user = DB::table('users')->where('nim','=',$input)->count();
			if(!$ceknim){
				return Redirect::to('/')->with('msge', 'NIM anda tidak terdaftar didatabase.');
			}elseif($user >= 1){
				return Redirect::to('/')->with('msge', 'NIM anda sudah digunakan untuk daftarkan akun');
			}else{
				try{
				    #mencari group mahasiswa
					$mahasiswaGroup = Sentry::findGroupByName('mahasiswa');

					$mahasiswa = Sentry::register(array(
						'nim' => Input::get('nim'),
						'first_name' => Input::get('first_name'),
						'last_name' => Input::get('last_name'),
						'email' => Input::get('email'),
						'password' => Input::get('password')
						),false);
					
				    #memasukkan data dalam group	
					$mahasiswa->addGroup($mahasiswaGroup);

					$emailVariables = [
					'first_name' => $mahasiswa->first_name,
					'email' => $mahasiswa->email,
					'code' => $mahasiswa->getActivationCode()
					];

				}catch(Cartalyst\Sentry\Users\UserExistsException $e){
					return Redirect::to('/')
					->with('msge','Email anda sudah pernah digunakan, silahkan coba email yang lain.');
				}

				Mail::send('mailTemplate.activation', $emailVariables, function($pesan) use($mahasiswa) {
					$pesan->to($mahasiswa->email, $mahasiswa->first_name.' '.$mahasiswa->last_name)->subject('Aktifasi akun AKOSTMIK anda :)');
				});

				return Redirect::to('/')
				->with('msgs', 'Selamat, anda berhasil mendaftar. Agar bisa login silahkan buka link aktivasi yang kami kirim ke email '.$mahasiswa->email);
			}
		}
	}

	public function activateMe(){
		$email = Input::get('email');
		$code = Input::get('activationCode');

		try {
			$mahasiswa = Sentry::findUserByLogin($email);
			$mahasiswa->attemptActivation($code);
		} catch (UserAlreadyActivatedException $e) {
			return Redirect::to('/')->with('msge', $e->getMessage());
		} catch (UserNotFoundException $e) {
			return Redirect::to('/')->with('msge', $e->getMessage());
		}

		return Redirect::to('/')->with('msgs', 'Selamat, akun anda sudah diaktifkan, silahkan login dengan akun yang sudah anda daftarkan :)');
	}

	public function cekLoginmhs(){
		$rules = array(
			'email' => 'required|email',
			'password' => 'required',
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('/')
			->with('msge','Terjadi kesalahan.');
		}else{
			try{
				$credentials =array(
					'email' => Input::get('email'),
					'password' => Input::get('password')
					);

				#digunakan untuk login
				$mahasiswa = Sentry::authenticate($credentials, false);
				return Redirect::intended('/mahasiswa')->with('msgs','Selamat Datang Diaplikasi Kuesioner PBM STMIK Bumigora Mataram.');

			}catch(Cartalyst\Sentry\Users\WrongPasswordException $e){
				return Redirect::to('/')
				->with('msge','cek ulang password yang anda masukkan!');
			}catch(Cartalyst\Sentry\Users\UserNotFoundException $e){
				return Redirect::to('/')
				->with('msge','cek ulang email yang anda masukkan!');
			}
		}
	}

	public function profile(){
		$user = Sentry::getUser();
		return View::make('dashboardmahasiswa.profile')
		->with('user', $user);
	}

	public function resetPasswordmhs(){
		return View::make('layouts.guest.resetPasswordmhs')
		->with('title','Reset Password Mahasiswa');
	}

	public function prosesResetmhs(){
		$validator = Validator::make(Input::all(), ['email' => 'required|email']);

		if($validator->fails())
			return Redirect::back()->withErrors($validator)->withInput();

		try {
			$mahasiswa = Sentry::findUserByLogin(Input::get('email'));

			$mailVars = [
			'email' => $mahasiswa->email,
			'code' => $mahasiswa->getResetPasswordCode()
			];

			Mail::send('mailTemplate.mailReset', $mailVars, function($pesan) use($mahasiswa) {
				$pesan->to($mahasiswa->email, $mahasiswa->first_name.' '.$mahasiswa->last_name)->subject('Reset Password Validasi');
			});

		} catch (UserNotFoundException $e) {
			return Redirect::back()->with('msge', $e->getMessage());
		}

		return Redirect::to('/')->with('msgs', 'Email validasi sudah kami kirim, silahkan dibuka pada email '.Input::get('email'));
	}

	public function makeNewPassword(){
		$email = Input::get('email');
		$code = Input::get('resetCode');

		try {
			$mahasiswa = Sentry::findUserByLogin($email);
			if($mahasiswa->checkResetPasswordCode($code)){
				return View::make('layouts.guest.newPasswordmhs')
				->with('title', 'Ganti Password');
			}else{
				return Redirect::to('/')->with('msge', 'Cracker detected!');
			}

		} catch (UserNotFoundException $e) {
			return Redirect::to('/')->with('msge', $e->getMessage());
		}
	}

	public function storePassword(){
		$email = Input::get('email');
		$code = Input::get('resetCode');

		try {
			$mahasiswa = Sentry::findUserByLogin($email);
			if($mahasiswa->checkResetPasswordCode($code)){
				$validator = Validator::make(Input::all(), ['password' => 'confirmed|required|min:5']);

				if($validator->fails())
					return Redirect::back()->withInput()->withErrors($validator);

				$mahasiswa->attemptResetPassword($code, Input::get('password'));

				return Redirect::to('/')->with('msgs', 'Selamat anda sudah berhasil mereset password anda, silahkan login dengan password baru anda :)');

			}else{
				return Redirect::to('/')->with('msge', 'Cracker detected!');
			}

		} catch (UserNotFoundException $e) {
			return Redirect::to('/')->with('msge', $e->getMessage());
		}
	}

	public function ubahPassword(){
		$user = Sentry::getUser();
		return View::make('dashboardmahasiswa.ubahPassword')->with('user', $user);
	}

	public function logoutmhs(){
		Sentry::logout();
		return Redirect::to('/')
		->with('msgs','Terimah kasih telah mengunjungi Aplikasi kami.');
	}

}