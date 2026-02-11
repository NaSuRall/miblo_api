<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8",
            "phone" => "required|string|max:20",
        ];
    }

    public function messages(): array
    {
        return [
            "email.required" => "L’email est obligatoire.",
            "email.email" => "Le format de l’email est invalide.",
            "email.unique" => "Cet email est déjà utilisé.",
            "password.required" => "Le mot de passe est obligatoire.",
            "password.min" =>
                "Le mot de passe doit faire au moins 8 caractères.",
        ];
    }
}
