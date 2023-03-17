<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "gender",
        "image"
    ];

    public function department()
    {
        return $this->belongsToMany(Department::class, "doctor_department");
    }

    public function hospital()
    {
        return $this->belongsToMany(Hospital::class, "doctor_hospital");
    }
}
