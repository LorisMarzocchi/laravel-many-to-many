@extends('admin.layouts.base')

@section('contents')
    @if (session('delete_success'))
        @php $project = session('delete_success') @endphp
        <div class="alert alert-danger">
            The Project "{{ $project->title }}" has been permanently deleted
        </div>
    @endif


    @if (session('restore_success'))
        @php $project = session('restore_success') @endphp
        <div class="alert alert-success">
            The Project '{{ $project->title }}' has been restored
        </div>
    @endif

    <table class="table table-striped">
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
            @foreach ($trashedProjects as $project)
                <tr>
                    <th scope="row">{{ $project->title }}</th>
                    {{-- <td>{{ $project->url_image }}</td> --}}
                    <th>
                        @if ($project->type)
                            <a
                                href="{{ route('admin.types.show', ['type' => $project->type]) }}">{{ $project->type->name }}</a>
                        @elseif($project->type === null)
                            {{ 'No type' }}
                        @endif
                    </th>

                    <td><img class="img-thumbnail" src="{{ $project->url_image }}" alt="{{ $project->title }}"
                            style="width: 200px;"></td>

                    <td class="text-center">{{ $project->description }}</td>

                    <td>
                        @foreach ($project->technologies as $technology)
                            <a class="mx-1"
                                href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}">
                                {{ $technology->name }}
                            </a>{{ !$loop->last ? '-' : ' ' }}
                        @endforeach
                    </td>

                    {{-- <td>{{ implode(', ', $project->technologies->pluck('name')->all()) }}</td> --}}

                    <td><a class=" text-decoration-none "
                            href="{{ $project->link_github }}">{{ $project->link_github }}"</a></td>

                    <td class="d-flex mt-4">
                        <form class="d-inline-block" method="POST" action="{{ route('admin.project.restore', ['project' => $project]) }}">
                            @csrf
                            <button class="btn btn-warning">Restore</button>
                        </form>
                        <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $project->slug }}">
                        Delete
                    </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="{{ route('admin.project.harddelete', ['project' => $project]) }}"
                        {{-- data-template="{{ route('admin.project.harddelete', ['project' => '***']) }}" --}}
                        method="post" class="d-inline-block" id="btn-confirm-delete">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{ $trashedProjects->links() }}
@endsection
