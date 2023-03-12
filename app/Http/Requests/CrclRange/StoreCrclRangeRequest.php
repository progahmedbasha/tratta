<?php

namespace App\Http\Requests\CrclRange;

use Illuminate\Foundation\Http\FormRequest;

class StoreCrclRangeRequest extends FormRequest
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
            'illness_category_id' => 'required',
            'range_from'=> 'required|max:50',
            'range_to'=> 'required|max:50',
        ];
    }
}