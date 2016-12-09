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
	
}