<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSKKNIRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sertifikat_judul_skkni' => 'required|string|max:50',
            'sertifikat_judul_kode_unit' => 'required|string|max:50',
            'skkni' => 'array',
            'skkni.*' => 'string|max:50',
            'skkni_ids' => 'array',
            'skkni_ids.*' => 'exists:skknis,id',
            'kode_unit' => 'array',
            'kode_unit.*' => 'string|max:50',
            'keterangan' => 'array',
            'keterangan.*' => 'string|max:100',
            'kode_unit_ids' => 'array',
            'kode_unit_ids.*' => 'exists:kode_units,id'
        ];
    }
}