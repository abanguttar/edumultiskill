<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimoniRequest extends FormRequest
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
            'nama' => 'required|max:26',
            'kelas' => 'required|max:110',
            'profesi' => 'required|max:30',
            'ulasan' => 'required|max:400',
            'image' => 'nullable|image',
            'urutan' => 'required|numeric',
            'old_image' => 'nullable'
        ];
    }
}
