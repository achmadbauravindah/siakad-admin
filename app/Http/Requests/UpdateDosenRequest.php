<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDosenRequest extends FormRequest
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
            'nip' => 'required|string|min:18',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string|min:0|max:1',
            'tahun_masuk' => 'required|numeric',
            'kode_agama' => 'required|string|min:0|max:1',
            'kode_prodi' => 'required|string|min:0|max:2',
            'kode_matkul' => 'required|string|min:6',

        ];
    }
}
