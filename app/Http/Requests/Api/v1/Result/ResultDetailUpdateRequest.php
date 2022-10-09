<?php

namespace App\Http\Requests\Api\v1\Result;

use Illuminate\Foundation\Http\FormRequest;

class ResultDetailUpdateRequest extends FormRequest
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
            "result_id"=>"exists:results,id",
            "subject_id"=>"exists:subjects,id",
            "student_certified_hours"=>"numeric",
            "avarege"=>"numeric",
            "mark"=>"alpha",
            "point"=>"numeric",
        ];
    }
}
