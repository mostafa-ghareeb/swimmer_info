<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHealthRequest extends FormRequest
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
            'weight' => ['required', 'numeric', 'min:1'],
            'height' => ['required', 'numeric', 'min:1'],
            'chronic_diseases' => ['nullable', 'boolean'],
            'please_mention' => ['nullable', 'string', 'max:255'],
            'undergoes_surgery' => ['nullable', 'boolean'],
            'type_of_operation' => ['nullable', 'string', 'max:255'],
            'sports_injuries' => ['nullable', 'boolean'],
            'type_of_injury' => ['nullable', 'string', 'max:255'],
        ];
    }
}
