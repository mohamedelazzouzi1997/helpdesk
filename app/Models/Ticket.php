<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Ticket extends Model
{
    use HasFactory,Commentable;

      protected $fillable = [
        'title',
        'description',
        'status',
        'image',
        'priority',
        'project_id',
        'created_by'
    ];
}
