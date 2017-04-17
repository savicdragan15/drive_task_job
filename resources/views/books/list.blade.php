@extends('layouts.master')

@section('title')
    {{ 'Bookstores::Home page' }}
@endsection

@section('content')
    {{-- Category breadcrumb --}}
    @if(isset($category))
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                <li class="active">Category: {{ $category->name }}</li>
            </ol>
        </div>
    @endif
    {{-- Category breadcrumb END --}}

    {{-- Author breadcrumb --}}
    @if(isset($author))
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                <li class="active">{{ $author->author_name }}</li>
            </ol>
        </div>
    @endif
    {{-- Author breadcrumb END --}}


    @foreach($books as $book)
        <div class="col-xs-12 col-sm-6 col-lg-4 book-container">

            <a href="{{ url('book', [$book->slug]) }}" >
                <img src="{{ isset($book->images[0]) ? $book->images[0]->name : '' }}" alt="Image" width="100%" height="500px" />
            </a>
            <a href="{{ url('book', [$book->slug]) }}">
                <h4>{{ $book->book_name }}</h4>
            </a>
            <a href="{{ url('author' ,isset($book->authors[0]) ?  $book->authors[0]->slug : '') }}">
                <p>Author: {{ isset($book->authors[0]) ? $book->authors[0]->author_name : '' }} </p>
            </a>
            <p class="card-text">{{ substr($book->descriptions, 0, 180) }} ...</p>
        </div>
    @endforeach
    <div class="col-lg-12 book-container">
        <div class="pagination"> {{ $books->links() }} </div>
    </div>
@endsection