@extends('app')

<div id="wrapper">
    @include('components.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('components.header')
        <div class="container-fluid">
            this is a password_get_info
            @yield('content')
        </div>
    </div>
</div>