<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
 </head>

<body>
    @include('event/navbar')
    <div class="table-responsive my-3">
        @if (session('delete'))
            <div id="eventcreatemsg" class="alert alert-danger col-md-4">{{session('delete')}}</div>
        @endif
        @if (session('editsuccess'))
            <div id="eventcreatemsg" class="alert alert-info col-md-4">{{session('editsuccess')}}</div>
        @endif
        <form action="" method="GET" class="d-flex col-md-4 my-3">
            @csrf
            <input class="form-control me-2" type="search" name="search" value="{{$search}}"
                placeholder="Search Event Title or Location" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Event Title</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Venue</th>
                    <th scope="col">No.of Participants</th>
                    <th scope="col">Descripton</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item as $data)
                    <tr>
                        <td>{{ $data->id}}</td>
                        <td>{{ $data->event_title }}</td>
                        <td>{{ $data->start_date }}</td>
                        <td>{{ $data->end_date }}</td>
                        <td>{{ $data->venue }}</td>
                        <td>{{ $data->no_of_participants }}</td>
                        <td>{{ $data->description }}</td> 
                        <td>
                            <a href="{{url('event/' . $data->id . '/edit')}}" class="btn btn-outline-info">Edit</a>

                            <a href="{{url('event/' . $data->id . '/delete')}}"
                                onclick="return confirm('Are you sure want to delete?')"
                                class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $item->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => {
                const msgElement = document.getElementById('eventcreatemsg');
                if (msgElement) {
                    msgElement.style.display = 'none'; 
                }
            }, 3000);
        });
    </script>
</body>

</html>