<?php

namespace App\Http\Requests\API\Users;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */

    // TODO have to add more rules for work without errors (255 symbols, etc)

    public function rules()
    {
        return [
            'email' => 'required|email|',
            'password' => 'required',
        ];
    }
}
