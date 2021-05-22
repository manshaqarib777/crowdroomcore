{{-- all-new-update --}}



<div class="page-content-event">
        
        <div class="card notch-clear rounded-0 gradient-dark mb-n5">
            <div class="card-body" style="margin-bottom:30px;">
                
                
                 
                
            </div>
        </div>
    </div>  
    
    
    
    <div class="single-slider owl-carousel owl-no-dots owl-has-controls mb-0" style="margin-top:-175px;">
            <div data-card-height="270" class="card mb-0 bg-7 shadow-l">
                <div class="card-bottom text-center mb-6" style="margin-top:-100px;">
                    <h2 class="color-white text-uppercase font-900 mb-0" style="margin-top:-100px;">Splendid Flexibility</h2>
                    <p class="under-heading color-white">Long Term & Short Term Home Rental.</p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </div>
            <div data-card-height="270" class="card mb-0 bg-5 shadow-l">
                <div class="card-bottom text-center mb-2" style="margin-top:-100px;">
                    <h2 class="color-white text-uppercase font-900 mb-0" style="margin-top:-100px;">Priority Service</h2>
                    <p class="under-heading color-white">Lets help you land your new home.</p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </div>
        </div> 
    
    
    <div class="card card-style-request mb-2" style="z-index:300;">
<div class="content">
<div class="d-flex">
    
<div class="bravo-contact-block">
    <div class="container-fluid">
        <div class="row section" style="padding: 0px 0 !important;margin-left: -30px;
    margin-right: -30px;">
            <div class="col-md-4 col-lg-4">
                <div role="form" class="form_wrapper" lang="en-US" dir="ltr">
                    <form method="post" action="{{ route("home_request.store") }}"  class="bravo-contact-block-form">
                        {{csrf_field()}}
                        <div style="display: none;">
                            <input type="hidden" name="g-recaptcha-response" value="">
                        </div>
                        
                        
                         
                 
               
             
                         @if(!Auth::id())
                        <div class="contact-form">
                            <div class="d-flex mb-3" style="margin-top:-15px;">
                                <!--<div class="align-self-center">-->
                                <!--<img src="images/home.jpeg" width="45" class="rounded-sm shadow-xl mr-2">-->
                                <!-- </div>-->


                        <div class="content" style="margin-left:-1px;">
                            
                            
                  <p class="font-600 color-highlight mb-n1">Hello There !</p>
                             @else 
                             
                             
                              <div class="contact-form">
                            <div class="d-flex mb-3" style="margin-top:-15px;">
                                <div class="align-self-center">
                                     @if($avatar_url = Auth::user()->getAvatarUrl())
                
                <!--<a href="#" style="margin-top:-10px"class="float-left  rounded-xl"><img src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}" class="rounded-xl"  height="32" width="32"></a>-->
                
                  
                     </div>
                     @else
                <span class="avatar-text">{{ucfirst( Auth::user()->getDisplayName()[0])}}</span>
                 @endif


                        <div class="content" style="margin-left:-1px;">
                                      
                        <p class="font-600 color-highlight mb-n1">{{__("Hi! :Name",['name'=>Auth::user()->getDisplayName()])}}</p>
                        
                              @endif  
                              
                              <h3>Find Your Home</h3>
                              <p class="font-600 color-highlight mb-n1" style="margin-top:-10px;color:#969696 !important;">Priority service（1对1咨询服务）</p>
                              
                            </div>
                            
                             @if(!Auth::id())


                                <div class="ml-auto align-self-center">
                                 <img src="/images/iconbulb.gif" width="40" class="">
                                </div>
                                
                                  @else 
                                  
                                  <div class="ml-auto align-self-center">
                                 <img src="{{$avatar_url}}" width="40" class="">
                                </div>
                              @endif    


                            </div>




                         <div class="divider" style="margin-top:-10px !important;"></div>
                            @include('admin.message')
                            <div class="contact-form">


                                <div class="input-style input-style-2 input-required">
                                 <span class="input-style-1-active color-highlight">Rental Location 城市</span>
                                  <em><i class="fa fa-angle-down"></i></em>
                                 <select class="form-control select" name="location_id" required>
                                     <option value="" >Select city</option>
                                     @foreach ($spaceLocations as $spaceLocation)
                                     <option value="{{ $spaceLocation->name }}" >{{ $spaceLocation->name }}</option>
                                     @endforeach
                                 </select>
                             </div>

                              <div class="input-style input-style-2 input-required">
                                   <span class="input-style-1-active color-highlight">How Many Bedrooms</span>
                                    <em><i class="fa fa-angle-down"></i></em>
                                 <select class="form-control select" name="bedroom_id" required>
                                     <option value="" >Select Bedrooms</option>
                                     @foreach ($spaceBedrooms as $spaceBedroom)
                                     <option value="{{ $spaceBedroom->name }}" >{{ $spaceBedroom->name }}</option>
                                     @endforeach
                                 </select>
                             </div>


                             <div class="input-style input-style-2 input-required">
                                 <span class="input-style-1-active color-highlight">Payment Term</span>
                                  <em><i class="fa fa-angle-down"></i></em>
                                 <select class="form-control select" name="rental_terms[]"  required>
                                     <option value="" disabled>Select Rental Terms</option>
                                     @foreach ($spaceRentalTerms as $spaceRentalTerm)
                                     <option value="{{ $spaceRentalTerm->name }}" >{{ $spaceRentalTerm->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             
                              <div class="input-style input-style-2">
                                 <span class="input-style-1-active color-highlight">Your Budget</span>
                                 <input type="text" placeholder=" {{ __('Budget based on chosen payment term above') }} " name="budget_id" required class="form-control">
                             </div>
                             
                             
                              <div class="input-style input-style-2 input-required">
                                 <span class="input-style-1-active color-highlight">Rental Duration</span>
                                  <em><i class="fa fa-angle-down"></i></em>
                                 <select class="form-control select" name="duration_id" required>
                                     <option value="" >Select Duration</option>
                                     @foreach ($spaceDurations as $spaceDuration)
                                     <option value="{{ $spaceDuration->name }}" >{{ $spaceDuration->name }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             

                             <div class="input-style input-style-2 input-required">
                                 <span class="input-style-1-active color-highlight">Preferred Area</span>
                                  <input type="text" placeholder=" {{ __('eg: Close to Capital Hospital') }} " name="message" class="form-control">
                                 
                             </div>



                             <div class="input-style input-style-2 input-required">
                                 <span class="input-style-1-active color-highlight">Landmark</span>
                                  <em><i class="fa fa-angle-down"></i></em>
                                 <select class="form-control select" name="preferred_area_id">
                                     <option value="" >Select Landmark</option>
                                     @foreach ($spacePreferredAreas as $spacePreferredArea)
                                     <option value="{{ $spacePreferredArea->name }}" >{{ $spacePreferredArea->name }}</option>
                                     @endforeach
                                 </select>
                             </div>


                             <!--<div class="input-style input-style-2 input-required">-->
                             <!--    <span class="input-style-1-active color-highlight">Your Budget</span>-->
                             <!--     <em><i class="fa fa-angle-down"></i></em>-->
                             <!--    <select class="form-control select" name="budget_id" required>-->
                             <!--        <option value="" >Select Budget</option>-->
                             <!--        @foreach ($spaceBudgets as $spaceBudget)-->
                             <!--        <option value="{{ $spaceBudget->name }}" >{{ $spaceBudget->name }}</option>-->
                             <!--        @endforeach-->
                             <!--    </select>-->
                             <!--</div>-->
                             
                             
                             
                             
                              <div class="input-style input-style-2 input-required">
                                  <span class="input-style-1-active color-highlight">Estimated Move-in Date</span>
                                   <em><i class="fa fa-angle-down"></i></em>
                                 <input type="date" placeholder="{{ __('Rent Start Date') }}" name="event_date" required class="form-control">
                             </div>
                             
                           


                            





                             <div class="input-style input-style-2 input-required">
                                 <span class="input-style-1-active color-highlight">Amenities</span>
                                  <em><i class="fa fa-angle-down"></i></em>
                                 <select class="form-control select" name="amenities[]" multiple="multiple" >
                                     <option value="" disabled>Select Amenities</option>
                                     @foreach ($spaceAmenities as $spaceAmenitie)
                                     <option value="{{ $spaceAmenitie->name }}" >{{ $spaceAmenitie->name }}</option>
                                     @endforeach
                                 </select>
                             </div>

                             <!--<div class="input-style input-style-2 input-required">-->
                             <!--    <span class="input-style-1-active color-highlight">Added Requirments</span>-->
                             <!--     <em><i class="fa fa-angle-down"></i></em>-->
                             <!--    <select class="form-control select" name="requirement[]" multiple="multiple" >-->
                             <!--        <option value="" disabled>Select Requirements</option>-->
                             <!--        @foreach ($spaceRequirements as $spaceRequirement)-->
                             <!--        <option value="{{ $spaceRequirement->name }}" >{{ $spaceRequirement->name }}</option>-->
                             <!--        @endforeach-->
                             <!--    </select>-->
                             <!--</div>-->

                             


                             {{-- <div class="form-group">
                                 <textarea name="event_type" cols="40" rows="10" class="form-control textarea" placeholder="{{ __('Event Type') }}"></textarea>
                             </div> --}}





                              <div class="content" style="margin-left:-1px;">
                                 <p class="font-600 color-highlight mb-n1">Enter Details</p>
                                 <h3>Contact Information</h3>
                             </div>




                             <div class="input-style input-style-2">
                                 <span class="input-style-1-active color-highlight">Name 名字</span>
                                 <input type="text" placeholder=" {{ __('Name') }} " name="name" value="{{auth()->user()->name ?? ''}}" class="form-control" {{auth()->check() ? '':''}}>
                             </div>
                             <div class="input-style input-style-2">
                                 <span class="input-style-1-active color-highlight">Email 邮件</span>
                                 <input type="text" placeholder="{{ __('Email') }}" name="email" value="{{auth()->user()->email ?? ''}}" class="form-control" {{auth()->check() ? '':''}}>
                             </div>


                             <div class="input-style input-style-2">
                                 <span class="input-style-1-active color-highlight">Phone/Wechat ID 电话/微信</span>
                                 <input type="text" placeholder="{{ __('your phone number or wechat ID') }}" name="phone" required class="form-control" value="{{auth()->user()->phone ?? ''}}" {{auth()->check() ? '':''}}>
                             </div>




                             @guest
                             <div class="row mb-0">
                                 <div class="col-6">
                                    <div class="input-style input-style-2">
                                     <span class="input-style-1-active color-highlight">Password</span>
                                     <input type="password" placeholder="{{__("Your Password")}}" class="form-control" name="password">
                                    </div>
                                 </div>

                                 <div class="col-6">
                                    <div class="input-style input-style-2">
                                     <span class="input-style-1-active color-highlight">Confirm Password</span>
                                     <input type="password" placeholder="{{__("Your Confirm Password")}}" class="form-control" name="password_confirmation">
                                    </div>
                                 </div>
                             </div>
                             @endguest


                             <h5 >{{ setting_item_with_lang("page_contact_sub_title") }}</h5>

                             <div class="form-group">
                                 {{recaptcha_field('contact')}}
                             </div>
                             <p>
                                 <button class="submit btn btn-primary " type="submit">
                                     {{ __('SUBMIT APARTMENT REQUEST') }}
                                     <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                 </button>
                             </p>
                         </div>
                        </div>
                        <div class="form-mess"></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>




<div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m menu-active app" data-menu-height="400"
    style="max-height:140px; z-index:500;" data-menu-effect="menu-parallax">
    <div>
        <img src="/images/appsIcon.png" class="rounded-sm" width="100" style="margin-left: 9px;
margin-top: 10px; border-radius:12px !important;">

        <div class="boxed-text-l" style="text-align:left; margin-top:-96px; margin-left:120px;">
            <h6 class="font-700 font-14 pb-2" style="margin-bottom:-6px;">24/7 Customer Support</h6>
            <h6 class="font-500 font-14 pb-2">Add us on Wechat : crowdroom1</h6>
            <a href="tel:15524059801" class="pwa-install mx-auto btn btn-m font-600 bg-highlight2">
                <i class="fa font-14 fa-phone color-phone" style="color: #f7f9f8 !important;"></i>Call</a>
            <a href="/space-request" class="pwa-install mx-auto btn btn-m font-600 bg-highlight2">Space Request</a>
            <!--<a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12">Maybe later</a>-->
        </div>
    </div>
</div>
