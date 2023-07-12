@extends('admin.layouts.base')

@section('contents')



    <h2 class="text-center text-danger p-3">Projects using language</h2>
    <h3 class="text-center text-danger p-3">{{ $technology->name }}</h3>
    <ul>
        @foreach ($technology->projects as $project)
            <li><a href="{{ route('admin.projects.show', ['project' => $project]) }}">{{ $project->title }}</a></li>
        @endforeach
    </ul>

@endsection
