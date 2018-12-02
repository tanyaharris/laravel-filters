<div class="list-group">

    @foreach($map as $value => $name)
        <a
                href="{{ route('courses.index', array_merge(request()->query(), [$key => $value])) }}"
                class="list-group-item {{request($key) === $value ? 'active' : ''}}">
            {{$name}}
        </a>
    @endforeach

</div>