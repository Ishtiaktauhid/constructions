<?php

namespace App\Http\Requests\Backend\land;

use Illuminate\Foundation\Http\FormRequest;

class StoreLandRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en'=>'required|max:255',
            'rs_no_en'=>'required|unique:lands',
            'bs_no_en'=>'required|unique:lands',
            'registration_no_en'=>'required|unique:lands'
        ];
    }
}
