<?php

namespace App\Http\Requests\Api\v1\Result;

use Illuminate\Foundation\Http\FormRequest;

class ResultUpdateRequest extends FormRequest
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
            'student_id' => 'exists:students,id',
            'semester_id' => 'exists:semesters,id',
            'average' => 'nullable',

        ];
    }
}
