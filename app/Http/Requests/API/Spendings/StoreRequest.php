<?php

namespace App\Http\Requests\API\Spendings;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
              'date' => 'required|string',
              'category_id' => 'required|string|exists:categories,title',
              'tag_ids' => 'required|string',
              'tag_ids.*' => 'required|string|exists:tags,title',
              'type_id' => 'required|string',
              'description' => 'nullable|string',
        ];
    }
}
