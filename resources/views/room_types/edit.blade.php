@extends('admin.layouts.admin')

@section('title', __('room_types.edit.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
    </div>

    <div class="card-block">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form action="{{ route('room_types.update', [$roomType->id]) }}" method="post" class='form-horizontal form-label-left'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="x_panel">

                    <div class="x_title">
                        <h2>{{ __('room_types.edit.roomtype_details') }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">

                         <div class="col-sm-9 col-xs-12 form-group">
                            <label class="control-label col-md-2" for="name" >
                                {{ __('room_types.edit.name') }}
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-10 col-xs-12">
                                <input id="name" type="text" class="form-control @if($errors->has('name')) parsley-error @endif"
                                       name="name" value="{{  $roomType->name }}" required>
                                @if($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('name') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        
                        

                        <div class="col-sm-9 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pass">
                                {{ __('room_types.edit.description') }}
                            </label>
                            <div class="col-sm-10 col-xs-12">
                                <textarea id="description" class="form-control @if($errors->has('description')) parsley-error @endif"
                                    name="description">{{ $roomType->description }}</textarea>
                            </div>
                        </div>


                         <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price" >
                                {{ __('room_types.edit.price') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="name" type="text" class="form-control @if($errors->has('price')) parsley-error @endif"
                                       name="price" value="{{  $roomType->price }}" required>
                                @if($errors->has('price'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('price') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                         <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_count" >
                                {{ __('room_types.edit.room_count') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="name" type="number" min="0" class="form-control @if($errors->has('room_count')) parsley-error @endif"
                                       name="room_count" value="{{  $roomType->room_count }}" required>
                                {{-- @if($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('name') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
                        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('room_types.edit.cancel') }}</a>
                        <button type="submit" class="btn btn-success"> {{ __('room_types.edit.save') }}</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

{{-- @section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/admin/css/users/edit.css') }}">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('assets/admin/js/users/edit.js') }}" >
@endsection --}} 