<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSportDataRequest extends FormRequest
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
            'member_of_other_clubs' => 'nullable|boolean',
            'other_clubs' => 'nullable|string|max:255',
            'did_you_play_for_other_club' => 'nullable|boolean',
            'have_you_obtained_the_star_tests_and_their_number' => 'nullable|string|max:255',
            'where_to_get_star_tests' => 'nullable|string|max:255',
            'union_registration_number' => 'nullable|numeric',
        ];
    }
}
