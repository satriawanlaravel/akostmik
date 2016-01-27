<?php namespace App\Controllers;

use App\Models\User; 
use View;
use Sentry;
use Cartalyst;
use Validator;
use Redirect;
use Input;
use Mail;
use Crypt;
use Printpre;

class AdminController extends BaseController{

	public function register(){
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:5'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('administrator/tambahAkun')
			->with('msge','Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
		}else{
			try{
			# mencari group admin
				$adminGroup = Sentry::findGroupByName('admin');

				$admin = Sentry::register(array(
					'first_name' => Input::get('first_name'),
					'last_name' => Input::get('last_name'),
					'email' => Input::get('email'),
					'password' => Input::get('password')
					), true);

				$activationCode = $admin->getActivationCode();

				#memasukkan dalam group admin
				$admin->addGroup($adminGroup);			

			}catch(Cartalyst\Sentry\Users\UserExistsException $e){
				return Redirect::to('administrator/tambahAkun')
				->with('msge','User sudah ada.');
			}
			return Redirect::to('administrator/tambahAkun')
			->with('msgs', 'Selamat, akun anda sudah diaktifkan, silahkan login dengan akun yang sudah anda daftarkan :) ');			
		}
	}

	public function cekLogin(){
		$rules = array(
			'email' => 'required|email',
			'password' => 'required'	
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('auth/admin/login')
			->with('msge','Ada kesalahan, silahkan mencoba kembali dan perhatikan ketentuan yang berlaku');
		}else{
			try{
				$credentials =array(
					'email' => Input::get('email'),
					'password' => Input::get('password')
					);

				#digunakan untuk login
				$admin = Sentry::authenticate($credentials, false);				
				return Redirect::intended('/administrator')
				->with('msgs','Selamat Datang Diaplikasi Kuesioner PBM STMIK Bumigora Mataram.');

			}catch(Cartalyst\Sentry\Users\WrongPasswordException $e){
				return Redirect::to('auth/admin/login')
				->with('msge','cek ulang password yang anda masukkan!');
			}catch(Cartalyst\Sentry\Users\UserNotFoundException $e){
				return Redirect::to('auth/admin/login')
				->with('msge','cek ulang email yang anda masukkan!');
			}
		}
	}


	public function resetPasswordadmin(){
		return View::make('layouts.guest.resetPasswordadmin')
		->with('title','Reset Password Administrator');
	}


	public function prosesResetadmin(){
		$validator = Validator::make(Input::all(), ['email' => 'required|email']);

		if($validator->fails())
			return Redirect::back()->withErrors($validator)->withInput();

		try {
			$mahasiswa = Sentry::findUserByLogin(Input::get('email'));

			$mailVars = [
			'email' => $mahasiswa->email,
			'code' => $mahasiswa->getResetPasswordCode()
			];

			Mail::send('mailTemplate.mailResetadmin', $mailVars, function($pesan) use($mahasiswa) {
				$pesan->to($mahasiswa->email, $mahasiswa->first_name.' '.$mahasiswa->last_name)->subject('Reset Password Validasi');
			});

		} catch (UserNotFoundException $e) {
			return Redirect::back()->with('msge', $e->getMessage());
		}

		return Redirect::to('/auth/admin/login')->with('msgs', 'Email validasi sudah kami kirim, silahkan dibuka pada email '.Input::get('email'));
	}

	public function makeNewPasswordadmin(){
		$email = Input::get('email');
		$code = Input::get('resetCode');

		try {
			$mahasiswa = Sentry::findUserByLogin($email);
			if($mahasiswa->checkResetPasswordCode($code)){
				return View::make('layouts.guest.newPasswordadmin')
				->with('title', 'Ganti Password');
			}else{
				return Redirect::to('/auth/admin/login')->with('msge', 'Cracker detected!');
			}

		} catch (UserNotFoundException $e) {
			return Redirect::to('/auth/admin/login')->with('msge', $e->getMessage());
		}
	}

	public function storePasswordadmin(){
		$email = Input::get('email');
		$code = Input::get('resetCode');

		try {
			$mahasiswa = Sentry::findUserByLogin($email);
			if($mahasiswa->checkResetPasswordCode($code)){
				$validator = Validator::make(Input::all(), ['password' => 'confirmed|required|min:5']);

				if($validator->fails())
					return Redirect::back()->withInput()->withErrors($validator);

				$mahasiswa->attemptResetPassword($code, Input::get('password'));

				return Redirect::to('/auth/admin/login')->with('msgs', 'Selamat anda sudah berhasil mereset password anda, silahkan login dengan password baru anda :)');

			}else{
				return Redirect::to('/auth/admin/login')->with('msge', 'Cracker detected!');
			}

		} catch (UserNotFoundException $e) {
			return Redirect::to('/auth/admin/login')->with('msge', $e->getMessage());
		}
	} 
	

	public function profile(){
		$user = Sentry::getUser();
		return View::make('dashboardadmin.profile')
		->with('user', $user);
	}

	public function ubahPassword(){
		$user = Sentry::getUser();
		return View::make('dashboardadmin.ubahPassword')->with('user', $user);
	}

	public function tambahAkun(){
		return View::make('dashboardadmin.tambahAkun');
	}

	public function logout(){
		Sentry::logout();
		return Redirect::to('/auth/admin/login')
		->with('msgs','Terimah kasih telah mengunjungi Aplikasi kami.');
	}


}