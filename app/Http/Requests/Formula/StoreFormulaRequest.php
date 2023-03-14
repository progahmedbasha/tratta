<?php

namespace App\Http\Requests\Formula;

use App\Http\Traits\CodeTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreFormulaRequest extends FormRequest
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
            'name'=> 'required|max:100',
            'icon'=> 'max:100',
        ];
    }
}