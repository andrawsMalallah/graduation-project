<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'stage',
        'image',
        'link',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
