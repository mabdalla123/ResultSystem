<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcadimicYear extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "department_id"
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function semester()
    {
        return $this->hasMany(Semester::class);
    }
}
