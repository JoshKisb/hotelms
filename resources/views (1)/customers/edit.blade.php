@extends('admin.layouts.admin')

@section('title', __('customers.edit.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
		<div class="title_left">
		  <span class="h3">@yield('title')</span>
		</div>
	</div>

	<div class="card-block">

		<div class="col-md-12 col-sm-12 col-xs-12">
			 <form action="{{ route('customers.update', [$customer->id]) }}" method="post" class='form-horizontal form-label-left'>
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				<div class="x_panel">

					<div class="x_title">
						<h2>{{ __('customers.edit.customer_details') }}</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">   

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
								{{ __('customers.edit.fname') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="name" type="text" class="form-control @if($errors->has('firstname')) parsley-error @endif"
									   name="firstname" value="{{  $customer->firstname }}" required>
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
								{{ __('customers.edit.lname') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="name" type="text" class="form-control @if($errors->has('lastname')) parsley-error @endif"
									   name="lastname" value="{{  $customer->lastname }}" required>
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
								{{ __('customers.edit.phone') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="phone" type="text" class="form-control @if($errors->has('phone')) parsley-error @endif"
									   name="phone" value="{{  $customer->phone }}" required>
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
								{{ __('customers.edit.email') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="email" type="email" class="form-control @if($errors->has('email')) parsley-error @endif"
									   name="email" value="{{  $customer->email }}" required>
								@if($errors->has('email'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('email') as $error)
											<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>

						 <div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">
								{{ __('customers.edit.gender') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<select name="gender" id="gender" class="form-control">
									<option value=""></option>
									<option value="male" {{ ($customer->gender == "male")?"selected":"" }}>Male</option>
									<option value="female" {{ ($customer->gender == "female")?"selected":"" }}>Female</option>
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
								{{ __('customers.edit.dob') }}
							</label>
							<div class="col-sm-9 col-xs-12">
	                     <div class='input-group date' id="dob">
	                        <input type='text' autocomplete="off" name="dob" value="{{  date('d M Y', strtotime($customer->dob)) }}" class="form-control" @if($errors->has('dob')) parsley-error @endif" />
	                        <span class="input-group-addon">
	                           <span class="glyphicon glyphicon-calendar"></span>
	                        </span>
	                     </div>
	           
	                  </div>
						</div>

						 <div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">
								{{ __('customers.edit.city') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="city" type="text" class="form-control @if($errors->has('city')) parsley-error @endif"
									   name="city" value="{{  $customer->city }}" >
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
								{{ __('customers.edit.address') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="address" type="text" class="form-control @if($errors->has('address')) parsley-error @endif"
									   name="address" value="{{  $customer->address }}">
								{{-- @if($errors->has('address'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('address') as $error)
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
						<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('customers.edit.cancel') }}</a>
						<button type="submit" class="btn btn-success"> {{ __('customers.edit.save') }}</button>
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