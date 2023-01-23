<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddKidRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:121'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required'],
            'child_name' => ['required', 'string', 'max:121'],
            'child_birth_date' => ['required', 'date'],
            'child_gender' => ['required', Rule::in(['ذكر', 'انثى'])]
        ];
    }
}
