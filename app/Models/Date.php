<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "day"
    ];

    public function hour()
    {
        return $this->belongsToMany(Hour::class, "date_hour");
    }
}
