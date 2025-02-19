@extends('books.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 mx-5 my-5">
            <div class="d-flex justify-content-start">
                <p>Edit Book</p>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('books.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <p>Looks like there's an error with your input.</p><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('books.update',$book->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Name</strong>
                    <input type="text" name="book_name" class="form-control" value="{{$book->book_name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Details</strong>
                    <textarea name="book_detail" id="" cols="30" rows="10" class="form-control">
                        {{$book->book_detail}}
                    </textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Category</strong>
                    <input type="text" name="book_category" class="form-control" value="{{$book->book_category}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Price</strong>
                    <input type="number" name="price" class="form-control" value="{{$book->price}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Published Date</strong>
                <input type="date" name="published_date" class="form-control" value="{{$book->published_date}}">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
