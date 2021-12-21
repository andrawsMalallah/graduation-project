<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'image',
        'video',
        'short_description',
        'long_description',
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }

    public function library()
    {
        return $this->hasMany(Library::class);
    }
}
