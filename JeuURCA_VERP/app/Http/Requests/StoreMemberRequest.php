<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'name' => 'required|string',
            'prenom' => 'required|string',
            'composante' => 'required',
            'genre' => 'required|in:homme,femme,autre', // Assurez-vous d'ajuster les valeurs en fonction de vos besoins
            'handicap' => 'required|in:1,0',
        ];
    }
}
