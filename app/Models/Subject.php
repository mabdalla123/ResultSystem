<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "semester_id",
        "credit_hours"

    ];


    public function semester():BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }


}
