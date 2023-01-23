<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BloodTestRequest extends FormRequest
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
            'donation_id' => ['exists:donations,id', Rule::requiredIf(function () {return !$this->request->has('order_id') && !$this->request->has('polycythemias_id') && !$this->request->has('kid_id')&&!$this->request->has('mother_id');})],
            'order_id' => ['exists:orders,id', Rule::requiredIf(function () {return !$this->request->has('donation_id') && !$this->request->has('polycythemias_id') && !$this->request->has('kid_id')&&!$this->request->has('mother_id');})],
            'polycythemias_id'=>['exists:polycythemias,id',Rule::requiredIf(function () {return !$this->request->has('donation_id') && !$this->request->has('order_id') && !$this->request->has('kid_id')&&!$this->request->has('mother_id') ;})],
            'kid_id'=>['exists:kid,id',Rule::requiredIf(function () {return !$this->request->has('donation_id') && !$this->request->has('order_id')&& !$this->request->has('polycythemias_id')&&!$this->request->has('mother_id') ;})],
            'mother_id'=>[Rule::requiredIf(function () {return !$this->request->has('donation_id') && !$this->request->has('order_id')&& !$this->request->has('polycythemias_id')&& !$this->request->has('kid_id') ;})],
            'HB' =>['required', 'numeric'],
            'genotype' =>['nullable', Rule::in(['C+', 'E+', 'c+', 'e+', 'Kell+', 'C-', 'E-', 'c-', 'e-', 'Kell-'])],
            'blood_group' =>['nullable', Rule::in(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-'])],
            'notes' =>['nullable', 'string'],
        ];
    }
}
