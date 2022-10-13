<?php

namespace App\Http\Requests\Api\v1\AcadimicYear;

use Illuminate\Foundation\Http\FormRequest;

class AcadimicYearCreateRequest extends FormRequest
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
            'name' => 'required|unique:acadimic_years,name',
            'department_id' => 'required|exists:departments,id',
        ];
    }
}
