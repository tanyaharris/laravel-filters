<?php

namespace App\Http\Controllers\Api;

use App\Filters\Course\CourseFilters;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        return new CourseResource(
            Course::with(['subjects'])->filter($request)->paginate(2)
        );

    }


    public function filters()
    {
        return response()->json([
            'data'=>CourseFilters::mappings()
        ],200);
    }
}
