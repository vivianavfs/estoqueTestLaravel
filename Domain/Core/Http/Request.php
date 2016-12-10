<?php

namespace Domain\Core\Http;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
	
	public function response(array $erros)
	{
		return response()->json($erros, 422);
	}
}
