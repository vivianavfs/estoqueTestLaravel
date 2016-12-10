<?php

namespace Domain\Client\Requests;

class Store extends \Domain\Core\Http\Request
{
	public function rules()
	{
		return [
			'name' => 'required|max:45',
			'cpf' => 'cpf',
			'birthdate' => 'date|date_format:Y-m-d',
		];
	}
	
	public function messages()
	{
		return [
			'cpf.cpf' => 'CPF Inválido!',
		];
	}
}