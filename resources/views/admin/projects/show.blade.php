@extends('admin.layouts.base')

@section('contents')
<a class="btn btn-primary m-4" href="{{ route('admin.projects.index') }}">Project Index</a>
    <div class="card border-0 text-center m-auto" style="width: 400px">
        <img src="{{ $project->url_image }}" style="width: 400px; height: 400px" alt="">
        <div class="card-body">
            <h3>{{ $project->title }}</h3>
            <p>{{ Str::limit($project->description, 150, '...') }}</p>
            @if ($project->type)
                <h5>
                    <span class="text-danger">Type:</span> {{ $project->type->name }}
                </h5>

             @elseif($project->type === null)
             <h5>
                <span class="text-danger">Type:</span> {{ 'No type' }}
            </h5>

            @endif

            <h5>
                <span class="text-danger">Languages:</span>
                {{ implode(', ', $project->technologies->pluck('name')->all()) }}
            </h5>
            <h5>
                <a href="{{ $project->link_github }}" class="text-danger">GitHub Link:</a>
                {{ $project->link_github }}
            </h5>

        </div>
    </div>


@endsection
