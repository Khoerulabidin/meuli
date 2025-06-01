<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchMstrRequest extends FormRequest
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
            'branch_mstr_name' => 'required|string|max:255',
            'branch_mstr_joined' => 'required|date',
            'branch_mstr_addr1' => 'required|string',
            'branch_mstr_addr2' => 'nullable|string',
            'branch_mstr_telp' => 'required|string|max:25',
            'branch_mstr_fax' => 'required|string|max:255',
            'branch_mstr_email' => 'nullable|email',
            'branch_mstr_pic' => 'required|string|max:255',
            'branch_mstr_sosmed1' => 'nullable|string|max:255',
            'branch_mstr_sosmed2' => 'nullable|string|max:255',
            'branch_mstr_sosmed3' => 'nullable|string|max:255',
            'branch_mstr_sosmed4' => 'nullable|string|max:255',
            'branch_mstr_profile' => 'nullable',
            'branch_mstr_img' => 'nullable',
        ];
    }
}
