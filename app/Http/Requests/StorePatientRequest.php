<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'place' => 'required',
            'date' => 'required',
            'jk' => 'required',
            'suku' => 'required',
            'pekerjaan' => 'required',
            'no_rek' => 'required',
            'alamat' => 'required',
            'pict' => 'required|mimes:jpg,jpeg,png'
        ];
    }
}
