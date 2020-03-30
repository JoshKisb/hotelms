<div class="modal fade" id="createCustomerModal" data-dismissed="true" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 700px;" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="createCustomerModalLabel">Create Customer</h5>
			</div>
			<form id="createCustomer" action="{{ route('customers.store') }}" >
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
								{{ __('customers.create.fname') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="fname" type="text" class="form-control @if($errors->has('fname')) parsley-error @endif"
								name="firstname" value="{{  old('firstname') }}" required>

							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
								{{ __('customers.create.lname') }}
								<span class="required">*</span>
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="lname" type="text" class="form-control @if($errors->has('name')) parsley-error @endif"
								name="lastname" value="{{  old('lastname') }}" required>

							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
								{{ __('customers.create.phone') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="phone" type="text" class="form-control @if($errors->has('phone')) parsley-error @endif"
								name="phone" value="{{  old('phone') }}" required>

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

							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">
								{{ __('customers.create.dob') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="dob" type="text" class="form-control @if($errors->has('dob')) parsley-error @endif"
								name="dob" value="{{  old('dob') }}" >

							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">
								{{ __('customers.create.city') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="city" type="text" class="form-control @if($errors->has('city')) parsley-error @endif"
								name="city" value="{{  old('city') }}" >

							</div>
						</div>

						<div class="col-sm-6 col-xs-12 form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">
								{{ __('customers.create.address') }}
							</label>
							<div class="col-sm-9 col-xs-12">
								<input id="address" type="text" class="form-control @if($errors->has('address')) parsley-error @endif"
								name="address" value="{{  old('address') }}">

							</div>
						</div>

					</div> <!-- row -->
				</div>
				
				<div class="modal-footer">
					<div class="form-group">
					  <div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
					      <button type="submit" class="btn btn-success"> {{ __('customers.create.save') }}</button>
					  </div>
					</div>
				</div>

				</form>
			</div>	
		</div>
	</div>
</div>
