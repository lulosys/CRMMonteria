<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteFinalRequest extends FormRequest
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
            'created_at_start' => 'date_format:d/m/Y',
            'created_at_end' => 'date_format:d/m/Y'
        ];
    }

    public function messages()
    {
        return [
            'created_at_start.date_format' => 'Fecha inicio no corresponde al formato d/m/Y.',
            'created_at_end.date_format' => 'Fecha fin no corresponde al formato d/m/Y.'
        ];
    }
}
