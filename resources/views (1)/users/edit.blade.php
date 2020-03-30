@extends('admin.layouts.admin')

@section('title', __('users.edit.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
		<div class="title_left">
			<span class="h3">@yield('title')</span>
		</div>
	</div>

	<div class="card-block">
		
		<div class="col-md-12 col-sm-12 col-xs-12">

			<div class="col-md-2 profile-img-edit">
				<img id="profilePic" src="{{ $user->avatarUrl() }}" alt="">
				<input type="file" id="uploadPicInput" name="avatar" style="display: none;" />
				<button type="button" class="btn btn-primary" id="uploadPicBtn" style="margin: 8px auto">
					<i class="fa fa-cloud-upload append-icon"></i>
					Change Photo
				</button>
			</div>

			
			<div class="col-md-10">

				<form action="{{ route('users.update', [$user->id]) }}" method="post" class='form-horizontal form-label-left'>
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<div class="x_panel">

						<div class="x_title">
							<h2>{{ __('users.edit.user_details') }}</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">

								<div class="col-sm-6 col-xs-12 form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
										{{ __('users.edit.fname') }}
										<span class="required">*</span>
									</label>
									<div class="col-sm-9 col-xs-12">
										<input id="name" type="text" class="form-control @if($errors->has('firstname')) parsley-error @endif"
											   name="firstname" value="{{  $user->firstname }}" required>
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
										{{ __('users.edit.lname') }}
										<span class="required">*</span>
									</label>
									<div class="col-sm-9 col-xs-12">
										<input id="name" type="text" class="form-control @if($errors->has('lastname')) parsley-error @endif"
											   name="lastname" value="{{  $user->lastname }}" required>
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
										{{ __('users.edit.phone') }}
									</label>
									<div class="col-sm-9 col-xs-12">
										<input id="phone" type="text" class="form-control @if($errors->has('phone')) parsley-error @endif"
											   name="phone" value="{{  $user->phone }}" required>
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
										{{ __('users.edit.email') }}
										<span class="required">*</span>
									</label>
									<div class="col-sm-9 col-xs-12">
										<input id="email" type="email" class="form-control @if($errors->has('email')) parsley-error @endif"
											   name="email" value="{{  $user->email }}" required>
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
										{{ __('users.edit.roles') }}
									</label>
									<div class="col-sm-9 col-xs-12">
										<select id="roles" name="role" class="form-control select2 @if($errors->has('role')) parsley-error @endif" autocomplete="off" required>
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

								{{-- <div class="col-sm-6 col-xs-12 form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pass">
										{{ __('users.edit.password') }}
									</label>
									<div class="col-sm-9 col-xs-12">
										<input id="pass" type="password" class="form-control @if($errors->has('password')) parsley-error @endif"
											name="password">
									</div>
								</div> --}}

							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
							<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('users.edit.cancel') }}</a>
							<button type="submit" class="btn btn-success"> {{ __('users.edit.save') }}</button>
						</div>
					</div>
				</form>

			</div>
		</div>

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

		$(function() {
			$('#uploadPicBtn').on('click', function() {
				$('#uploadPicInput').click();
			});

			$('#uploadPicInput').on('change', function() {
				var formData = new FormData();
				formData.append('_token', '{{ csrf_token() }}');
				formData.append('avatar', this.files[0]); 

				$.ajax({
				    url: '{{ route('users.avatar', [$user->id]) }}',
				    data: formData,
				    type: 'POST',
				    dataType: "json",
				    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				    processData: false, // NEEDED, DON'T OMIT THIS
				    success: function(data){
				    	
			            $('#profilePic').prop('src', data.avatarLink);
			        },
				});
			})
		})

	</script>

@endsection