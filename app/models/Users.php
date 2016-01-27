<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Users extends Eloquent{

	public $fillable = ['id','nim','email','password','permissions','activated ','activated_code','activated_at','last_login','persist_code','reset_password_code','first_name','last_name','created_at','updated_at','nik'];
	public $table = 'users';


}
