<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SousMenuRequest extends FormRequest
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
            'titre' => 'required|string|max:50',
            'lien' => 'required|string|max:255',
            'afficher' => 'required|boolean',
            'menu_id' => 'required|int'
        ];
    }

    public function messages() { return []; }
}
