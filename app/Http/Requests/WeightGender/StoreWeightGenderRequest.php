<?php

namespace App\Http\Requests\WeightGender;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeightGenderRequest extends FormRequest
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
            'weight_id'=> 'required',
            'gender_id'=> 'required',
            'range_from'=> 'required|max:100',
            'range_to'=> 'required|max:100',
        ];
    }
}