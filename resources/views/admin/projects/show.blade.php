@extends('admin.layouts.base')

@section('contents')
    <div class="card border-0 text-center m-auto" style="width: 400px">
        <img src="{{ $project->url_image }}" style="width: 400px; height: 400px" alt="">
        <div class="card-body">
            <h3>{{ $project->title }}</h3>
            <p>{{ Str::limit($project->description, 150, '...') }}</p>
            <h5>Type: {{ $project->type->name }}</h5>
            <h5>
                <span class="text-danger">Languages:</span>
                {{ $project->languages }}
            </h5>
            <h5>
                <a href="{{ $project->link_github }}" class="text-danger">GitHub Link:</a>
                {{ $project->link_github }}
            </h5>
            {{-- <h5>

                <span class="text-danger">Relese Date:</span>
                {{ date('d-m-Y', strtotime($comic->sale_date)) }}
            </h5>
            <h5>
                <span class="text-danger">Type:</span>
                {{ $comic->type }}
            </h5> --}}







        </div>
    </div>
@endsection
