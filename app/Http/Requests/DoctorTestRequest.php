<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorTestRequest extends FormRequest
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
            'donation_id' => ['exists:donations,id', Rule::requiredIf(function () {return !$this->request->has('order_id') && !$this->request->has('polycythemias_id') ;})],
            'order_id' => ['exists:orders,id', Rule::requiredIf(function () {return !$this->request->has('donation_id') && !$this->request->has('polycythemias_id') ;})],
            'polycythemias_id'=>['exists:polycythemias,id',Rule::requiredIf(function () {return !$this->request->has('donation_id') && !$this->request->has('order_id') ;})],
            'weight' => ['required', 'numeric', 'max:200'],
            'others' => ['nullable', 'array'],
            'notes' => ['nullable', 'string']
        ];
    }
}
