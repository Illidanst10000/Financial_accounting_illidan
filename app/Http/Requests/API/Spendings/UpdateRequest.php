<?php

namespace App\Http\Requests\API\Spendings;

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
            'amount' => 'nullable|integer',
            'date' => 'nullable|string',
            'category_id' => 'nullable|string|exists:categories,title',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|string|exists:tags,title',
            'type_id' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }
}
