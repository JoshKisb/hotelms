@extends('admin.layouts.admin')

@section('title', __('rooms.edit.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
    </div>

    <div class="card-block">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form action="{{ route('rooms.update', [$room->id]) }}" method="post" class='form-horizontal form-label-left'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="x_panel">

                    <div class="x_title">
                        <h2>{{ __('rooms.edit.room_details') }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">

                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_type">
                                {{ __('rooms.edit.room_type') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <select id="room_type" name="room_type" class="form-control select2 @if($errors->has('room_type')) parsley-error @endif" autocomplete="off" required>
                                    @foreach($roomTypes as $roomType)
                                        <option value="{{ $roomType->id }}" {{ ($room->room_type->id == $roomType->id)?'selected':'' }}>{{ $roomType->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('room_type'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('room_type') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                                {{ __('rooms.edit.name') }}
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="name" type="text" class="form-control @if($errors->has('name')) parsley-error @endif"
                                       name="name" value="{{  $room->name }}" required>
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
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="notes">
                                {{ __('rooms.edit.notes') }}
                            </label>
                            <div class="col-sm-10 col-xs-12">
                                <textarea id="notes" class="form-control @if($errors->has('notes')) parsley-error @endif"
                                    name="notes">{{ $room->notes }}</textarea>
                            </div>
                        </div>


                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">
                                {{ __('rooms.edit.status') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <select id="status" name="status" class="form-control select2" autocomplete="off">
                                        <option value="free" {{ ($room->status == 'free')?'selected':'' }}>Free</option>
                                        <option value="occupied" {{ ($room->status == 'occupied')?'selected':'' }}>Occupied</option>
                                </select>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
                        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('rooms.edit.cancel') }}</a>
                        <button type="submit" class="btn btn-success"> {{ __('rooms.edit.save') }}</button>
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