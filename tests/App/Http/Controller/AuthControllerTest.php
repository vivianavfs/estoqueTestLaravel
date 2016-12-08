<?php

namespace App\Http\Controller;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthControllerTest extends \TestCase
{
	use DatabaseMigrations;
	
	public function testLogin()
	{
		//Sets
		$data = [
			'username' => 'vivi',
			'password' => 'vivi123',
		];
		
		$user = $data;
		$user['password'] = bcrypt($user['password']);
		
		factory(User::class)->create($user);
		
		$this->post('auth/login',$data);
		
		//Asserts
		$this->seeStatusCode(200);
		$this->seeJson([
			'username' => 'vivi',
		]);
	}
}