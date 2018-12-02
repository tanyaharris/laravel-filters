<?php

namespace App\Filters\Course\Orderning;


use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class ViewsOrder extends FilterAbstract
{
    public function filter(Builder $builder, $value)
    {
        return $builder->orderBy('views',$value);
    }
}