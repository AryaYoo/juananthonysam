<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrayerRequestRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:150'],
            'request_text' => ['required', 'string', 'max:3000'],
            'is_anonymous' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Custom messages for validation
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap atau panggilan wajib diisi.',
            'request_text.required' => 'Pokok doa wajib dituliskan.',
            'request_text.max' => 'Pokok permohonan doa maksimal 3000 karakter.',
        ];
    }
}
