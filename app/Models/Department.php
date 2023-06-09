<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function hospital()
    {
        return $this->belongsToMany(Hospital::class, "hospital_department");
    }

    public function doctor()
    {
        return $this->belongsToMany(Doctor::class, "doctor_department");
    }
}
