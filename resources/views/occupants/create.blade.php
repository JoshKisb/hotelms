@extends('admin.layouts.admin')

@section('title', __('occupants.create.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
	    <div class="title_left">
	        <span class="h3">@yield('title')</span>
	    </div>
	</div>

	<div class="card-block">

		<div class="col-md-12 col-sm-12 col-xs-12">
			<form action="{{ route('occupants.store') }}" method="post" class='form-horizontal form-label-left'>
				{{ csrf_field() }}
				
				<div class="x_panel">

					<div class="x_title">
						<h2>{{ __('occupants.create.occupant_details') }}</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">   

						 <div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
								{{ __('occupants.create.name') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<select id="customer" class="form-control @if($errors->has('customer')) parsley-error @endif"
									   name="customer" required>
									@foreach($customers as $customer)
									<option value="{{ $customer->id }}">{{ title_case($customer->firstname." ".$customer->lastname) }}</option>
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
								{{ __('occupants.create.room') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<select id="name" class="form-control @if($errors->has('room')) parsley-error @endif"
									   name="room" required>
									@foreach($rooms as $room)
									<option value="{{ $room->id }}">{{ $room->name }}</option>
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
								{{ __('occupants.create.date') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<div class='input-group date' id='reservationDate'>
								    <input type='text' autocomplete="off" name="date" value="{{  old('date') }}" class="form-control" @if($errors->has('date')) parsley-error @endif" required />
								    <span class="input-group-addon">
								       <span class="glyphicon glyphicon-calendar"></span>
								    </span>
								</div>
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
								{{ __('occupants.create.duration') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="name" type="number" min="1" class="form-control @if($errors->has('duration')) parsley-error @endif"
									   name="duration" value="{{  old('duration') }}" required>
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
								{{ __('occupants.create.notes') }}
							</label>
							<div class="col-sm-10 col-xs-12">
								<textarea id="notes" class="form-control @if($errors->has('notes')) parsley-error @endif"
									name="notes">{{ old('notes') }}</textarea>
							</div>
						</div>
						
						</div>
					</div>
				</div>

			 
					<div class="x_panel">

						<div class="x_title">
							<h2>Payment Details</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
						<div class="row">
							 <div class="col-sm-6 col-xs-12 form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_method" >
									{{ __('occupants.create.payment_method') }}
								</label>
								<div class="col-sm-9 col-xs-12">
									<select id="payment_method" class="form-control @if($errors->has('payment_method')) parsley-error @endif"
										   name="payment_method">
										<option value="cash">Cash</option>
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

							<div class="col-sm-6 col-xs-12 form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount" >
									{{ __('occupants.create.amount') }}
								</label>
								<div class="col-sm-9 col-xs-12">
									<input id="amount" type="text" class="form-control @if($errors->has('amount')) parsley-error @endif"
										   name="amount" value="{{  old('amount') }}" required>
									{{-- @if($errors->has('name'))
										<ul class="parsley-errors-list filled">
											@foreach($errors->get('name') as $error)
													<li class="parsley-required">{{ $error }}</li>
											@endforeach
										</ul>
									@endif --}}
								</div>
							</div>  

							<div class="clearfix"></div>

							<div class="col-sm-6 col-xs-12 form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="total" >
									{{ __('occupants.create.total') }}
								</label>
								<div class="col-sm-9 col-xs-12">
									<input id="total" type="text" class="form-control @if($errors->has('total')) parsley-error @endif"
										   name="total" value="{{  old('total') }}" disabled>
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="balance" >
									{{ __('occupants.create.balance') }}
								</label>
								<div class="col-sm-9 col-xs-12">
									<input id="balance" type="text" class="form-control @if($errors->has('balance')) parsley-error @endif"
										   name="balance" value="{{  old('balance') }}" disabled>
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
			 

				




				<div class="form-group">
					<div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
						<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('occupants.create.cancel') }}</a>
						<button type="submit" class="btn btn-success"> {{ __('occupants.create.save') }}</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>

@include('customers.create_modal');
@endsection

@section('styles')
	@parent
	<link rel="stylesheet" href="{{ asset('assets/admin/css/users/edit.css') }}">
@endsection

@section('scripts')
	<script>
			
			$(function(){

				var now = new Date();
				now.setMinutes (now.getMinutes() + 30);
				now.setMinutes (0);

				$('#reservationDate input').datetimepicker({
				   formatDate:'Y/m/d',
				   minDate: 0,
				   defaultTime: now
				});

				$('#reservationDate span').click(function(){
					$('#reservationDate input').datetimepicker('show'); //support hide,show and destroy command
				});

				var newCustomer = [];
				var newCustTID = -1;
				var modal = $('#createCustomerModal');

				$('#customer').select2({
					placeholder: "Select or Create customer",
					tags: true,
					createTag: function (params) {
						return {
							id: params.term,
							text: params.term,
							newOption: true
						}
					},
					templateResult: function (data) {
					    var $result = $("<span></span>");

					    $result.text(data.text);

					    if (data.newOption) {
					      $result.prepend("<em>Create: </em>");
					    }

					    return $result;
					  }
				}).on("select2:select", function(e) {
				    if(e.params.data.newOption){
				        // append the new option element prenamently:
				        //$(this).find('[value="'+e.params.data.id+'"]').replaceWith('<option selected value="'+e.params.data.id+'">'+e.params.data.text+'</option>');
				        // store the new tag:
				        
				        var $opt = $(this).find('[value="'+e.params.data.id+'"]');
				        newCustTID++;
				        newCustomer.push($opt);

				        var arr = e.params.data.text.split(' ');
				        var fname = arr.shift();
				        var lname = arr.join(' ');


				        modal.find('.modal-body input#fname').val(fname);
				        modal.find('.modal-body input#lname').val(lname);
				        modal.data("newCustTID", newCustTID);
				        modal.modal('show');
				    }
				});

				$('#createCustomer').submit(function(e){
					e.preventDefault();

					var form = $(this);
					var url = form.attr('action');

					$.ajax({
						type: "POST",
						url: url,
						dataType: "json",
					   data: form.serialize(), // serializes the form's elements.
					   success: function(data)
					   {
					      var tid = parseInt($('#createCustomerModal').data("newCustTID"));
					      var $opt = newCustomer[tid];
					      $opt.replaceWith('<option selected value="'+data.id+'">'+data.firstname+' '+ data.lastname+'</option>');
					      modal.data("dismissed", false);
					      modal.modal('hide');
					   }
					});

				})

				$(document).on('hidden.bs.modal', '#createCustomerModal', function () {
					
					var dismissed = modal.data("dismissed");
					if (dismissed) {
				   	var tid = parseInt($('#createCustomerModal').data("newCustTID"));
				   	var $opt = newCustomer[tid];
				   	$opt.remove();

				   	$('#customer').val('');
				   	$('#customer').trigger('change');
				   }

				   modal.data("dismissed", true);
				})

			})	
			

		</script>
@endsection