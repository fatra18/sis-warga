<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidentRequest extends FormRequest
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
            'number_id' => 'required|max:16|min:16',
            'name' => 'required|max:255',
            'place_of_birth' => 'required|max:20',
            'date_of_birth' => 'required',
            'gender' => 'required|in:Pria,Wanita',
            'village' => 'required|max:255',
            'blood_group' => 'required',
            'address' => 'required|max:255',
            'rt' => 'required|max:4',
            'rw' => 'required|max:4',
            'religion' => 'required',
            'marital_status' => 'required',
            'work' => 'required|max:255',
            'status' => 'required',
            'contact' => 'required|max:12',
            'education' => 'required|max:3',
        ];
    }

            public function messages()
            {   
            return [
                'number_id.required' => 'number_id harus diisi',
                'name.required' => 'name harus diisi',
                'place_of_birth.required' => 'place_of_birth harus diisi',
                'date_of_birth.required' => 'date_of_birth harus diisi',
                'gender.required' => 'gender harus diisi',
                'village.required' => 'village harus diisi',
                'blood_group.required' => 'blood_group harus diisi',
                'address.required' => 'address harus diisi',
                'rt.required' => 'rt harus diisi',
                'rw.required' => 'rw harus diisi',
                'religion.required' => 'religion harus diisi',
                'marital_status.required' => 'marital_status harus diisi',
                'work.required' => 'work harus diisi',
                'status.required' => 'status harus diisi',
                'contact.required' => 'contact harus diisi',
                'education.required' => 'education harus diisi',
            ];
        }
}
