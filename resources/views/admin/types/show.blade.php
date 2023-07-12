@extends('admin.layouts.base')

@section('contents')

    <h2 class="text-danger p-3">{{ $type->name }}</h2>
    <p>{{ $type->description }}</p>

    <h3 class="text-danger p-3">Projects </h3>
    <ul>
        @foreach ($type->projects as $project)
            <li><a href="{{ route('admin.projects.show', ['project' => $project]) }}">{{ $project->title }}</a></li>
        @endforeach
    </ul>

@endsection
