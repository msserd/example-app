<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'owner_id', 
        'is_active', 
        'assignee_id', 
        'deadline_date', 
    ];
}