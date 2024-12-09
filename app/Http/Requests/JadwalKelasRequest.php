<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalKelasRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'kelas_id' => 'required|exists:kelas,id',
            'judul_jadwal_pelatihan' => 'required|string|max:255',
            'schedule_code' => 'required|string|max:50|unique:jadwal_pelatihans,schedule_code,' . $this->jadwal_id,
            'status' => 'in:aktif,tidak aktif',

            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'waktu_pelaksanaan' => 'required|string',
            'kuota_max' => 'required|numeric',
            'zona_waktu' => 'required|in:WIB,WITA,WIT',
            'kuota' => 'required|integer|min:1'

        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'judul_jadwal_pelatihan.required' => 'Judul jadwal pelatihan harus diisi',
            'judul_jadwal_pelatihan.max' => 'Judul jadwal pelatihan maksimal 255 karakter',
            'schedule_code.required' => 'Kode jadwal harus diisi',
            'schedule_code.unique' => 'Kode jadwal sudah digunakan',
            'status.in' => 'Status harus aktif atau tidak aktif',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi',
            'tanggal_mulai.date' => 'Format tanggal mulai tidak valid',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi', 
            'tanggal_selesai.date' => 'Format tanggal selesai tidak valid',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai',
            'waktu_mulai.required' => 'Waktu mulai harus diisi',
            'waktu_mulai.date_format' => 'Format waktu mulai tidak valid',
            'waktu_selesai.required' => 'Waktu selesai harus diisi',
            'waktu_selesai.date_format' => 'Format waktu selesai tidak valid',
            'waktu_selesai.after' => 'Waktu selesai harus setelah waktu mulai',
            'waktu_pelaksanaan.required' => 'Waktu pelaksanaan harus diisi',
            'kuota_max.required' => 'Kuota Maksimal harus diisi',
            'kuota_max.numeric' => 'Kuota harus menggunakan angka',
            'zona_waktu.required' => 'Zona waktu harus diisi',
            'zona_waktu.in' => 'Zona waktu harus WIB, WITA, atau WIT',
            'kuota.integer' => 'Kuota harus berupa angka'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Format waktu pelaksanaan
        $waktuMulai = $this->waktu_mulai;
        $waktuSelesai = $this->waktu_selesai;
        $zonaWaktu = $this->zona_waktu;

        if ($waktuMulai && $waktuSelesai && $zonaWaktu) {
            $this->merge([
                'waktu_pelaksanaan' => sprintf(
                    '%s %s s/d %s %s',
                    str_replace(':', '.', $waktuMulai),
                    $zonaWaktu,
                    str_replace(':', '.', $waktuSelesai),
                    $zonaWaktu
                )
            ]);
        }
    }
}