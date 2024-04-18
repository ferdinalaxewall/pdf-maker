<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConvertRequest extends FormRequest
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
            'nama_pewaris' => 'required|string',
            'alamat_pewaris' => 'required|string',
            'list_pewaris' => 'required|json',

            // 'list_pewaris.*.nama_anak' => "required|string",
            // 'list_pewaris.*.nik' => "required|string",
            // 'list_pewaris.*.tempat_lahir' => "required|string",
            // 'list_pewaris.*.tgl_lahir' => "required|date",
        ];
    }

    public function attributes()
    {
        return [
            'nama_pewaris' => 'Nama Pewaris',
            'alamat_pewaris' => 'Alamat Pewaris',
            'list_pewaris' => 'List Pewaris',

            'list_pewaris.*.nama_anak' => "Nama Anak",
            'list_pewaris.*.nik' => "NIK",
            'list_pewaris.*.tempat_lahir' => "Tempat Lahir",
            'list_pewaris.*.tgl_lahir' => "Tanggal Lahir",
        ];
    }
}
