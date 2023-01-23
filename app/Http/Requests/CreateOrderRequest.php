<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CreateOrderRequest extends FormRequest
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
        Log::info($this->request->all());
        return [
            'name' => ['required', 'string', 'max:121'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', Rule::in(['ذكر', 'انثى'])],
            'unit' => ['required', 'string', 'max:121'],
            'diagnosis' => ['required', 'string', 'max:121'],
            'type' => ['required', Rule::in(['اقتصادي', 'تامين'])],
            'hospital' => ['required', Rule::in(['السلاح الطبي', 'علياء'])],
            'fresh' => ['nullable', 'boolean'],
            'bloods' => ['required', 'array'],
            'bloods.*.blood_type' => ['required', Rule::in(['الدم الاحمر', 'الدم الكامل', 'الصفائح', 'البلازما', 'الراسب المتجمد'])],
            'bloods.*.quantity' => ['required', 'numeric']
        ];
    }
}
