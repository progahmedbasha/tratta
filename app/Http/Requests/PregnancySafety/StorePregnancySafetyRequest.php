<?php

namespace App\Http\Requests\PregnancySafety;

use App\Http\Traits\CodeTrait;
use Illuminate\Foundation\Http\FormRequest;

class StorePregnancySafetyRequest extends FormRequest
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
            'type'=> 'required|max:100',
            'value' => 'required|max:100',
        ];
    }
}