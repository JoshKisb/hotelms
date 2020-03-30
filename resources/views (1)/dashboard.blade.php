@extends('admin.layouts.admin')

@section('title', __('dashboard.title'))

@section('content')
<!-- page content -->
<!-- top tiles -->
<div class="clearfix"></div>
<div class="row top_tiles">
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-address-card-o"></i></div>
			<div class="count">{{ $count_occupants }}</div>
			<h3>Guests</h3>
			<p><span>{{ $count_checking_out }}</span> checking out today</p>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-building"></i></div>
			<div class="count">{{ $count_reservations }}</div>
			<h3>Reservations</h3>
			<p><span>{{ $count_checking_in }}</span> checking in today</p>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-bed"></i></div>
			<div class="count">{{ $count_free_rooms }}</div>
			<h3>Free Rooms</h3>
			&nbsp;
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-address-book-o"></i></div>
			<div class="count">{{ $count_customers }}</div>
			<h3>Customers</h3>
			&nbsp;
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Guests</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>{{ __('dashboard.table_header_room') }}</th>
								<th> {{ __('dashboard.table_header_customer') }} </th>
								<th> {{ __('dashboard.table_header_date') }} </th>
								<th> {{ __('dashboard.table_header_duration') }} </th>

								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($occupants as $occupant)
							<tr>
								<td>{{ $occupant->room->name }}</td>
								<td>{{ title_case($occupant->customer->firstname." ".$occupant->customer->lastname) }}</td>
								<td>{{ $occupant->checkout_date }}</td>
								<td>{{ $occupant->duration }} days</td>
								<td>
									@can('checkout', $occupant)
									<form style="display: inline;" action="{{ route('occupants.checkout', [$occupant->id]) }}" method="POST">
										{{ csrf_field() }}
										<button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-title="{{ __('dashboard.checkout') }}">
											{{ __('dashboard.checkout') }} 
										</button>
									</form>
									@endcan 
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div><!-- x-content -->
		</div><!-- x-panel -->
	</div><!-- col-md-12 -->
</div><!-- row -->



<div class="row">
	<div class="col-md-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Upcoming Reservations</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>{{ __('dashboard.table_header_room') }}</th>
							<th> {{ __('dashboard.table_header_customer') }} </th>
							<th> {{ __('dashboard.table_header_arrival') }} </th>
							<th> {{ __('dashboard.table_header_duration') }} </th>

							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($reservations as $reservation)
						<tr>
							<td>{{ $reservation->room->name }}</td>
							<td>{{ title_case($reservation->customer->firstname." ".$reservation->customer->lastname) }}</td>

							<td>{{ $reservation->arrival_date }}</td>
							<td>{{ $reservation->duration }} days</td>


							<td>
								<a class="btn btn-sm btn-primary" href="{{ route('reservations.show', [$reservation->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('dashboard.show') }}">
									{{ __('dashboard.checkin') }} 
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div><!-- x-content -->
		</div><!-- x-panel -->
	</div><!-- col-md-12 -->
</div><!-- row -->

@endsection

@section('scripts')
@parent
<script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>

<script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@endsection

@section('styles')
@parent

@endsection
