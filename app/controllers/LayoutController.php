<?php namespace App\Controllers;

use App\Models\GroupRekap;
use App\Models\User;
use Sentry;
use Cartalyst;
use View;
use App\Controllers\BaseController;

class LayoutController extends BaseController {

	public function index() {
		return View::make('layouts.guest.index');		
	}

	public function login() {
		return View::make('layouts.guest.login');		
	}

	public function logindosen(){
		return View::make('layouts.guest.dosen');
	}

	public function register(){
		return View::make('layouts.guest.register')
		->with('title','Login Dosen');
	}


	public function administrator() {
		$activated = 0;
		$notActivated = 0;
		$all = 0;		
		$userData = [];


		$users = User::all();
		$mahasiswa = Sentry::findGroupByName('mahasiswa');


		foreach ($users as $key => $userData) {
			$user = Sentry::findUserByID($userData->id);
			if ($user->inGroup($mahasiswa)) {
				if ($user->isActivated()) {
					$activated++;
				} else {
					$notActivated++;
				}

				$all++;
			}
		}

		$userData = [
		'active' => $activated,
		'notActive' => $notActivated,
		'all' => $all,
		];

		return View::make('dashboardadmin.index')->with('userData', $userData);
	}

	public function mahasiswa() {
		return View::make('dashboardmahasiswa.index');		
	}

	public function dosen() {
		return View::make('dashboarddosen.index');		
	}
}

