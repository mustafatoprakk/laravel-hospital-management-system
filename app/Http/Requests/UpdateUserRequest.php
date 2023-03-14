<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "u_name" => ["required"],
            "u_email" => ["required"],
            "u_password" => ["nullable", "min:4"],
            "u_phone" => ["nullable", "min:10", "max:11"],
            "image" => ["nullable"],
            "oldImage" => ["nullable"],
        ];
    }
}
