<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
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
            'name' => ['string', 'max:121'],
            'birth_date' => ['date'],
            'unit' => ['string', 'max:121'],
            'diagnosis' => ['string', 'max:121'],
            'type' => [Rule::in(['اقتصادي', 'تامين'])],
            'hospital' => [Rule::in(['السلاح الطبي', 'علياء'])],
            'fresh' => ['nullable', 'boolean'],
            'bloods' => ['array'],
            'bloods.*.blood_type' => [Rule::in(['الدم الاحمر', 'الدم الاحمر المضغوط', 'الصفائح', 'البلازما'])],
            'bloods.*.quantity' => ['numeric']
        ];
    }
}
