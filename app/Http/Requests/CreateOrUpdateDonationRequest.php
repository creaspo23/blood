<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CreateOrUpdateDonationRequest extends FormRequest
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
            'gender' => ['required', Rule::in(['ذكر', 'انثى'])],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:121'],
            'job_title' => ['required', 'string', 'max:121'],
            'address' => ['nullable', 'string']
        ];
    }
}
