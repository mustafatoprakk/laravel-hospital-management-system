<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function department()
    {
        return $this->belongsToMany(Department::class, "hospital_department");
    }

    public function doctor()
    {
        return $this->belongsToMany(Doctor::class, "doctor_hospital");
    }
}
