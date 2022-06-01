<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'report_type' => 'Required' ,
            'hall_number'=> 'Required|numeric' ,
            'title' => 'Required',
            'body' => 'Required',
        ];
    }

    public function messages()
    {

        return [
            'report_type.exists' => trans('report.report_type_exists'),
            'report_type.required' => trans('report.report_type_required'),
            'title.required' => trans('report.title'),
            'body.required' => trans('report.body'),
            'hall_number.numeric'=> trans('report.hall_number_numeric'),
            'hall_number.required'=> trans('report.hall_number_required'),


        ];
    }
}
