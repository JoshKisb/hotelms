@extends('admin.layouts.admin')

@section('title', __('occupants.edit.title'))

@section('content')
<div class="card mein" id="page-contant">
	<div class="card-header page-title">
        <div class="title_left">
            <span class="h3">@yield('title')</span>
        </div>
    </div>

    <div class="card-block">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form action="{{ route('occupants.update', $occupant->id) }}" method="post" class='form-horizontal form-label-left'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="x_panel">

                    <div class="x_title">
                        <h2>{{ __('occupants.edit.occupant_details') }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">   


                         <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                                {{ __('occupants.edit.name') }}
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <select id="customer" class="form-control @if($errors->has('customer')) parsley-error @endif"
                                       name="customer" required>
                                    @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ ($occupant->customer->id == $customer->id) ? "selected":"" }}>{{ title_case($customer->firstname." ".$customer->lastname) }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('customer'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('customer') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room" >
                                {{ __('occupants.edit.room') }}
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <select id="name" class="form-control @if($errors->has('room')) parsley-error @endif"
                                       name="room" required>
                                    @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" {{ ($occupant->room->id == $room->id) ? "selected":"" }}>{{ $room->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('room'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('room') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date" >
                                {{ __('occupants.edit.date') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <div class='input-group date' id='reservationDate'>
                                    <input type='text' autocomplete="off" name="date" value="{{  $occupant->arrival_date }}" class="form-control" @if($errors->has('date')) parsley-error @endif" required />
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if($errors->has('date'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('date') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                    
                            </div>
                        </div>


                         <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="duration" >
                                {{ __('occupants.edit.duration') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="name" type="text" class="form-control @if($errors->has('duration')) parsley-error @endif"
                                       name="duration" value="{{  $occupant->duration }}" required>
                                @if($errors->has('duration'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('duration') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>                

                       
                        

                       

                        <div class="col-sm-9 col-xs-12 form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="notes">
                                {{ __('occupants.edit.notes') }}
                            </label>
                            <div class="col-sm-10 col-xs-12">
                                <textarea id="notes" class="form-control @if($errors->has('notes')) parsley-error @endif"
                                    name="notes">{{ $occupant->notes }}</textarea>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>

                
                <div class="x_panel">

                    <div class="x_title">
                        <h2>Payment Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <div class="row">
                         <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_method" >
                                {{ __('occupants.edit.payment_method') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <select id="payment_method" class="form-control @if($errors->has('payment_method')) parsley-error @endif"
                                       name="payment_method">
                                    <option value="cash">Cash</option>
                                </select> 
                                {{-- @if($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('name') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                            </div>
                        </div>    

                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount" >
                                {{ __('occupants.edit.amount') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="amount" type="text" class="form-control @if($errors->has('amount')) parsley-error @endif"
                                       name="amount" value="{{  $occupant->amount }}">
                                {{-- @if($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('name') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                            </div>
                        </div>  

                        <div class="clearfix"></div>

                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total" >
                                {{ __('occupants.edit.total') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="total" type="text" class="form-control @if($errors->has('total')) parsley-error @endif"
                                       name="total" value="{{  $occupant->total }}" disabled>
                                {{-- @if($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('name') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                            </div>
                        </div>  

                        <div class="col-sm-6 col-xs-12 form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="balance" >
                                {{ __('occupants.edit.balance') }}
                            </label>
                            <div class="col-sm-9 col-xs-12">
                                <input id="balance" type="text" class="form-control @if($errors->has('balance')) parsley-error @endif"
                                       name="balance" value="{{  $occupant->balance }}" disabled>
                                {{-- @if($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        @foreach($errors->get('name') as $error)
                                                <li class="parsley-required">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                            </div>
                        </div>  

                    </div>
                    </div>

                </div> <!-- x_panel -->
          
                




                <div class="form-group">
                    <div class="col-sm-4 col-xs-12 col-sm-offset-4 pull-right">
                        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('occupants.edit.cancel') }}</a>
                        <button type="submit" class="btn btn-success"> {{ __('occupants.edit.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/admin/css/users/edit.css') }}">
@endsection

@section('scripts')
    <script>
            
            $(function(){

                var now = new Date();
                now.setMinutes (now.getMinutes() + 30);
                now.setMinutes (0);

                $('#reservationDate input').datetimepicker({
                   formatDate:'Y/m/d',
                   minDate: 0,
                   defaultTime: now
                });

                $('#reservationDate span').click(function(){
                    $('#reservationDate input').datetimepicker('show'); //support hide,show and destroy command
                });


            })  
            

        </script>
@endsection