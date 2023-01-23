<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomogeneityRequest extends FormRequest
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
            'order_id' => ['exists:orders,id'],
            'dontion_id' => ['exists:donations,id'],
            'person_id' => ['exists:people,id'],
            'bottels' => ['nullable', 'array'],
            'note' => ['nullable', 'string',]
        ];
    }
}
