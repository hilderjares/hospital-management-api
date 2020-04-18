<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'city' => 'required',
            'address' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'city.required' => 'City is required',
            'name.required' => 'Name is required',
            'address.required' => 'Address is required'
        ];
    }
}
