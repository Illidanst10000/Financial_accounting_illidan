<?php

namespace App\Http\Requests\API\Earnings;

use Illuminate\Foundation\Http\FormRequest;

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
            'amount' => 'required|integer',
            'date' => 'nullable|string',
            'source_id' => 'nullable|string|exists:sources,title',
            'type_id' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [

            'amount.integer' => 'xyi',
            'amount.required' => 'xyi1',
            'amount' => 'xyi2',
        ];
    }
}
