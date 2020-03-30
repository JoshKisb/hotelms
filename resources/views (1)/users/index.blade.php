@extends('admin.layouts.admin')

@section('title', __('users.index.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
		<div class="title_left">
			<span class="h3">@yield('title')</span>
		</div>
		<a href="{{ route('users.create') }}" class="btn btn-sm btn-primary pull-right">
			<i class="fa fa-plus"></i>
			{{ __('users.index.create') }}
		</a>
	</div>
	
	<div class="card-block">

		<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			<tr>
				<th> {{ __('users.index.table_header_0') }} </th>
				<th> {{ __('users.index.table_header_1') }} </th>
				<th>{{ __('users.index.table_header_2') }}</th>
			   
				<th> {{ __('users.index.table_header_4') }} </th>
				<th> {{ __('users.index.table_header_5') }} </th>
				<th> {{ __('users.index.table_header_6') }} </th>
			  
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ ucfirst($user->firstname). " " . ucfirst($user->lastname) }}</td>
					<td>{{ $user->role->name }}</td>
				   
					<td>
						@if(!$user->confirmed)
							<span class="label label-success">{{ __('users.index.confirmed') }}</span>
						@else
							<span class="label label-warning">{{ __('users.index.not_confirmed') }}</span>
						@endif</td>
					<td>{{ $user->created_at }}</td>
				  
					<td>
						<a class="btn btn-sm btn-primary" href="{{ route('users.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('users.index.show') }}">
							<i class="fa fa-eye"></i>
						</a>
						<a class="btn btn-sm btn-info" href="{{ route('users.edit', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('users.index.edit') }}">
							<i class="fa fa-pencil"></i>
						</a>
						@can('delete', $user)
						<form style="display: inline;" class="delete-form" data-element-type="user" data-element-name="{{ ucfirst($user->firstname). " " . ucfirst($user->lastname) }}" action="{{ route('users.destroy', [$user->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-sm btn-danger"
									data-toggle="tooltip" data-placement="top" data-title="{{ __('users.index.delete') }}">
								<i class="fa fa-trash"></i>
							 </button>
						@endcan
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<div class="pull-right">
			{{-- {{ $users->links() }} --}}
		</div>
	
		
	</div>
</div>
@endsection