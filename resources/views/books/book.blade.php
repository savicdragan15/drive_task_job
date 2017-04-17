@extends('layouts.master')
@section('title')
   {{ 'Book:' }} {{ $book->book_name }}
@endsection
@section('content')
    <div class="col-lg-4">
        <img src="{{ isset($book->images[0]) ? $book->images[0]->name : '' }}" alt="Image" width="100%" >
    </div>
    <div class="col-lg-8">
        <h4><strong>{{ $book->book_name }}</strong></h4>
        <ol class="breadcrumb">
            <li>Author</li>
            <li class="active">
                <a href="{{ url('/author', [isset($book->authors[0]) ? $book->authors[0]->slug : '']) }}">
                    {{ isset($book->authors[0]) ? $book->authors[0]->author_name : '' }}
                </a>
            </li>
        </ol>
        <p>Nummber of page: <strong>{{ $book->number_of_page }}</strong></p>
        <p><strong>Description:</strong></p>
        <p>{{ $book->descriptions }}</p>
    </div>
@endsection