<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKelasRequest extends FormRequest
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
            'judul_kelas' => 'required|max:110',
            'image' => 'image|max:2048',
            'video_file' => 'mimetypes:video/mpeg,video/mp4,video/mkv|max:10240',
            'jenjang_pendidikan' => 'required',
            'course_code' => 'nullable',
            'status_kelas' => 'required',
            'jenis' => 'required',
            'program' => 'required',
            'kelas_kategori_id' => 'required',
            'metode_pelatihan' => 'required',
            'level' => 'required',
            'best_seller' => 'required',
            'is_discount' => 'required',
            'harga_reguler' => 'required|numeric',
            'harga_discount' => 'sometimes|nullable|numeric|lte:harga_reguler',
            'approval_free' => 'required',
            'old_image' => 'nullable|string',
            'old_video' => 'nullable|string',
            'tutor_id' => 'nullable',
            'tutor_profesi' => 'nullable',
            'tutor_penilai_satu' => 'nullable',
            'tutor_penilai_dua' => 'nullable',
        ];
    }
}
