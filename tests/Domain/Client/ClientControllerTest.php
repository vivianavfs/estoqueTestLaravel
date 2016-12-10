<?php

namespace Domain\Client;

use Domain\User\User;

class ClientControllerTest extends \TestCase
{
	public function testCreate()
	{
		//Sets
		$headers = $this->getHeaders();
		//dd($headers);
		
		$name = 'Viviana Santos';
		$data = [
			'name' => $name,
		];
		
		$this->post('client',$data,$headers);
		
		//Asserts
		$this->seeStatusCode(200);
		$this->seeJson([
			'name' => $name,
		]);
		$this->seeInDatabase('clients',[
			'name' => $name,
		]);
	}
	
	public function testCreateWithCpf()
	{
		//Sets
		$headers = $this->getHeaders();
		//dd($headers);
		
		$name = 'Viviana Santos';
		$cpf = '92830389247';
		$data = [
			'name' => $name,
			'cpf' => $cpf,
		];
		
		$this->post('client',$data,$headers);
		//dd($this->response->getContent());
		//Asserts
		$this->seeStatusCode(200);
		$this->seeJson([
			'name' => $name,
			'cpf' => $cpf,
		]);
		$this->seeInDatabase('clients',[
			'name' => $name,
			'cpf' => $cpf,
		]);
	}
	
	public function testCreateWithCpfAndBirthdate()
	{
		//Sets
		$headers = $this->getHeaders();
		//dd($headers);
		
		$name = 'Viviana Santos';
		$cpf = '92830389247';
		$birthdate = '1988-05-21';
		$data = [
			'name' => $name,
			'cpf' => $cpf,
			'birthdate' => $birthdate,
		];
		
		$this->post('client',$data,$headers);
		//dd($this->response->getContent());
		//Asserts
		$this->seeStatusCode(200);
		$this->seeJson([
			'name' => $name,
			'cpf' => $cpf,
			'birthdate' => $birthdate,
		]);
		$this->seeInDatabase('clients',[
			'name' => $name,
			'cpf' => $cpf,
			'birthdate' => $birthdate,
		]);
	}
}