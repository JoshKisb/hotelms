<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--Title and Meta--}}
        {{-- @meta --}}
        <title>@yield('title')</title>

        {{--Common App Styles--}}
        <!-- Bootstrap -->
        <link href="{{ asset("vendors/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
       <!-- iCheck -->
       {{--  <link href="{{ asset("vendors/iCheck/skins/flat/green.css") }}" rel="stylesheet"> --}}
        
        <!-- bootstrap-progressbar -->
        {{-- <link href="{{ asset("vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}" rel="stylesheet"> --}}
        <!-- bootstrap-daterangepicker -->
        <link href="{{ asset("/vendors/datetimepicker/build/jquery.datetimepicker.min.css") }}" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset("vendors/select2/dist/css/select2.css") }}">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/custom.css") }}" rel="stylesheet">

        {{--Styles--}}
    
        @yield('styles')

        {{--Head--}}
        @yield('head')

    </head>
    <body class="@yield('body_class')">

        {{--Page--}}
        @yield('page')
        
        @include('layouts.delete_modal')
        {{--Common Scripts--}}
        <!-- jQuery -->
        <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('vendors/select2/dist/js/select2.js') }}" ></script>
        
        <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('vendors/datetimepicker/build/jquery.datetimepicker.full.js') }}"></script>
        {{--Laravel Js Variables--}}
        {{-- @tojs --}}

        {{--Scripts--}}
        <script>
            $(function() {

                $('form.delete-form').on('submit', function(e){
                    e.preventDefault();
                    var form = this;
                    let $modal = $('#confirmDeleteModal');

                    let title = $(form).data('element-type');
                    let name = $(form).data('element-name');

                    if (title) {
                        let uctitle = title.charAt(0).toUpperCase() + title.substr(1)
                        $modal.find('h4.modal-title').text("Delete "+ uctitle );
                        if (name) {
                            $modal.find('#thisRecord').text(uctitle+": "+name);
                        }else {
                            $modal.find('#thisRecord').text("this "+title);
                        }
                    }

                    $modal.modal({ backdrop: 'static', keyboard: false })
                        .on('click', '#delete-btn', function(){
                            form.submit();
                    });
                });
            })
        </script>
        
        
        @yield('scripts')
    </body>
</html>
