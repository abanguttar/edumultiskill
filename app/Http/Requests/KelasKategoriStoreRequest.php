<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasKategoriStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_kategori' => 'required|string|max:25|unique:kelas_kategori,nama_kategori',
            'icon_kategori' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kategori.required' => 'Nama kategori harus diisi',
            'nama_kategori.max' => 'Nama kategori maksimal 25 karakter',
            'nama_kategori.unique' => 'Nama kategori sudah digunakan',
            'icon_kategori.required' => 'Icon kategori harus diisi',
            'icon_kategori.image' => 'File harus berupa gambar',
            'icon_kategori.mimes' => 'Format gambar harus jpeg, png, atau jpg',
            'icon_kategori.max' => 'Ukuran gambar maksimal 2MB',
        ];
    }
}