<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyCardRequest extends FormRequest
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
            'family_card_number' => 'required|max:16|min:16',
            'residents_id' => 'required',
            'village' => 'required|max:255',
            'rt' => 'required',
            'rw' => 'required|max:255',
            'address' => 'required|max:255',
            'regencies_id' => 'required',
            'districts_id' => 'required',
            'provinces_id' => 'required',
          
        ];
    }

        public function messages()
        {   
        return [
            'family_card_number.required' => 'family_card_number harus diisi',
            'residents_id.required' => 'residents_id harus diisi',
            'village.required' => 'village harus diisi',
            'rt.required' => 'rt harus diisi',
            'rw.required' => 'rw harus diisi',
            'address.required' => 'address harus diisi',
            'regencies_id.required' => 'blood_group harus diisi',
            'districts_id.required' => 'address harus diisi',
            'provinces_id.required' => 'rt harus diisi',
        
        ];
    }
}
