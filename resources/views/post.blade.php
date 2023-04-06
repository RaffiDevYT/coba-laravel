@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2>{{ $post->title }}</h2>
        <small>By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{$post->category->slug}}" class="text-decoration-none">{{ $post->category->name }}</a></small>
        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3" alt="...">
        <article class="my-3">
          {!! $post->body !!}
        </article>
        <a href="/posts" class="text-decoration-none pt-3 d-block mb-5">Back to blog</a>
      </div>
    </div>
  </div>

  {{-- <article>
    <h2>{{ $post->title }}</h2>
    <h5>By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{$post->category->slug}}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
    {!! $post->body !!}
  </article>
  <a href="/posts" class="text-decoration-none pt-3 d-block">Back to blog</a> --}}
@endsection