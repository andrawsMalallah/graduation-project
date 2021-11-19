<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'image',
        'video',
        'description',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
