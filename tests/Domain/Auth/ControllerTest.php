<?php

namespace Domain\Auth;

use Domain\User\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ControllerTest extends \TestCase
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
	
	public function testLoginWithEmail()
	{
		//Sets
		$data = [
			'username' => 'vivi@teste.br',
			'password' => 'vivi123',
		];
		
		$user = [
			'username' => 'vivi',
			'password' => bcrypt($data['password']),
			'email' => 'vivi@teste.br',
		];
		
		factory(User::class)->create($user);
		
		$this->post('auth/login',$data);
		
		//dd($this->response->getContent()); //para verificar erros
		
		//Asserts
		$this->seeStatusCode(200);
		$this->seeJson([
			'username' => 'vivi',
		]);
	}
	
	public function testCantLogin()
	{
		$data = [
			'username' => uniqid(),
			'password' => 'test',
		];
		$this->post('auth/login',$data);
		
		//Asserts
		$this->seeStatusCode(401);
	}
}