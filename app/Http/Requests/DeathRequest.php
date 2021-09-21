<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeathRequest extends FormRequest
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
            'residents_id' => 'required',
            'date_of_birth' => 'required',
            'reason' => 'required|max:100',
        ];
    }

    public function messages()
    {   
    return [
        'residents_id.required' => 'residents_id harus diisi',
        'date_of_birth.required' => 'date_of_birth harus diisi',
        'reason.required' => 'reason harus diisi',
    ];
}
    
}
