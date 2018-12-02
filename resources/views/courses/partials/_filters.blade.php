<a href="{{route('courses.index')}}" class="list-group-item">Clear of filter</a>

@foreach(\App\Filters\Course\CourseFilters::mappings() as $key => $map)
    @include('courses.partials._filter_list',compact('key','map'))
@endforeach


