<?php

namespace App\Http\Requests\Api\v1\Subject;

use Illuminate\Foundation\Http\FormRequest;

class SubjectUpdateRequest extends FormRequest
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
            "name"=>"unique:subjects,name",
            "certified_hours"=>"numeric",
            "semester_id"=>"exists:semesters,id",
        ];
    }
}
