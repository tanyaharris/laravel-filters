<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses =  Course::with(['subjects'])->filter($request)->paginate(2);

        return view('courses.index',[
           'courses' => $courses
        ]);
    }

}
