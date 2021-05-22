<div class="form-checkout" id="form-checkout" >
    <input type="hidden" name="code" value="{{$booking->code}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    @csrf()
    
    
    <!--<div class="card card-style2">-->
    <!--        <div class="content">-->
    <!--            <p class="font-600 color-highlight mb-n1">Enter Details</p>-->
    <!--            <h3>Basic Information</h3>-->
    <!--            <p>-->
    <!--                Almost done, Please Enter some basic information here to let us know who is asking.-->
    <!--            </p>-->
    <!--            <div class="input-style input-style-2">-->
    <!--                <span class="input-style-1-active color-highlight">{{__("First Name")}}</span>-->
    <!--                <input class="form-control" type="name" placeholder="Jane Louder">-->
    <!--            </div>-->
    <!--            <div class="input-style input-style-2">-->
    <!--                <span class="input-style-1-active color-highlight">Card Number</span>-->
    <!--                <input class="form-control" type="number" placeholder="1234 5678 9012 3456">-->
    <!--            </div>-->
                
                
                
                
                
    <!--        </div>-->
    <!--    </div>-->
    
    
    
    
    <div class="card card-style2">
        <div class="content">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label >{{__("First Name")}} <span class="required">*</span></label>
                    <input type="text" placeholder="{{__("First Name")}}" class="form-control" value="{{$user->first_name ?? ''}}" name="first_name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >{{__("Last Name")}} <span class="required">*</span></label>
                    <input type="text" placeholder="{{__("Last Name")}}" class="form-control" value="{{$user->last_name ?? ''}}" name="last_name">
                </div>
            </div>
            <div class="col-md-6 field-email">
                <div class="form-group">
                    <label >{{__("Email")}} <span class="required">*</span></label>
                    <input type="email" placeholder="{{__("email@domain.com")}}" class="form-control" value="{{$user->email ?? ''}}" name="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >{{__("Phone")}} <span class="required">*</span></label>
                    <input type="email" placeholder="{{__("Your Phone")}}" class="form-control" value="+86{{$user->phone ?? ''}}" name="phone">
                </div>
            </div>
            @guest
            <div class="col-md-6">
                <div class="form-group">
                    <label >{{__("Password")}} <span class="required">*</span></label>
                    <input type="password" placeholder="{{__("Your Password")}}" class="form-control" value="{{$user->password ?? ''}}" name="password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >{{__("Confirm Password")}} <span class="required">*</span></label>
                    <input type="password" placeholder="{{__("Your Confirm Password")}}" class="form-control" value="{{$user->password ?? ''}}" name="password_confirmation">
                </div>
            </div>
            @endguest
            <!--  <div class="col-md-6 field-address-line-1">
                <div class="form-group">
                    <label >{{__("Address line 1")}} </label>
                    <input type="text" placeholder="{{__("Address line 1")}}" class="form-control" value="{{$user->address ?? ''}}" name="address_line_1">
                </div>
            </div>
            <div class="col-md-6 field-address-line-2">
                <div class="form-group">
                    <label >{{__("Address line 2")}} </label>
                    <input type="text" placeholder="{{__("Address line 2")}}" class="form-control" value="{{$user->address2 ?? ''}}" name="address_line_2">
                </div>
            </div>
            <div class="col-md-6 field-city">
                <div class="form-group">
                    <label >{{__("City")}} </label>
                    <input type="text" class="form-control" value="{{$user->city ?? ''}}" name="city" placeholder="{{__("Your City")}}">
                </div>
            </div>
            <div class="col-md-6 field-state">
                <div class="form-group">
                    <label >{{__("State/Province/Region")}} </label>
                    <input type="text" class="form-control" value="{{$user->state ?? ''}}" name="state" placeholder="{{__("State/Province/Region")}}">
                </div>
            </div>
            <div class="col-md-6 field-zip-code">
                <div class="form-group">
                    <label >{{__("ZIP code/Postal code")}} </label>
                    <input type="text" class="form-control" value="{{$user->zip_code ?? ''}}" name="zip_code" placeholder="{{__("ZIP code/Postal code")}}">
                    old customer requiremnt : <textarea name="customer_notes" cols="30" rows="6" class="form-control" placeholder="{{__('Special Requirements')}}"></textarea>
                </div>
            </div>  -->

            <!--<div class="col-md-6 field-country">-->
            <!--    <div class="form-group">-->
            <!--        <label >{{__("Country")}}n> </label>-->
            <!--        <select name="country" class="form-control">-->
            <!--            <option value="">{{__('-- Select --')}}</option>-->
            <!--            @foreach(get_country_lists() as $id=>$name)-->
            <!--                <option @if(($user->country ?? '') == $id) selected @endif value="{{$id}}">{{$name}}</option>-->
            <!--            @endforeach-->
            <!--        </select>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-md-6">-->
            <!--    <label >{{__("Special Requirements")}} </label>-->
            <!--    <input type="text" class="form-control" placeholder="Who Referred You To Book?">-->
            <!--</div>-->
        </div>
    </div>

    @include ('Booking::frontend/booking/checkout-deposit')
    @include ($service->checkout_form_payment_file ?? 'Booking::frontend/booking/checkout-payment')

    @php
    $term_conditions = setting_item('booking_term_conditions');
    @endphp

    <div class="form-group" style="padding-top:45px">
        <label class="term-conditions-checkbox">
            <input type="checkbox" name="term_conditions"> {{__('I have read and accept the')}}  <a target="_blank" href="{{get_page_url($term_conditions)}}">{{__('terms and conditions')}}</a>
        </label>
    </div>
    @if(setting_item("booking_enable_recaptcha"))
        <div class="form-group">
            {{recaptcha_field('booking')}}
        </div>
    @endif
    <div class="html_before_actions"></div>

    <p class="alert-text mt10" v-show=" message.content" v-html="message.content" :class="{'danger':!message.type,'success':message.type}"></p>

    <div class="form-actions">
        <button class="btn btn-danger" @click="doCheckout">{{__('Submit')}}
            <i class="spinner-border color-highlight" v-show="onSubmit"></i>
        </button>
    </div>
</div>
