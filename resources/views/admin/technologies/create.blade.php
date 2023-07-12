@extends('admin.layouts.base')

@section('contents')
<h1 class="text-danger text-center mb-5">Create New Technologies:</h1>

    <form method="POST" action="{{ route('admin.technologies.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}">

            <div class="invalid-feedback">
                @error('name') {{ $message }} @enderror
            </div>
        </div>

        <button class="btn btn-primary">Crea</button>
    </form>
@endsection
