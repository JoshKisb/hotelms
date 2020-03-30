@extends('admin.layouts.admin')

@section('title', __('customers.create.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
	    <div class="title_left">
	        <span class="h3">@yield('title')</span>
	    </div>
	</div>

	<div class="card-block">

		<div class="col-md-12 col-sm-12 col-xs-12">
			 <form action="{{ route('customers.store') }}" method="post" class='form-horizontal form-label-left'>
				{{ csrf_field() }}

				
				<div class="x_panel">

					<div class="x_title">
						<h2>{{ __('customers.create.customer_details') }}</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">   


						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
								{{ __('customers.create.fname') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="name" type="text" class="form-control @if($errors->has('firstname')) parsley-error @endif"
									   name="firstname" value="{{  old('firstname') }}" required>
								@if($errors->has('firstname'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('firstname') as $error)
												<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
								{{ __('customers.create.lname') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="name" type="text" class="form-control @if($errors->has('lastname')) parsley-error @endif"
									   name="lastname" value="{{  old('lastname') }}" required>
								@if($errors->has('lastname'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('lastname') as $error)
												<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>
						
						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
								{{ __('customers.create.phone') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="phone" type="text" class="form-control @if($errors->has('phone')) parsley-error @endif"
									   name="phone" value="{{  old('phone') }}" required>
								{{-- @if($errors->has('phone'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('phone') as $error)
											<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif --}}
							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
								{{ __('customers.create.email') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="email" type="email" class="form-control @if($errors->has('email')) parsley-error @endif"
									   name="email" value="{{  old('email') }}" required>
								{{-- @if($errors->has('email'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('email') as $error)
											<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif --}}
							</div>
						</div>

						 <div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">
								{{ __('customers.create.gender') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<select name="gender" id="gender" class="form-control">
									<option value=""></option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
								{{-- @if($errors->has('gender'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('gender') as $error)
											<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif --}}
							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">
								{{ __('customers.create.dob') }}
							</label>
							 <div class="col-sm-9 col-xs-12">
	                       <div class='input-group date' id="dob">
	                           <input type='text' autocomplete="off" name="dob" value="{{  old('dob') }}" class="form-control" @if($errors->has('dob')) parsley-error @endif" />
	                           <span class="input-group-addon">
	                              <span class="glyphicon glyphicon-calendar"></span>
	                           </span>
	                       </div>
	           
	                   </div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">
								{{ __('customers.create.city') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="city" type="text" class="form-control @if($errors->has('city')) parsley-error @endif"
									   name="city" value="{{  old('city') }}" >
								{{-- @if($errors->has('city'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('city') as $error)
											<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif --}}
							</div>
						</div>

						 <div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">
								{{ __('customers.create.address') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="address" type="text" class="form-control @if($errors->has('address')) parsley-error @endif"
									   name="address" value="{{  old('address') }}">
								{{-- @if($errors->has('address'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('address') as $error)
											<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif --}}
							</div>
						</div>

						</div> <!-- row -->
					</div> <!-- xcontent -->
				</div> <!-- xpanel -->                

			   


				<div class="form-group">
					<div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
						<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('customers.create.cancel') }}</a>
						<button type="submit" class="btn btn-success"> {{ __('customers.create.save') }}</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>
@endsection

@section('styles')
	@parent
	<link rel="stylesheet" href="{{ asset('assets/admin/css/customers/edit.css') }}">
@endsection

@section('scripts')
	@parent
	<script>
	            
        $(function(){

            $('#dob input').datetimepicker({
               format:'d M Y',
               defaultDate: '01 Jan 1990',
               timepicker: false,
            });

            $('#dob span').click(function(){
                $('#dob input').datetimepicker('show'); //support hide,show and destroy command
            });


        })  
        

    </script>
@endsection