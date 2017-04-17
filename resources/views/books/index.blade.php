@extends('layouts.master')

@section('title')
    {{ 'Bookstores::Home page' }}
@endsection

@section('carousel')
    @include('layouts.carousel')
@endsection

@section('content')

@foreach($books as $book)
  <div class="col-xs-12 col-sm-6 col-lg-4 book-container">

      <a href="{{ url('book', [$book->slug]) }}" >
          <img src="{{ isset($book->images[0]) ? $book->images[0]->name : '' }}" alt="Image" width="100%" height="500px">
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