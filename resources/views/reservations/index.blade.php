@extends('admin.layouts.admin')

@section('title', __('reservations.index.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
        <a href="{{ route('reservations.create') }}" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-plus"></i>
            {{ __('reservations.index.create') }}
        </a>
    </div>

    <div class="card-block">

        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th> {{ __('reservations.index.table_header_0') }} </th>
                <th> {{ __('reservations.index.table_header_customer') }} </th>
                <th>{{ __('reservations.index.table_header_room') }}</th>
                <th> {{ __('reservations.index.table_header_date') }} </th>
                <th> {{ __('reservations.index.table_header_duration') }} </th>
                
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ title_case($reservation->customer->firstname." ".$reservation->customer->lastname) }}</td>
                    
                    <td>{{ $reservation->room->name }}</td>
                    <td>{{ $reservation->arrival_date }}</td>
                    <td>{{ $reservation->duration }} days</td>

                  
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('reservations.show', [$reservation->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('reservations.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('reservations.edit', [$reservation->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('reservations.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @can('delete', $reservation)
                        <form style="display: inline;" class="delete-form" data-element-type="reservation" data-element-name="" action="{{ route('reservations.destroy', [$reservation->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger"
                                    data-toggle="tooltip" data-placement="top" data-title="{{ __('reservations.index.delete') }}">
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
            {{-- {{ $reservations->links() }} --}}
        </div>

    </div>
</div>
@endsection