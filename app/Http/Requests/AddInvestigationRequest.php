<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddInvestigationRequest extends FormRequest
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
            'gender' => ['required', Rule::in(['ذكر', 'انثى'])],
            'unit' => ['required', 'string', 'max:121'],
            'diagnosis' => ['required', 'string', 'max:121'],
            'type' => ['required', Rule::in(['اقتصادي', 'تامين'])],
            'tests' => ['required', 'array']
        ];
    }
}
