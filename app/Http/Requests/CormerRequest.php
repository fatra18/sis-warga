<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CormerRequest extends FormRequest
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
            'id_number' => 'required|max:16|min:16',
            'name_comers' => 'required|max:24',
            'gender' => 'required|in:Pria,Wanita',
            'arrival_date' => 'required',
            'residents_id' => 'required',
        ];
    }

    public function messages()
    {   
    return [
        'id_number.required' => 'number_id harus diisi',
        'name_comers.required' => 'name_comers harus diisi',
        'gender.required' => 'gender harus diisi',
        'arrival_date.required' => 'arrival_date harus diisi',
        'residents_id.required' => 'residents_id harus diisi',
    ];
}

    
}
