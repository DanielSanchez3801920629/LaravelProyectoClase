<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            //
            'grade_name' => 'required|min:5|max:30',
            'grade_value_percentage' => ['required', 'numeric', 'min:1'],
            'grade_deadline' => ['required', 'date']
        ];
    }
}
