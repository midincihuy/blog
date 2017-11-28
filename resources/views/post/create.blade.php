{{-- @extends('layouts.app') --}}
@extends('adminlte::page')


@section('content')
  {{-- <div class="container"> --}}
    {{-- <div class="row"> --}}
      {{-- <div class="col-md-8 col-md-offset-2"> --}}
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1>Create Blog Post</h1>
          </div>
          <div class="panel-body">
            <form class="" action="/post" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="post_body" class="form-control" rows="8" cols="80"></textarea>
              </div>
              <input type="submit" class="btn btn-block btn-primary">
            </form>
          </div>
        </div>
      {{-- </div> --}}
    {{-- </div> --}}
  {{-- </div> --}}
@endsection

@section('js')
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'post_body' );
  </script>
@endsection
