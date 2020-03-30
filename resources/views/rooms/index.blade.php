@extends('admin.layouts.admin')

@section('title', __('rooms.index.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
        <a href="{{ route('rooms.create') }}" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-plus"></i>
            {{ __('rooms.index.create') }}
        </a>
    </div>

    <div class="card-block">

        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th> {{ __('rooms.index.table_header_0') }} </th>
                <th> {{ __('rooms.index.table_name') }} </th>
                <th> {{ __('rooms.index.table_roomtype') }} </th>
                <th> {{ __('rooms.index.table_status') }} </th>
                <th> {{ __('rooms.index.table_header_6') }} </th>
              
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->room_type->name }}</td>
                    <td>{{ ucfirst($room->status) }}</td>
                    <td>{{ $room->created_at }}</td>
                  
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('rooms.show', [$room->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('rooms.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('rooms.edit', [$room->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('rooms.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @can('delete', $room)
                        <form style="display: inline;" action="{{ route('rooms.destroy', [$room->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger"
                                    data-toggle="tooltip" data-placement="top" data-title="{{ __('rooms.index.delete') }}">
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
            {{-- {{ $rooms->links() }} --}}
        </div>

    </div>
</div>
@endsection