@extends('books.layout')
@section('content')
    <h2>Login Form</h2>
    <form action="{{url('login')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"></label>
            <input type="password" name="password"  class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div>
        <p>No account yet? <a href="{{route('register')}}">Register Here</a></p>
    </div>
@endsection
