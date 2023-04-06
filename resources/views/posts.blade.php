@extends('layouts.main')

@section('container')
  <h1 class="mb-3 text-center">{{ $title }}</h1>

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts" method="GET">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-success" type="submit">Button</button>
        </div>
      </form>
    </div>
  </div>

  @if ($posts->count())
  <div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
    <div class="card-body text-center">
      <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
      <small>By <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{$posts[0]->category->slug}}" class="text-decoration-none">{{ $posts[0]->category->name }}</a></small>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <small><a href="/posts/{{$posts[0]->slug}}" class="text-decoration-none">Read More...</a></small>
      <p class="card-text"><small class="text-body-secondary">{{ $posts[0]->created_at->diffForHumans() }}</small></p> {{-- diffForHumans adalah library carbon untuk mengatur waktu dan sudah ada di laravel --}}
    </div>
  </div>

  <div class="container">
    <div class="row">
      @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="position-absolute bg-dark px-3 py-2 bg-opacity-50"><a href="/categories/{{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
          <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <small>By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{$post->category->slug}}" class="text-decoration-none">{{ $post->category->name }}</a></small>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="/posts/{{$post->slug}}" class="text-decoration-none">Read More...</a>
            <p class="card-text"><small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- @foreach ($posts->skip(1) as $post)
    <article class="mb-5">
      <h2>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
      </h2>
      <h5>By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{$post->category->slug}}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
      <p>{{ $post->excerpt }}</p>
      <a href="/posts/{{$post->slug}}" class="text-decoration-none">Read More...</a>
    </article>
  @endforeach --}}

  @else
    <p class="text-center fs-4">No Post Found.</p>
  @endif

  <div class="d-flex justify-content-center">
    {{ $posts->links() }}
  </div>
@endsection