@extends('admin.layouts.admin')

@section('title', __('roles.create.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
    </div>

    <div class="card-block">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form action="{{ route('roles.store') }}" method="post" class='form-horizontal form-label-left'>
                {{ csrf_field() }}

                <div class="x_panel">

                    <div class="x_title">
                        <h2>{{ __('roles.create.role_details') }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">

                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                                {{ __('roles.create.name') }}
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="name" type="text" class="form-control @if($errors->has('name')) parsley-error @endif"
                                       name="name" value="{{  old('name') }}" required>
                                @if($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('name') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug" >
                                {{ __('roles.create.slug') }}
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="name" type="text" class="form-control @if($errors->has('slug')) parsley-error @endif"
                                       name="slug" value="{{  old('slug') }}" required>
                                {{-- @if($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('name') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                            </div>
                        </div>

                        <div class="col-sm-9 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pass">
                                {{ __('roles.create.description') }}
                            </label>
                            <div class="col-sm-10 col-xs-12">
                                <textarea id="description" class="form-control @if($errors->has('description')) parsley-error @endif"
                                    name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>


                        
                        </div>
                    </div>
                </div>
                


                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_title">
                            <h2>Permssions</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                                @foreach($permissions as $permission)
                                <div class="col-md-3 col-xs-12 form-group has-feedback">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" autocomplete="off" class="permissions-checkbox" name="permissions[]" value="{{ $permission }}" {{ (is_array(old('permissions')) && in_array($permission, old('permissions')))?'checked':'' }}> &nbsp;&nbsp;
                                        {{ __('roles.'.$permission) }} 
                                    </label>
                                </div>
                                @endforeach
                        </div>

                    </div> <!-- x_panel -->
                </div> <!-- col -->





                <div class="form-group">
                    <div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
                        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('roles.create.cancel') }}</a>
                        <button type="submit" class="btn btn-success"> {{ __('roles.create.save') }}</button>
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