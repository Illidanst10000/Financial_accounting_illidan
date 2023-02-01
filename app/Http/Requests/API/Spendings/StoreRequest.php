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
              'category_id' => 'required|integer|exists:categories,id',
              'tag_ids' => 'required|integer',
              'tag_ids.*' => 'required|integer|exists:tags,id',
              'type_id' => 'required|integer',
              'description' => 'nullable|string',
        ];
    }
}
