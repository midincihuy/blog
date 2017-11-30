@extends('layouts.app')
{{-- @extends('adminlte::page') --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>

                <div class="panel-body">
                    <transition>
                      <router-view></router-view>
                    </transition>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
