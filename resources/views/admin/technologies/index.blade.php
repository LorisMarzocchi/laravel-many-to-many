@extends('admin.layouts.base')

@section('contents')

@if (session('delete_success'))
@php
    $project = session('delete_success')
@endphp
<div class="alert alert-danger">
    "{{ $project->title }}" has been moved to the trash!!
    <form action="{{ route("admin.project.cancel", ['project' => $project] )}}" method="post">
        @csrf
        <button class="btn btn-warning">Cancel</button>
    </form>
</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($technologies as $technology)
            <tr>
                <th scope="row">{{ $technology->id }}</th>
                <td>{{ $technology->name }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.technologies.show', ['technology' => $technology]) }}">View</a>
                    <a class="btn btn-warning" href="{{ route('admin.technologies.edit', ['technology' => $technology]) }}">Edit</a>
                    <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $technology->id }}">
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
                <form
                    action=""
                    data-template= "{{ route('admin.technologies.destroy', ['technology' => '*****']) }}"
                    method="post"
                    class="d-inline-block"
                    id="confirm-delete"
                >
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                    {{-- <form class="d-inline-block" method="POST" action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
