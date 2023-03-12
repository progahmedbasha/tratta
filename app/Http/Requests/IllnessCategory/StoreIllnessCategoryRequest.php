<?php

namespace App\Http\Requests\IllnessCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreIllnessCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|min:2|max:100',
        ];
    }
}