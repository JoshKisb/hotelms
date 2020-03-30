@extends('admin.layouts.admin')

@section('title', __('payments.index.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
    </div>

    <div class="card-block">

        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th> {{ __('payments.index.table_header_0') }} </th>
                <th> {{ __('payments.index.table_header_customer') }} </th>
                <th>{{ __('payments.index.table_header_room') }}</th>
                <th> {{ __('payments.index.table_header_price') }} </th>
                <th> {{ __('payments.index.table_header_amount_paid') }} </th>
                <th> {{ __('payments.index.table_header_balance') }} </th>
                <th> {{ __('payments.index.table_header_status') }} </th>
                
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($occupants as $occupant)
                <tr>
                    <td>{{ $occupant->id }}</td>
                    <td>{{ title_case($occupant->customer->firstname." ".$occupant->customer->lastname) }}</td>
                    
                    <td>{{ $occupant->room->name }}</td>
                    <td>{{ number_format($occupant->room->room_type->price) }} Shs</td>
                    <td>{{ number_format($occupant->amount_paid) }} Shs</td>
                    <td>{{ number_format($occupant->room->room_type->price - $occupant->amount_paid) }} Shs</td>
                    <td>{{ $occupant->payment_status }}</td>

                  
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('occupants.show', [$occupant->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('payments.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        
                        
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