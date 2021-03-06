<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use App\EloquentFilters\NameFilter;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Abdrzakoxa\EloquentFilter\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Ticket extends Model
{
    use HasFactory,Commentable;

      protected $fillable = [
        'title',
        'description',
        'status',
        'image',
        'priority',
        'parent_id',
        'user_id',
        'created_by',
        'end_time'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children(){

        return $this->hasMany(Ticket::class,'parent_id')->with('children');
    }

}
