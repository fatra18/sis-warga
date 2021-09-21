<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoveRequest extends FormRequest
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
            'date_move' => 'required',
            'reason' => 'required',
          
        ];
    }

    public function messages()
    {   
    return [
        'residents_id.required' => 'residents_id harus diisi',
        'date_move.required' => 'date_move harus diisi',
        'reason.required' => 'reason harus diisi',
       
    
    ];
}
}
