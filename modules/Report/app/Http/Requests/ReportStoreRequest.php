<?php

namespace Modules\Report\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'title' => ['required', 'string'],
            // 'attach.*' => ['nullable', 'file'],
            // 'description' => ['nullable', 'string'],
            'drafter' => ['nullable', 'string'],
            'prioritas' => ['nullable', 'string'],
            // 'tgl'                   => ['nullable', 'date'],
            'unit' => ['nullable', 'string'],
            'equipment' => ['nullable', 'string'],
            'deskripsi_pekerjaan' => ['nullable', 'string'],
            'nama' => ['nullable', 'string'],
            'upload_foto.*' => ['nullable', 'file'],
            'lokasi_barang' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
