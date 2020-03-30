@extends('admin.layouts.admin')

@section('title', __('settings.edit.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
		<div class="title_left">
			<span class="h3">@yield('title')</span>
		</div>
	</div>

	<div class="card-block">

	     <div class="col-md-12 col-sm-12 col-xs-12">
	          <form action="{{ route('settings.update') }}" method="post" class='form-horizontal form-label-left'>
	             {{ csrf_field() }}

	             <div class="col-md-12 col-xs-12">
	                 <div class="x_panel">

	                     <div class="x_title">
	                         <h2>{{ __('settings.edit.hotel_details') }}</h2>
	                         <div class="clearfix"></div>
	                     </div>
	                     <div class="x_content">
	             		<div class="row">	

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="hotel_name" >
							        {{ __('settings.edit.hotel_name') }}
							    </label>
							    <div class="col-md-8 col-md-8 col-sm-9 col-xs-12">
							        <input id="hotel_name" type="text" class="form-control @if($errors->has('hotel_name')) parsley-error @endif"
							               name="hotel_name" value="{{  $settings->hotel_name or '' }}">
							        {{-- @if($errors->has('name'))
							            <ul class="parsley-errors-list filled">
							                @foreach($errors->get('name') as $error)
							                        <li class="parsley-required">{{ $error }}</li>
							                @endforeach
							            </ul>
							        @endif --}}
							    </div>
							</div>

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="hotel_website" >
							        {{ __('settings.edit.hotel_website') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <input id="hotel_website" type="text" class="form-control @if($errors->has('hotel_website')) parsley-error @endif"
							               name="hotel_website" value="{{  $settings->hotel_website or '' }}">
							        {{-- @if($errors->has('name'))
							            <ul class="parsley-errors-list filled">
							                @foreach($errors->get('name') as $error)
							                        <li class="parsley-required">{{ $error }}</li>
							                @endforeach
							            </ul>
							        @endif --}}
							    </div>
							</div>

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="hotel_email" >
							        {{ __('settings.edit.hotel_email') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <input id="hotel_email" type="text" class="form-control @if($errors->has('hotel_email')) parsley-error @endif"
							               name="hotel_email" value="{{  $settings->hotel_email or '' }}">
							        {{-- @if($errors->has('name'))
							            <ul class="parsley-errors-list filled">
							                @foreach($errors->get('name') as $error)
							                        <li class="parsley-required">{{ $error }}</li>
							                @endforeach
							            </ul>
							        @endif --}}
							    </div>
							</div>

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="hotel_phone" >
							        {{ __('settings.edit.hotel_phone') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <input id="hotel_phone" type="text" class="form-control @if($errors->has('hotel_phone')) parsley-error @endif"
							               name="hotel_phone" value="{{  $settings->hotel_phone or '' }}">
							        {{-- @if($errors->has('name'))
							            <ul class="parsley-errors-list filled">
							                @foreach($errors->get('name') as $error)
							                        <li class="parsley-required">{{ $error }}</li>
							                @endforeach
							            </ul>
							        @endif --}}
							    </div>
							</div>

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="hotel_country" >
							        {{ __('settings.edit.hotel_country') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <input id="hotel_country" type="text" class="form-control @if($errors->has('hotel_country')) parsley-error @endif"
							               name="hotel_country" value="{{  $settings->hotel_country or '' }}">
							        {{-- @if($errors->has('name'))
							            <ul class="parsley-errors-list filled">
							                @foreach($errors->get('name') as $error)
							                        <li class="parsley-required">{{ $error }}</li>
							                @endforeach
							            </ul>
							        @endif --}}
							    </div>
							</div>

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="hotel_city" >
							        {{ __('settings.edit.hotel_city') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <input id="hotel_city" type="text" class="form-control @if($errors->has('hotel_city')) parsley-error @endif"
							               name="hotel_city" value="{{  $settings->hotel_city or '' }}">
							        {{-- @if($errors->has('name'))
							            <ul class="parsley-errors-list filled">
							                @foreach($errors->get('name') as $error)
							                        <li class="parsley-required">{{ $error }}</li>
							                @endforeach
							            </ul>
							        @endif --}}
							    </div>
							</div>

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="hotel_address" >
							        {{ __('settings.edit.hotel_address') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <input id="hotel_address" type="text" class="form-control @if($errors->has('hotel_address')) parsley-error @endif"
							               name="hotel_address" value="{{  $settings->hotel_address or '' }}">
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
	                 </div> <!-- x_panel -->


					<div class="x_panel">

	                     <div class="x_title">
	                         <h2>{{ __('settings.edit.app_details') }}</h2>
	                         <div class="clearfix"></div>
	                     </div>
	                     <div class="x_content">
	             		<div class="row">	

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="app_name" >
							        {{ __('settings.edit.app_name') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <input id="app_name" type="text" class="form-control @if($errors->has('app_name')) parsley-error @endif"
							               name="app_name" value="{{  $settings->app_name or '' }}">
							        {{-- @if($errors->has('name'))
							            <ul class="parsley-errors-list filled">
							                @foreach($errors->get('name') as $error)
							                        <li class="parsley-required">{{ $error }}</li>
							                @endforeach
							            </ul>
							        @endif --}}
							    </div>
							</div>

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="timezone" >
							        {{ __('settings.edit.timezone') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <input id="timezone" type="text" class="form-control @if($errors->has('timezone')) parsley-error @endif"
							               name="timezone" value="{{  $settings->timezone or '' }}">
							        {{-- @if($errors->has('name'))
							            <ul class="parsley-errors-list filled">
							                @foreach($errors->get('name') as $error)
							                        <li class="parsley-required">{{ $error }}</li>
							                @endforeach
							            </ul>
							        @endif --}}
							    </div>
							</div>

							<div class="col-sm-6 col-xs-12 form-group">
							    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="language" >
							        {{ __('settings.edit.language') }}
							        
							    </label>
							    <div class="col-md-8 col-sm-9 col-xs-12">
							        <select id="language" class="form-control @if($errors->has('language')) parsley-error @endif"
							               name="language">
							               <option value="eng" {{  (isset($settings->language) && $settings->language == "eng") ? "selected":"" }}>English</option>
							        </select>
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
	                 </div> <!-- x_panel -->

	             </div> <!-- col -->




				<br>
	             <div class="form-group">
	                 <div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
	                     <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('settings.edit.cancel') }}</a>
	                     <button type="submit" class="btn btn-success"> {{ __('settings.edit.save') }}</button>
	                 </div>
	             </div>
	         </form>
	         <br><br>
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