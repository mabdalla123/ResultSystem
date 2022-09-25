<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "acadimic_year_id"
    ];

    protected $cast = [
        "subjects"=>"array"
    ];

    public function acadimicyear()
    {
        return $this->belongsTo(AcadimicYear::class,'acadimic_year_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
