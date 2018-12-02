<?php

namespace App;

use App\Filters\Course\CourseFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Course extends Model
{
    protected $appends = [
        'started'
    ];
    public function scopeFilter(Builder $builder, Request $request, array $filters = [])
    {
        return (new CourseFilters($request))->add($filters)->filter($builder);
    }

    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectables');
    }

    public function getStartedAttribute()
    {
        if(! auth()->check())
        {
            return false;
        }

         return $this->users->contains( auth()->user());
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
