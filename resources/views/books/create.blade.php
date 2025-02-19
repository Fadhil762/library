@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 mx-5 my-5">
            <div class="d-flex justify-content-start">
                <p>Insert new book</p>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('books.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <p>Looks like there's an error with your input</p><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('books.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Name</strong>
                    <input type="text" name="book_name" class="form-control" placeholder="Enter book name">
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Details</strong>
                    <textarea name="book_detail" cols="30" rows="10" class="form-control" placeholder="Enter book details"></textarea>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Category</strong>
                    <input type="text" name="book_category" class="form-control" placeholder="Enter book category">
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book Price</strong>
                    <input type="number" name="price" class="form-control" placeholder="Enter book price">
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Published Date</strong>
                    <input type="date" name="published_date" class="form-control">
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
@endsection
