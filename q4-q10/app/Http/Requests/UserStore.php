<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:150',
            'username' => 'nullable|string|max:250',
            'email' => 'required|string|email|max:100|unique:users',
            'phone' => 'nullable|string',
            'address' => 'nullable|array',
            'address.number' => 'nullable|integer|min:1',
            'address.street' => 'nullable|string|max:250',
            'address.complement' => 'nullable|string|max:100',
            'address.district' => 'nullable|string|max:100',
            'address.city' => 'nullable|string|max:100',
            'address.state' => 'nullable|string|max:2',
            'address.zipCode' => 'nullable|string|max:20'
        ];
    }
}
