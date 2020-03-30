@extends('layouts.app')

@section('page')

    {{--Region Content--}}
    @yield('content')

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/auth/css/auth.css') }}">
@endsection
