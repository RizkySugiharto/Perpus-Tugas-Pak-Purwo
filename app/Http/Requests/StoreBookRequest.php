<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBookRequest extends FormRequest
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
            'cover_file' => 'required|image|max:10240',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:200',
            'publisher' => 'required|string|max:200',
            'published_date' => 'date',
            'description' => 'required|string',
        ];
    }
}
