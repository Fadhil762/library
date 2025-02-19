<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Book Management System</title>
</head>
<body>
    <div class="container">
            @auth
                <div class="d-flex justify-content-between align-items-center py-3">
                    <div>
                        <span class="me-3">Welcome, {{Auth::user()->name}}</span>
                        <form action="{{route('logout')}}" method="post" style="display:inline-block">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
        @yield('content')
    </div>
</body>
</html>
