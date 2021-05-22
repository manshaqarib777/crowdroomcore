
    <div class="card card-style2" style="margin-top:50px;">
        <div class="content">
    <h4 class="form-section-title">{{__('Select Payment Method')}}</h4>
    <div class="gateways-table accordion" id="accordionExample">
        {{-- @php
            dd(config('app.show_offline_payment_for_'.$service->type.'_only'));
        @endphp --}}
        @foreach($gateways as $k=>$gateway)
            @if(config('app.show_offline_payment_for_'.$service->type.'_only') && $k=='offline_payment')
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <label class="" data-toggle="collapse" data-target="#gateway_{{$k}}" >
                                <input type="radio" name="payment_gateway" value="{{$k}}">
                                @if($logo = $gateway->getDisplayLogo())
                                    <img src="{{$logo}}" alt="{{$gateway->getDisplayName()}}">
                                @endif
                                {{$gateway->getDisplayName()}}
                            </label>
                        </h4>
                    </div>
                    <div id="gateway_{{$k}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="gateway_name">
                                {!! $gateway->getDisplayName() !!}
                            </div>
                            {!! $gateway->getDisplayHtml() !!}
                        </div>
                    </div>
                </div>
                @php
                    break;
                @endphp
            @else
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <label class="" data-toggle="collapse" data-target="#gateway_{{$k}}" >
                                <input type="radio" name="payment_gateway" value="{{$k}}">
                                @if($logo = $gateway->getDisplayLogo())
                                    <img src="{{$logo}}" alt="{{$gateway->getDisplayName()}}">
                                @endif
                                {{$gateway->getDisplayName()}}
                            </label>
                        </h4>
                    </div>
                    <div id="gateway_{{$k}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="gateway_name">
                                {!! $gateway->getDisplayName() !!}
                            </div>
                            {!! $gateway->getDisplayHtml() !!}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div> </div>
