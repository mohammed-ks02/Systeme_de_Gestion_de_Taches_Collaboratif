<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- ADD THIS LINE
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory; // <-- AND ADD THIS LINE

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'project_id',
        'user_id',
    ];
}
