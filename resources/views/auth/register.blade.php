@extends('guests.layouts.base')

@section('contents')
    <form class="w-25 m-auto" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            required
            autofocus
            autocomplete="name"
            value={{ old('name') }}
        >
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            required
            autocomplete="username"
            :value={{ old('email') }}
        >
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required
            autofocus
            autocomplete="new-password"
        >
        </div>

        <!-- Password Confirm-->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input
            {{-- type="password_confirmation" --}}
            type="password"
            class="form-control"
            id="password_confirmation"
            name="password_confirmation"
            required
            autofocus
            autocomplete="new-password"
        >
        </div>

        <a href="{{ route('login') }}">Already Registered?</a>
        <button type="submit" class="btn btn-primary ms-4">Register</button>

    </form>
@endsection
