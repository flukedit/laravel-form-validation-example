<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExampleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'userId' => ['required', 'integer', 'digits:6'],
            'description' => ['required', 'string', 'max:20'],
        ];
    }
}
