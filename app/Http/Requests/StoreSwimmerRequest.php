<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSwimmerRequest extends FormRequest
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
            'name' => ['required','string'],
            'address' => ['required','string'],
            'religion' => ['nullable','in:muslim,christian'],
            'membership_type' => ['required','string'],
            'phone' => ['required', 'regex:/^01[0-9]{9}$/'],
            'whatsapp_phone' => ['required', 'regex:/^01[0-9]{9}$/'],
            'father_phone' => ['required', 'regex:/^01[0-9]{9}$/'],
            'educational_qualification' => ['nullable','string'],
            'father_job' => ['nullable','string'],
            'birthdate' => ['nullable', 'date', 'before_or_equal:today'],
            'national_ID' => ['required', 'digits:14', 'unique:swimmers,national_ID'],
            'membership_number' => ['required', 'unique:swimmers,membership_number'],
            'current_work' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:30720'],
        ];
    }
}
