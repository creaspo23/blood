<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'job_title' => ['string', 'max:121'],
            'unit' => ['string', 'max:121'],
            'type' => [Rule::in(['نظامي', 'مدني'])],
            'rank' => [Rule::in(['رقيب', 'رقيب اول', 'ملازم', 'ملازم اول', 'نقيب', 'رائد', 'مقدم', 'عقيد', 'عميد', 'لواء', 'فريق'])],
        ];
    }
}
