@include('courses.partials._filter_list',[
    'map' => [
        'free' => 'Free',
        'premium' => 'Premium'
    ],
    'key' => 'access'
])

@include('courses.partials._filter_list',[
    'map' => ['advanced'=>'Advanced','intermediate'=>'Intermediate','beginner'=>'Beginner'],
    'key' => 'difficulty'
])

