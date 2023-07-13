@extends('admin.layouts.base')

@section('contents')

<a class="btn btn-primary m-4" href="{{ route('admin.technologies.index') }}">Technologies Index</a>


    <h2 class="text-center text-danger p-3">Projects using language</h2>
    <h3 class="text-center text-danger p-3">{{ $technology->name }}</h3>
    <ul>
        @foreach ($technology->projects as $project)
            <li><a href="{{ route('admin.projects.show', ['project' => $project]) }}">{{ $project->title }}</a></li>
        @endforeach
    </ul>

@endsection
