@extends('app')

@section('body')
<section id="wrapper">
    @include('components.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('components.header')
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</section>
@endsection