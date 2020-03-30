@extends('admin.layouts.admin')

@section('title', __('customers.index.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
        <a href="{{ route('customers.create') }}" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-plus"></i>
            {{ __('customers.index.create') }}
        </a>
    </div>

    <div class="card-block">

        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th> {{ __('customers.index.table_header_0') }} </th>
                <th> {{ __('customers.index.table_header_1') }} </th>
                <th>{{ __('customers.index.table_header_2') }}</th>
                <th>{{ __('customers.index.table_header_phone') }}</th>
                <th>{{ __('customers.index.table_header_address') }}</th>
                <th> {{ __('customers.index.table_header_6') }} </th>
              
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ ucfirst($customer->firstname). " " . ucfirst($customer->lastname) }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->created_at }}</td>
                  
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('customers.show', [$customer->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('customers.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('customers.edit', [$customer->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('customers.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @can('delete', $customer)
                        <form style="display: inline;" action="{{ route('customers.destroy', [$customer->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger"
                                    data-toggle="tooltip" data-placement="top" data-title="{{ __('customers.index.delete') }}">
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
            {{-- {{ $customers->links() }} --}}
        </div>

    </div>
</div>
@endsection