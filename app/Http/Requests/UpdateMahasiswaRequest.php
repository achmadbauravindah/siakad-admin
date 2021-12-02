<?php

namespace App\Http\Requests;

use App\Models\Mahasiswa;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
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
            'nim' =>
            'required|string|min:12',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string|min:0|max:1',
            'kode_agama' => 'required|string|min:0|max:1',
            'kode_prodi' => 'required|string|min:0|max:2',
        ];
    }
}
