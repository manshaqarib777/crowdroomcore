<div class="card_rave">
    <i class="icofont-ui-v-card bg"></i>
    <label>
        <span>{{__("Name on the Card")}}</span>
        <input id="bravo_rave_name" name="card_name" placeholder="{{__("Card Name")}}">
    </label>
    <label>
        <span>{{__("Card Number")}}</span>
        <div id="bravo_rave_number" name="card_number" class="input"></div>
        <i class="icofont-credit-card"></i>
    </label>
    <label class="item">
        <span>{{__("Expiration")}}</span>
        <div id="bravo_rave_card_expiry" name="exp_year" placeholder="{{__("dd")}}" min="1" max="99" class="input"></div>
        <div id="bravo_rave_card_expiry" name="exp_month" placeholder="{{__("YY")}}" min="1" max="99"  class="input"></div>
    </label>
    <label class="item">
        <span>{{__("CVC")}}</span>
        <div id="bravo_rave_card_cvc" name="secure_code" class="input"></div>
    </label>
</div>
