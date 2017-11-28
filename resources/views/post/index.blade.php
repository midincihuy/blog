{{-- @extends('layouts.app') --}}
@extends('adminlte::page')


@section('content')
  {{-- <div class="container">
    <div class="row"> --}}
      {{-- <div class="col-md-8 col-md-offset-2"> --}}
        <div class="panel panel-default">
          <div class="panel-heading">
            My Blog
          </div>
          <div class="panel-body">
            @foreach ($posts as $post)
              <article class="">
                Post at <small>{{ $post->created_at }}</small>
                <h3><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h3>
                <div class="body">
                  {{ $post->body }}
                </div>
              </article>
              <hr>
            @endforeach
            {{ $posts->links() }}
          </div>
        </div>
      {{-- </div> --}}
    {{-- </div>
  </div> --}}
@endsection
