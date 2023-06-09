<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;

    protected $fillable = [
        "hour"
    ];

    public function date()
    {
        return $this->belongsToMany(Date::class, "date_hour");
    }
}
