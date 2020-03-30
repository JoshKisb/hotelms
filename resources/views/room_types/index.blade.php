@extends('admin.layouts.admin')

@section('title', __('room_types.index.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
        <a href="{{ route('room_types.create') }}" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-plus"></i>
            {{ __('room_types.index.create') }}
        </a>
    </div>

    <div class="card-block">

        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th> {{ __('room_types.index.table_header_0') }} </th>
                <th> {{ __('room_types.index.table_name') }} </th>
                <th>{{ __('room_types.index.table_description') }}</th>
                <th> {{ __('room_types.index.table_price') }} </th>
                <th> {{ __('room_types.index.table_count') }} </th>
                
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($room_types as $room_type)
                <tr>
                    <td>{{ $room_type->id }}</td>
                    <td>{{ $room_type->name }}</td>
                    
                    <td>{{ mb_strimwidth($room_type->description, 0, 16, "...") }}</td>
                    <td>{{ $room_type->price }}</td>
                    <td>{{ $room_type->room_count }}</td>

                  
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('room_types.show', [$room_type->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('room_types.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('room_types.edit', [$room_type->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('room_types.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @can('delete', $room_type)
                        <form style="display: inline;" action="{{ route('room_types.destroy', [$room_type->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger"
                                    data-toggle="tooltip" data-placement="top" data-title="{{ __('room_types.index.delete') }}">
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
            {{-- {{ $room_types->links() }} --}}
        </div>

    </div>
</div>
@endsection