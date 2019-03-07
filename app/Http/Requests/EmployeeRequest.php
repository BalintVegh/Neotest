<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|max:191',
            'company_id' => 'required',
            'email' => 'required|email|unique:employees,id,:id',
            'phone' => 'required|regex:/[+]{1}[3]{1}[6]{1}(\s?)[\d]{1,13}$/|max:17',
            'post' => 'required'
        ];
    }
}
