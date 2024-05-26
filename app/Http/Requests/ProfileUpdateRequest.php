<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    
    protected function prepareForValidation()
    {
        if ($this->phone && strpos($this->phone, '0') === 0) {
            $this->merge([
                'phone' => '62' . substr($this->phone, 1),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, 
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['nullable', 'string', 'regex:/^62\d{9,14}$/'], // Pastikan nomor telepon dimulai dengan 62 dan memiliki panjang yang tepat
        ];
    }
}
