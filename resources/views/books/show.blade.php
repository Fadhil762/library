@extends('books.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 my-5 mx-5">
            <div class="d-flex justify-content-start">
                <p>Show Product</p>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{route('books.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book Name</strong>
                {{$book->book_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book Details</strong>
                {{$book->book_detail}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book Category</strong>
                {{$book->book_category}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book Price</strong>
                {{$book->price}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Published Date</strong>
                {{$book->published_date}}
            </div>
        </div>
    </div>
@endsection
