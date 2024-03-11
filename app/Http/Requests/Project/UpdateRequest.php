<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

//Helpers
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'type_id' => 'nullable|exists:types,id',
            'content' => 'required|string|max:10000',
            'technologys' => 'nullable|array|exists:tags,id',
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
