<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnalyzeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required | numeric',
            'start_date' => 'required | date | before_or_equal:today |  before_or_equal:end_date',
            'end_date' => 'required | date | before_or_equal:today | after_or_equal:start_date',
            'start_open_or_close' => 'required',
            'end_open_or_close' => 'required',
        ];
    }
}
