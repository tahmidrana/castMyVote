@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        @yield('main_content')
    </div>
    <div class="col-md-4">
        @yield('right_sidebar')
    </div>
</div>

@endsection