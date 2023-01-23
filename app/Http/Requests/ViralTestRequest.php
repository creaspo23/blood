<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ViralTestRequest extends FormRequest
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
        info($this->request->all());
        return [
            'donation_id' => ['exists:donations,id', Rule::requiredIf(function () {
                return !$this->request->has('order_id');
            })],
            'order_id' => ['exists:orders,id', Rule::requiredIf(function () {
                return !$this->request->has('donation_id');
            })],

            'result' => ['nullable', 'array'],
            'notes' => ['nullable', 'string']
        ];
    }
}
