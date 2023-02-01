<?php

namespace App\Http\Requests\API\Earnings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;

class UpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'amount' => 'nullable|integer',
            'date' => 'nullable|string',
            'source_id' => 'nullable|integer|exists:sources,id',
            'type_id' => 'nullable|integer',
            'description' => 'nullable|string',
        ];
    }

}
