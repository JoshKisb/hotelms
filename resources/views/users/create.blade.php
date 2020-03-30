@extends('admin.layouts.admin')

@section('title', __('users.create.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
		<div class="title_left">
			<span class="h3">@yield('title')</span>
		</div>
	</div>

	<div class="card-block">
		
		<form action="{{ route('users.store') }}" enctype="multipart/form-data" method="post" class='form-horizontal form-label-left'>
			{{ csrf_field() }}

				<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-2 profile-img-edit">
							<img id="profilePic" src="{{ asset('/images/img.jpg') }}" alt="">
							<input type="file" id="uploadPicInput" name="avatar" style="display: none;" />
							<button type="button" class="btn btn-primary" id="uploadPicBtn" style="margin: 8px auto">
								<i class="fa fa-cloud-upload append-icon"></i>
								Upload Photo
							</button>
						</div>

						
						<div class="col-md-10">
						<div class="x_panel">
						
							<div class="x_title">
								<h2>{{ __('users.create.user_details') }}</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
								
									

					
									<div class="col-sm-6 col-xs-12 form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
											{{ __('users.create.fname') }}
											<span class="required">*</span>
										</label>
										<div class="col-sm-9 col-xs-12">
											<input id="fname" type="text" class="form-control @if($errors->has('firstname')) parsley-error @endif"
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
											{{ __('users.create.lname') }}
											<span class="required">*</span>
										</label>
										<div class="col-sm-9 col-xs-12">
											<input id="lname" type="text" class="form-control @if($errors->has('lastname')) parsley-error @endif"
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
											{{ __('users.create.phone') }}
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
											{{ __('users.create.email') }}
											<span class="required">*</span>
										</label>
										<div class="col-sm-9 col-xs-12">
											<input id="email" type="email" class="form-control @if($errors->has('email')) parsley-error @endif"
												   name="email" value="{{  old('email') }}" required>
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
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="roles">
											{{ __('users.create.roles') }}
										</label>
										<div class="col-sm-9 col-xs-12">
											<select id="roles" name="role" class="form-control select2" autocomplete="off" required>
												@foreach($roles as $role)
													<option value="{{ $role->id }}">{{ $role->name }}</option>
												@endforeach
											</select>
											@if($errors->has('role'))
												<ul class="parsley-errors-list filled">
													@foreach($errors->get('role') as $error)
															<li class="parsley-required">{{ $error }}</li>
													@endforeach
												</ul>
											@endif
										</div>
									</div>

									<div class="col-sm-6 col-xs-12 form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pass">
											{{ __('users.create.password') }}
										</label>
										<div class="col-sm-9 col-xs-12">
											<input id="pass" type="password" class="form-control @if($errors->has('password')) parsley-error @endif"
												name="password" required>
											@if($errors->has('password'))
												<ul class="parsley-errors-list filled">
													@foreach($errors->get('password') as $error)
															<li class="parsley-required">{{ $error }}</li>
													@endforeach
												</ul>
											@endif
										</div>
									</div>

								</div>

								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
										<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('users.create.cancel') }}</a>
										<button type="submit" class="btn btn-success"> {{ __('users.create.save') }}</button>
									</div>
								</div>
							
							</div> <!-- x content -->

						</div> <!-- x panel -->

					</div>
				</div>
		</form>

	</div>
</div>
@endsection

@section('styles')
	@parent
	<link rel="stylesheet" href="{{ asset('assets/admin/css/users/edit.css') }}">
@endsection

@section('scripts')
	@parent
	<script>
		function loadPreview(element, input) {

		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $(element).attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
		}

		$(function() {
			$('#uploadPicBtn').on('click', function() {
				console.log("")
				$('#uploadPicInput').click();
			});

			$('#uploadPicInput').on('change', function() {
				loadPreview('#profilePic', this);
			})
		})

	</script>
@endsection