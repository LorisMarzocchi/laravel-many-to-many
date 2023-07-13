@php $user = Auth::user(); @endphp


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('guests.home') }}">Boolpress</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item dropdown ms-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Projects
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.projects.index') }}">Project Index</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.projects.create') }}">Add Project</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.projects.trashed') }}">Trash</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Types
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.types.index') }}">Type Index</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.types.create') }}">Add New Project Type</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Technology
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.technologies.index') }}">Technology Index</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.technologies.create') }}">Add New Technology</a></li>
                    </ul>
                </li>
            </ul>



            <ul class=" menuRight navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ $user->name }}
                    </a>
                    <ul class="dropdown-menu me-5">
                        <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Edit profile</a></li>

                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button>Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
        </div>
    </div>
</nav>
