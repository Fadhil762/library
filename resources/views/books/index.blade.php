@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-5 my-5">
            <div class="d-flex justify-content-start">
                <p>Book Management System</p>
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary mx-3 my-3" href={{route('books.create')}}>Add new book</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Book Name</th>
            <th>Book Details</th>
            <th>Book Category</th>
            <th>Book Price</th>
            <th>Published Date</th>
            <th>Action</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$book->book_name}}</td>
            <td>{{$book->book_detail}}</td>
            <td>{{$book->book_category}}</td>
            <td>{{$book->price}}</td>
            <td>{{$book->published_date}}</td>
            <td>
                <form action="{{route('books.destroy', $book->id)}}" method="post">
                    <a href="{{route('books.show',$book->id)}}" class="btn btn-info">Show</a>
                    <a href="{{route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
