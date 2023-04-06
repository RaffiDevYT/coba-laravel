@extends('dashboard.layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center my-3">
    <div class="col-lg-8">
      <h2>{{ $post->title }}</h2>

      <div class="">
        <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to all my posts</a>
        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span> Edit</a>
        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline"> {{-- Request methode pada form hanya bisa get dan post --}}
          @method('delete') {{-- Secara otomatis akan mengarah ke methode destroy pada resource dashboard controller --}}
          @csrf
          <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
            <span data-feather="x-circle" class="align-text-bottom"></span> Delete
          </button>
        </form>
      </div>

      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3" alt="...">
      <article class="my-3">
        {!! $post->body !!}
      </article>
    </div>
  </div>
</div>
@endsection