<?php

namespace App\Http\Resources\Api\v1\Result;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ResultResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'student_id' => $request->student_id,
            'semester_id' => $request->semester_id,
            'average' => $request->average,
            'details' => $request->details,
            // "details" => ResultDetailsResource::collection($request->details)
        ];
    }
}
