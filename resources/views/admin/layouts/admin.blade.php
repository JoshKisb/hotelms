@extends('layouts.app')

@section('body_class','nav-md')

@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('admin.sections.navigation')
                @include('admin.sections.header')
            @show

            <div class="right_col" role="main">
                
                <div class="container-fluid">
                    
                        @yield('content')                    
                
                </div>
                
            </div>
            <footer>
                @include('admin.sections.footer')
            </footer>

        </div>
    </div>
@endsection

@section('styles')
    
@endsection

@section('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
@endsection