<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function GuzzleHttp\Promise\all;

class CreateExchangeRequest extends FormRequest
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
            'type' => [ Rule::in(['داخلي', 'خارجي'])],

            'order_id' => [Rule::requiredIf(function () {
                return $this->type == 'داخلي';
            }), 'exists:orders,id'],

            'hospital' => ['string', 'max:121'],

            'bottles' => ['nullable', 'array'],


        ];
    }
}
