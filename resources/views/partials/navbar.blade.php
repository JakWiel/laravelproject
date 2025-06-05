<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo.svg') }}" alt="logo">
        </a>
        <div class="ms-auto">
            @if (isset($userEmail))
                <span class="text-light me-2">{{ $userEmail }}</span>
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn-outline-light me-2">Sign in</a>
            @endif
        </div>
    </div>
</nav>