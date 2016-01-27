<?php
class SentrySeeder extends Seeder {
	public function run(){
		try	{
	// Membuat admin baru
			$admin = Sentry::register(array(
// silahkan ganti sesuai keinginan
				
				'email' => 'aplikasikuesioner@gmail.com',
				'password' => '#akostmik',
				'first_name' => 'administrator',
				'last_name' => 'BPM'

 ), true); // langsung diaktivasi

 // Cari grup admin
			$adminGroup = Sentry::findGroupByName('admin');

 // Masukkan user ke grup admin
			$admin->addGroup($adminGroup);
		}catch (Cartalyst\Sentry\Users\LoginRequiredException $e){
			echo 'Login field is required.';
		}catch (Cartalyst\Sentry\Users\PasswordRequiredException $e){
			echo 'Password field is required.';
		}catch (Cartalyst\Sentry\Users\UserExistsException $e){
			echo 'User with this login already exists.';
		}catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e){
			echo 'Group was not found.';
		}
	}
}
