@extends('admin.layouts.admin')

@section('title', __('roles.index.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
    	<a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary pull-right">
    		<i class="fa fa-plus"></i>
    		{{ __('roles.index.create') }}
    	</a>
    </div>

    <div class="card-block">
    	
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th> {{ __('roles.index.table_header_0') }} </th>
                <th> {{ __('roles.index.table_header_1') }} </th>
                <th>{{ __('roles.index.table_header_2') }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                   
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('roles.show', [$role->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('roles.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('roles.edit', [$role->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('roles.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @can('delete', $role)
                        <form style="display: inline;" action="{{ route('roles.destroy', [$role->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger"
                                    data-toggle="tooltip" data-placement="top" data-title="{{ __('roles.index.delete') }}">
                                <i class="fa fa-trash"></i>
                             </button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{-- {{ $roles->links() }} --}}
        </div>

    </div>
</div>
@endsection
