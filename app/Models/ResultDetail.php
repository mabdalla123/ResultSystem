<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "result_id",
        "subject_id",
        "avarege"
    ];

    protected $cast = [
        "avarege"=>"double"
    ];

    public function reslut()
    {
        return $this->belongsTo(Result::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
