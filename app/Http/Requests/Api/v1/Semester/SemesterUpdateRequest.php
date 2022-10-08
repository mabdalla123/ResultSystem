<?php

namespace App\Http\Requests\Api\v1\Semester;

use Illuminate\Foundation\Http\FormRequest;

class SemesterUpdateRequest extends FormRequest
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
            "name"=>"alpha",
            "acadimic_year_id"=>"exists:acadimic_years,id",
            "is_available_for_students"=>"boolean",
        ];
    }
}
