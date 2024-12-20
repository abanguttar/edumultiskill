<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTutorRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'nullable',
            'image' => 'nullable|image',
            'phone' => 'required|numeric',
            'address' => 'required',
            'job_title' => 'nullable',
            'deskripsi_diri' => 'nullable|max:500',
            'linkedin' => 'required',
            'is_active' => 'nullable',
        ];
    }
}
