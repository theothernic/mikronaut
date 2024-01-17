<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
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
            'author_id' => 'sometimes|uuid',
            'title' => 'sometimes|max:150',
            'body' => 'required|min:5',
            'type' => 'required',
            'format' => 'required',
            'visibility' => 'required',
            'publish_at' => 'sometimes'
        ];
    }
}
