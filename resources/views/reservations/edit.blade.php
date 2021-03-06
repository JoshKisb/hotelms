@extends('admin.layouts.admin')

@section('title', __('reservations.edit.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
	    <div class="title_left">
	        <span class="h3">@yield('title')</span>
	    </div>
	</div>

	<div class="card-block">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<form action="{{ route('reservations.update', [$reservation->id]) }}" method="post" class='form-horizontal form-label-left'>
				{{ csrf_field() }}
				{{ method_field('PUT') }}


				<div class="x_panel">

					<div class="x_title">
						<h2>{{ __('reservations.edit.reservation_details') }}</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">   

						 <div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
								{{ __('reservations.edit.name') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<select id="customer" class="form-control @if($errors->has('customer')) parsley-error @endif"
									   name="customer" required>
									@foreach($customers as $customer)
									<option value="{{ $customer->id }}" {{ ($reservation->customer->id == $customer->id)?"selected":"" }}>{{ title_case($customer->firstname." ".$customer->lastname) }}</option>
									@endforeach
								</select>
								@if($errors->has('customer'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('customer') as $error)
												<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="room" >
								{{ __('reservations.edit.room') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<select id="name" class="form-control @if($errors->has('room')) parsley-error @endif"
									   name="room" required>
									@foreach($rooms as $room)
									<option value="{{ $room->id }}" {{ ($reservation->room->id == $room->id)?"selected":"" }}>{{ $room->name }}</option>
									@endforeach
								</select>
								@if($errors->has('room'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('room') as $error)
												<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>
						
						
						 <div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="date" >
								{{ __('reservations.edit.date') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<div class='input-group date' id='reservationDate'>
								    <input type='text' autocomplete="off" name="date" value="{{ $reservation->arrival_date }}" class="form-control" @if($errors->has('date')) parsley-error @endif" required />
								    <span class="input-group-addon">
								       <span class="glyphicon glyphicon-calendar"></span>
								    </span>
								</div>
								{{-- <input id="name" type="text" class="form-control @if($errors->has('date')) parsley-error @endif"
									   name="date" value="{{  old('date') }}" required> --}}
								@if($errors->has('date'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('date') as $error)
												<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>


						 <div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration" >
								{{ __('reservations.edit.duration') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="name" type="number" class="form-control @if($errors->has('duration')) parsley-error @endif"
									   name="duration" value="{{  $reservation->duration }}" required>
								@if($errors->has('duration'))
									<ul class="parsley-errors-list filled">
										@foreach($errors->get('duration') as $error)
												<li class="parsley-required">{{ $error }}</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>                

					   
						

					   

						<div class="col-sm-9 col-xs-12 form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="notes">
								{{ __('reservations.edit.notes') }}
							</label>
							<div class="col-sm-10 col-xs-12">
								<textarea id="notes" class="form-control @if($errors->has('notes')) parsley-error @endif"
									name="notes">{{ $reservation->notes }}</textarea>
							</div>
						</div>

						
						</div>
					</div>
				</div>       



				<div class="form-group">
					<div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
						<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('reservations.edit.cancel') }}</a>
						<button type="submit" class="btn btn-success"> {{ __('reservations.edit.save') }}</button>
					</div>
				</div>
			</form>
		</div>
		
	</div>
</div>
@endsection

@section('styles')
	@parent
	<link rel="stylesheet" href="{{ asset('assets/admin/css/users/edit.css') }}">
@endsection

@section('scripts')
	
	<script>
		$(function() {

			$('#reservationDate input').datetimepicker({
			   formatDate:'Y/m/d',
			});

			$('#reservationDate span').click(function(){
				$('#reservationDate input').datetimepicker('show'); //support hide,show and destroy command
			});

		})

	</script>
@endsection