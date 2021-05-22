@extends('Email::layout')
@section('content')

    <div class="b-container">
        <div class="b-panel">
            @switch($to)
                @case ('admin')
                <h3 class="email-headline"><strong>{{__('New Booking Update')}}</strong></h3>
                <p>{{__('A booking status has been updated')}}</p>
                @break

                @case ('vendor')
                <h3 class="email-headline"><strong>{{__('Hello :name',['name'=>$booking->vendor->nameOrEmail ?? ''])}}</strong></h3>
                <p>{{__('A booking for your Service has been updated')}}</p>
                @break


                @case ('customer')
                <h3 class="email-headline"><strong>{{__('Hello :name',['name'=>$booking->first_name ?? ''])}}</strong></h3>
                <p>{{__('Thanks for booking with us. Your booking Status has been updated')}}</p>
                @break

            @endswitch

            @include($service->email_new_booking_file ?? '')
        </div>
    </div>
@endsection
