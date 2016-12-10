<?php

namespace Domain\Client;

use Domain\Client\Requests\Store;

class Controller extends \Domain\Core\Http\Controller
{
	public function store(Store $request)
	{
		$data = $request->all();
		$client = new Client;
		$client->fill($data);
		$client->save();
		
		return $client;
	}
}