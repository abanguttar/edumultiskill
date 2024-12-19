<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeskripsiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul_keterangan' => 'nullable',
            'deskripsi' => 'nullable',
            'metode_pembelajaran' => 'nullable',
            'fasilitator' => 'nullable',
            'img_fasilitator' => 'nullable|image',
            'deskripsi_fasilitator' => 'nullable',
            'jam' => 'nullable',
            'menit' => 'nullable',
            'sertifikat_judul' => 'nullable',
            'sertifikat_tenaga_pelatih' => 'nullable',
            'sertifikat_metode_satu' => 'nullable',
            'sertifikat_metode_dua' => 'nullable',
        ];
    }
}
