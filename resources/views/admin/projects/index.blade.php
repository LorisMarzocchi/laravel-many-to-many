@extends('admin.layouts.base')

@section('contents')
    <h1 class="text-center text-danger p-3">Project List:</h1>
    @if (session('delete_success'))
        @php $project = session('delete_success') @endphp
        <div class="alert alert-danger">
            Project '{{ $project->title }}' has been cancelled

        </div>
    @endif




    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Technologies</th>
                <th scope="col">Link Github</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->title }}</th>
                    {{-- <td>{{ $project->url_image }}</td> --}}
                    <th>
                        @if ($project->type)
                            <a href="{{ route('admin.types.show', ['type' => $project->type]) }}">{{ $project->type->name }}</a>
                        @elseif($project->type === null)
                            {{ 'No type' }}
                        @endif
                    </th>

                    <td><img class="img-thumbnail" src="{{ $project->url_image }}" alt="{{ $project->title }}" style="width: 200px;"></td>

                    <td class="text-center">{{ $project->description }}</td>

                    <td>
                        @foreach($project->technologies as $technology)
                            <a class="mx-1" href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}">
                                {{ $technology->name }}
                            </a>{{ !$loop->last ? '-' : ' ' }}
                        @endforeach
                    </td>

                    {{-- <td>{{ implode(', ', $project->technologies->pluck('name')->all()) }}</td> --}}

                    <td><a class=" text-decoration-none " href="{{ $project->link_github }}">{{ $project->link_github }}"</a></td>

                    <td class="d-flex mt-4">
                        <a class="btn btn-primary me-2" href="{{ route('admin.projects.show', ['project' => $project]) }}">View</a>
                        <a class="btn btn-warning me-2" href="{{ route('admin.projects.edit', ['project' => $project]) }}">Edit</a>
                        <form class="d-inline-block" method="POST" action="{{ route('admin.projects.destroy', ['project' => $project]) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        {{-- <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $project->slug }}">
                            Delete
                        </button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $projects->links() }}


    {{-- paginator noBootstrap
    <div>
        <ul>
            @for ($i = 1; $i <= $comics->lastPage(); $i++)
            <li>
                <a href="/comics?page={{ $i }}">{{ $i }}</a>
            </li>
            @endfor
        </ul>
  </div> --}}
@endsection
