<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Management</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/login">E-Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/login">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Events
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('event/create')}}">Create Event</a></li>
                            <li><a class="dropdown-item" href="{{url('event/show')}}">Show Event</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @if (Auth::check())
                <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome, {{Auth::user()->name}}
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{url('logout')}}">Logout</a></li>
                    </ul>
                </div>
            @endif

        </div>
    </nav>
</body>

</html>