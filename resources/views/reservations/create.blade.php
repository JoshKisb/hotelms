@extends('admin.layouts.admin')

@section('title', __('reservations.create.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
	    <div class="title_left">
	        <span class="h3">@yield('title')</span>
	    </div>
	</div>

	<div class="card-block">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<form action="{{ route('reservations.store') }}" method="post" class='form-horizontal form-label-left'>
					{{ csrf_field() }}

					<div class="x_panel">

						<div class="x_title">
							<h2>{{ __('reservations.create.reservation_details') }}</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">   


								<div class="col-sm-6 col-xs-12 form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer" >
										{{ __('reservations.create.name') }}
										<span class="required">*</span>
									</label>
									<div class="col-sm-9 col-xs-12">
										<select id="customer" class="form-control @if($errors->has('customer')) parsley-error @endif"
											name="customer" required>
											<option value=""></option>
											@foreach($customers as $customer)
											<option value="{{ $customer->id }}" {{ old('customer') == $customer->id ? "selected" : "" }}>
												{{ title_case($customer->firstname." ".$customer->lastname) }}
											</option>
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
										{{ __('reservations.create.room') }}
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
										{{ __('reservations.create.date') }}
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
										{{-- <input id="name" type="text" class="form-control @if($errors->has('date')) parsley-error @endif"
											   name="date" value="{{  old('date') }}" required> --}}
									</div>
								</div>


								<div class="col-sm-6 col-xs-12 form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration" >
										{{ __('reservations.create.duration') }}
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
										{{ __('reservations.create.notes') }}
									</label>
									<div class="col-sm-10 col-xs-12">
										<textarea id="notes" class="form-control @if($errors->has('notes')) parsley-error @endif"
											name="notes">{{ old('notes') }}</textarea>
									</div>
								</div>

							
							</div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
							<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('reservations.create.cancel') }}</a>
							<button type="submit" class="btn btn-success"> {{ __('reservations.create.save') }}</button>
						</div>
					</div>
				</form>
			</div>

	</div>
</div>

@include('customers.create_modal')
@endsection


@section('scripts')
	@parent
	<script>
		
		$(function(){

			$('#reservationDate input').datetimepicker({
			   formatDate:'Y/m/d',
			   minDate: 0,
			   defaultTime: '12:00'
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