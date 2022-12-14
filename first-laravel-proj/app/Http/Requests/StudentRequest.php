<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required',
            'document' => ['required', 'integer', 'min:5'],
            'name' => 'required|min:5|max:30',
            'lastname' => ['required'],
            'birthdate' => ['required', 'date']
        ];
    }
}
