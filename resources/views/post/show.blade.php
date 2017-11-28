{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('content')
  {{-- <div class="container"> --}}
    {{-- <div class="row">
      <div class="col-md-8 col-md-offset-2"> --}}
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1>{{ $post->title }}</h1>
            <small><a href="#"> <h4> {{ $post->creator->name }}</h4> </a></small>
            <small>{{ $post->created_at->format("l, d F, Y h:iA") }}</small>
          </div>
          <div class="panel-body">
            <article class="">
              <div class="body">
                {!! $post->body !!}
              </div>
            </article>
          </div>
        </div>
      {{-- </div>
    </div> --}}

{{-- Comment section --}}
    {{-- <div class="row">
      <div class="col-md-8 col-md-offset-2"> --}}
        @foreach ($post->comment as $comment)
          <div class="panel panel-default">
            <div class="panel-heading">
              {{ $comment->creator->name }} Commented since
              {{ $comment->created_at->diffForHumans() }}
            </div>
            <div class="panel-body">
              <article class="">
                <div class="body">
                  {!! $comment->body !!}
                </div>
              </article>
            </div>
          </div>
        @endforeach
      {{-- </div>
    </div> --}}

{{-- Add Comment Form --}}
    @if (auth()->check())
      {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2"> --}}
          <form class="" action="{{ route('addcomment', $post->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <textarea name="body" id="post_comment_body" class="form-control" placeholder="Have something to say?" rows="8" cols="80"></textarea>
            </div>
            <button type="submit" class="btn btn-default" name="button">Post</button>
          </form>
        {{-- </div>
      </div> --}}
    @else
      <p class="text-center">Please <a href="{{ route('login') }}">Sign In</a>To Comment in post.</p>
    @endif

  {{-- </div> --}}
@endsection


@section('js')
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>

    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
      CKEDITOR.replace( 'post_comment_body', options );
  </script>
@endsection
