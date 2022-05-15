<?php

namespace App\Models;

use App\Models\User;
use App\EloquentFilters\NameFilter;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Abdrzakoxa\EloquentFilter\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Ticket extends Model
{
    use HasFactory,Commentable,Filterable;

      protected $fillable = [
        'title',
        'description',
        'status',
        'image',
        'priority',
        'project_id',
        'user_id',
        'created_by',
        'end_time'
    ];
        protected $filters = [
        NameFilter::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
