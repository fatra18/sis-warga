<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BornRequest extends FormRequest
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
            'name' => 'required|max:12',
            'place_of_birth' => 'required|max:12',
            'date_of_birth' => 'required',
            'gender' => 'required|in:Pria,Wanita',
            'family_cards_id' => 'required',
        ];
    }

    public function messages()
    {   
    return [
        'name.required' => 'name harus diisi',
        'place_of_birth.required' => 'place_of_birth harus diisi',
        'date_of_birth.required' => 'date_of_birth harus diisi',
        'gender.required' => 'gender harus diisi',
        'family_cards_id.required' => 'family_cards_id harus diisi',
    ];
}

}
