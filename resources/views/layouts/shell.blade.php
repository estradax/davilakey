@extends('layouts.master')

@section('master.content')
    @include('components.shell.top-nav')
    @include('components.shell.header')
    @include('components.shell.modal')
    @include('components.shell.cart-modal')

    @yield('shell.content')

    @include('components.shell.footer')
@endsection
