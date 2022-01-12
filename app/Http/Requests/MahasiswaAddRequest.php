<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaAddRequest extends FormRequest
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
            "nim" => "required|unique:mahasiswa,nim|digits:10",
            "nama" => "required",
            "prodi" => "required",
            "angkatan" => "required",
            "nomerTelp" => "required",
        ];
    }

    public function messages()
    {
        return [
            'nim.unique' => 'NIM sudah terdaftar',
            'nim.digits' => 'Format NIM salah',
        ];
    }
}
