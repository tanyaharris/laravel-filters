<?php

namespace App\Filters\Course;

use App\Filters\Course\Orderning\ViewsOrder;
use App\Filters\FiltersAbstract;


class CourseFilters extends FiltersAbstract
{
    protected $filters = [
        'access' => AccessFilter::class,
        'difficulty' => DifficultyFilter::class,
        'subject' => SubjectFilter::class,
        'views' => ViewsOrder::class
    ];
}