{{-- all-new-update --}}
@extends('Email::layout')
@section('content')

    <div class="b-container">
        <div class="b-panel">
            <h3 class="email-headline"><strong>{{__('New Space Request !')}}</strong></h3>
            <p>New Space Request</p>
            <!--<p>{{__('Here are new contact information:')}}</p>-->
            <br>
            <div class="b-panel">
                <div class="b-table-wrap">
                    <table class="b-table" cellspacing="0" cellpadding="0">
                        <tr class="info-first-name">
                            <td class="label">{{__('Name')}}</td>
                            <td class="val">{{$contact->user->name}}</td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label">{{__('Email')}}</td>
                            <td class="val">{{$contact->user->email}}</td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label">{{__('Phone No')}}</td>
                            <td class="val">{{$contact->user->phone}}</td>
                        </tr>
                        <br>
                        <tr class="info-first-name">
                            <td class="label">{{__('Need Date')}}</td>
                            <td class="val">{{$contact->event_date}}</td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label">{{__('Event')}}</td>
                            <td class="val">{{$contact->event_type}}</td>
                        </tr>
                       
                        <tr class="info-first-name">
                            <td class="label">{{__('Attendees')}}</td>
                            <td class="val">{{$contact->attendee_id}}</td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label">{{__('Space Type')}}</td>
                            <td class="val">{{$contact->space_type_id}}</td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label">{{__('Duration')}}</td>
                            <td class="val">{{$contact->duration_id}}</td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label">{{__('Budget')}}</td>
                            <td class="val">{{$contact->budget_id}}</td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label">{{__('Need Items')}}</td>
                            <td class="val">{{$contact->requirement_id}}</td>
                        </tr>
                        <tr class="info-first-name">
                            <td class="label">{{__('Location')}}</td>
                            <td class="val">{{$contact->location_id}}</td>
                        </tr>
                        
                         <tr class="info-first-name">
                            <td class="label">{{__('Message')}}</td>
                            <td class="val">{{$contact->message}}</td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
