@extends('admin.layouts.admin')

@section('title', __('occupants.index.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>

        <a href="{{ route('occupants.create') }}" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-plus"></i>
            {{ __('occupants.index.create') }}
        </a>
        <a href="{{ route('invoices.index') }}" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-eye"></i>
            {{ __('occupants.index.view_invoices') }}
        </a>
    </div>

    <div class="card-block">

        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th> {{ __('occupants.index.table_header_0') }} </th>
                <th> {{ __('occupants.index.table_header_customer') }} </th>
                <th>{{ __('occupants.index.table_header_room') }}</th>
                <th> {{ __('occupants.index.table_header_date') }} </th>
                <th> {{ __('occupants.index.table_header_duration') }} </th>
                
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($occupants as $occupant)
                <tr>
                    <td>{{ $occupant->id }}</td>
                    <td>{{ title_case($occupant->customer->firstname." ".$occupant->customer->lastname) }}</td>
                    
                    <td>{{ $occupant->room->name }}</td>
                    <td>{{ $occupant->checkout_date }}</td>
                    <td>{{ $occupant->duration }} days</td>

                  
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('occupants.show', [$occupant->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('occupants.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('occupants.edit', [$occupant->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('occupants.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @can('delete', $occupant)
                        <form style="display: inline;" action="{{ route('occupants.destroy', [$occupant->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger"
                                    data-toggle="tooltip" data-placement="top" data-title="{{ __('occupants.index.delete') }}">
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
            {{-- {{ $occupants->links() }} --}}
        </div>
        
    </div>
</div>
@endsection