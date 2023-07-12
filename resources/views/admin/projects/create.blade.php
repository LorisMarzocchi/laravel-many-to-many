@extends('admin.layouts.base')

@section('contents')
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
    <h1 class="text-danger text-center mb-5">Create New Project</h1>
    <form class="w-75 m-auto" method="POST" action="{{ route('admin.projects.store') }}">

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}">

                @error('title')
                    {{ $message }}
                @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_id">
                <option selected>Select Type</option>

                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('type_id') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <h6>technologies</h6>
            @foreach ($technologies as $technology)
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="technology{{ $technology->id }}"
                    value="{{ $technology->id }}"
                    name="technologies[]"
                    @if (in_array($technology->id, old('technologies') ?: [])) checked @endif
                >
                <label class="form-check-label" for="technology{{ $technology->id }}">
               {{ $technology->name }}
                </label>
            </div>
            @endforeach
        </div>
        {{-- @dump($errors->get('technologies.*')) --}}
        @error('technologies.*')
            <div class="text-danger mt-3">
                {{ $message }}
            </div>
        @enderror


        <div class="mb-3">
            <label for="url_image" class="form-label">Url Image</label>
            <input type="text" class="form-control @error('url_image') is-invalid @enderror" id="url_image" name="url_image"
                value="{{ old('url_image') }}">

                @error('url_image')
                    {{ $message }}
                @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                name="description" value="{{ old('description') }}">@error('description'){{ $message }}@enderror
            </textarea>

        </div>


        {{-- <div class="mb-3">
            <label for="languages" class="form-label">Languages</label>
            <input type="text" class="form-control @error('languages') is-invalid @enderror" id="languages" name="languages"
                value="{{ old('languages') }}">

                @error('languages')
                    {{ $message }}
                @enderror
        </div> --}}

        <div class="mb-3">
            <label for="link_github" class="form-label">link_github</label>
            <input type="text" class="form-control @error('link_github') is-invalid @enderror" id="link_github" name="link_github"
                value="{{ old('link_github') }}">

                @error('link_github')
                    {{ $message }}
                @enderror
        </div>
{{--
        <div class="mb-3">
            <label for="start">Sale date:</label>

            <input type="date" id="start" name="sale_date" value="{{ old('sale_date') }}" min="2023-01-01"
                max="2025-12-31">

                @error('sale_date')
                    {{ $message }}
                @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                value="{{ old('type') }}">

                @error('type')
                    {{ $message }}
                @enderror

        </div> --}}



        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
