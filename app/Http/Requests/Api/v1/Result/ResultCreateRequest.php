<?php

namespace App\Http\Requests\Api\v1\Result;

use Illuminate\Foundation\Http\FormRequest;

class ResultCreateRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',
            'semester_id' => 'required|exists:semesters,id',
            'average' => 'numeric|nullable',
            'details' => 'array|present',
            'details.*.subject_id' => 'required|exists:subjects,id',
            'details.*.student_certified_hours' => 'required|numeric',
            'details.*.avarege' => 'required|numeric',
            'details.*.mark' => 'required|alpha',
            'details.*.point' => 'required',

        ];
    }
}
