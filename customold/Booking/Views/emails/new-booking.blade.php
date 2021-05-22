@extends('Email::layout')
@section('content')

    <div class="b-container">
        <div class="b-panel">
            @switch($to)
                @case ('admin')
                    <h3 class="email-headline"><strong>{{__('New Booking - CrowRoom')}}</strong></h3>
                    <p>{{__('New booking has been made')}}</p>
                @break
                @case ('vendor')
                    <h3 class="email-headline"><strong>{{__('Hello :name',['name'=>$booking->vendor->nameOrEmail ?? ''])}}</strong></h3>
                    <p>{{__('Your service has a new booking')}}</p>
                @break

                @case ('customer')
                    <h3 class="email-headline"><strong>{{__('Hello :name',['name'=>$booking->first_name ?? ''])}}</strong></h3>
                    <p>{{__('Thanks for booking on CrowdRoom. See Details Below:')}}</p>
                @break

            @endswitch

            @include($service->email_new_booking_file ?? '')
        </div>
        @include('Booking::emails.parts.panel-customer')
    </div>
@endsection
