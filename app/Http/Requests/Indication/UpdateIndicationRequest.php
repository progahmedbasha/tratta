<?php

namespace App\Http\Requests\Indication;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIndicationRequest extends FormRequest
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
            'indication_title'=> 'required|unique:indications|max:100',
        ];
    }
}