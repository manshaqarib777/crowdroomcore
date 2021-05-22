<?php
/**
 * @var $translation \Modules\Event\Models\EventTranslation
 * @var $row \Modules\Event\Models\Event
 */
?>



<div class="card card-style-single-detail mb-2">
<div class="content">
<div class="d-flex">
@if($row->banner_image_id)
<div>
<img src="{{$row->getBannerImageUrlAttribute('full')}}" class="rounded-sm" width="100" height="60">
</div>
@endif
<div class="pl-3 w-100">
<h5 class="font-501">{{$translation->title}}</h5>
<!--<h4 class="font-700" style="font-size:14px; color:#b12222;"> Ticket Price : {{ $row->display_price }} </h4>-->
<!--     @if($row->max_guests)-->

<!--            <p class="pipnum">-->
                <!--<i class="fa fa-group"></i>-->
                <!-- {{$translation->address}} -->

<!--                {{$row->max_guests}} People Max-->
                <!--  {{__(':count Guest in maximum',['count'=>$row->max_guests])}} -->
               
<!--                 @endif-->
</div>
<div class="align-self-center mr-n2">
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
</div>
</div>
</div>
</div>




<div class="g-header">
    <!--<div class="left">-->
    <!--    <h2>{{$translation->title}}</h2>-->


        <!-- ...@if($translation->address)
    <!--        <p class="address"><i class="fa fa-map-marker"></i>-->
    <!--            {{$translation->address}}-->
    <!--        </p>-->
    <!--    @endif  -->

    <!--</div>-->
    <div class="right">
        @if($row->getReviewEnable())
            @if($review_score)
            <div class="review-score">
                <div class="head">
                    <div class="left">
                        <span class="head-rating">{{$review_score['score_text']}}</span>
                        <span class="text-rating">{{__("from :number reviews",['number'=>$review_score['total_review']])}}</span>
                    </div>
                    <div class="score">
                        {{$review_score['score_total']}}<span>/5</span>
                    </div>
                </div>
                <div class="foot">
                    {{__(":number% of guests recommend",['number'=>$row->recommend_percent])}}
                </div>
            </div>
            @endif
            @endif
    </div>
</div>




@if(!empty($row->duration) or !empty($row->location->name))
    <div class="g-event-feature">
        <div class="row">


            <!-- ... <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-heart-beat"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("Wishlist")}}</h4>
                        <p class="value">
                            {{ __("People interest: :number",['number'=>$row->getNumberWishlistInService()]) }}
                        </p>
                    </div> </div>
            </div>
            -->

            <!--@if($row->start_time)-->
                <!--<div class="col-xs-6 col-lg-3 col-md-6 col-6">-->
                <!--    <div class="item">-->
                <!--        <div class="icon">-->
                <!--            <i class="icofont-wall-clock"></i>-->
                <!--        </div>-->
                        <!--<div class="info">-->
                        <!--    <h4 class="name">{{__("Start Time")}}</h4>-->
                        <!--    <p class="value">-->
            <!--                    {{ $row->start_time }}-->
                <!--            </p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            <!--    @endif-->



                <!--@if($row->duration)-->
                <!--    <div class="col-xs-6 col-lg-3 col-md-6 col-6">-->
                <!--        <div class="item">-->
                <!--            <div class="icon">-->
                <!--                <i class="icofont-infinite"></i>-->
                <!--            </div>-->
                <!--            <div class="info">-->
                <!--                <h4 class="name">{{__("Duration")}}</h4>-->
                <!--                <p class="value">-->
                <!--                    {{duration_format($row->duration,true)}}-->
                <!--                </p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    @endif-->


                    <br>
                   
                    
                    @if(!empty($row->location->name))
                        @php $location = $row->location->translateOrOrigin(app()->getLocale())
                        @endphp
                        <!--<div class="col-xs-6 col-lg-3 col-md-6">-->
                        <!--    <div class="item">-->
                        <!--        <div class="icon">-->
                        <!--            <i class="icofont-map"></i>-->
                        <!--        </div>-->
                        <!--        <div class="info">-->
                        <!--            <h4 class="name">{{__("Location")}}</h4>-->


                        <!--            @if($translation->address)-->
                        <!--                <p class="address">-->
                        <!--                    {{$location->name ?? ''}}-->
                        <!--                    {{$translation->address}}-->
                        <!--                </p>-->
                        <!--                @endif-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        @endif
        </div>
    </div>
    @endif





                

<div class="card card-style2">
            <div class="content">
                
                
              
                              
               
               
                
                
                <div class="d-flex mb-3">
                    <div>
                        <img src="/images/iconbulb.gif" width="40" class="">
                        
                        <!--<img src="{{$row->getBannerImageUrlAttribute('full')}}" width="110" class="rounded-s shadow-xl">-->
                        
                    </div>
                     @if($row->start_time)  @if($row->duration)
                    <div class="pl-3 w-100">
                       
                        <h5 class="font-500"> The {{$translation->title}} Event will start at   {{ $row->start_time }}  and will go on for {{duration_format($row->duration,true)}} before coming to an end </h5>
                       
                    </div>
                      @endif @endif
                </div>
                    
                
                    
                <div class="divider mt-4"></div>
                
                
                <div class="d-flex">
                    <div class="mt-1">
                        <p class="color-highlight font-600 mb-n1">Event Organizer</p>
                        <h1>{{ \App\User::findOrFail($row->create_user)->name }}
                                {{-- {{ __('hellodd hidddd') }} --}}
                                {{-- {{ $row->create_user }} --}}</h1>
                    </div>
                    <div class="ml-auto">
                        <img src="{{ \App\User::findOrFail($row->create_user)->getAvatarUrl() ? \App\User::findOrFail($row->create_user)->getAvatarUrl() : asset('qrCode/img/avatar.png') }}" width="60" class="rounded-xl">
                    </div>
                </div>
                
                <div class="row mb-0 mt-4"> 
                
                <div class="content" style="margin-top:-15px;">
                
                
                <img src="/images/fan.jpeg" class="rounded-xl"  width="30">
                <img src="/images/1small.png" class="rounded-xl"  width="30">
                <img src="/images/2s.png" class="rounded-xl"  width="30">
                <img src="/images/gam.jpeg" class="rounded-xl"  width="30">
                <img src="/images/4s.png" class="rounded-xl"  width="30">
                <img src="/images/fin.jpeg" class="rounded-xl"  width="30">
                <img src="/images/0t.jpg" class="rounded-xl"  width="30">
                    
            @if(!Auth::id())
   
                <!--<h5 class="color-white font-20 float-left"> Hello There ! </h5>-->
               
               
               @else    
                
                  @if($avatar_url = Auth::user()->getAvatarUrl())
                
                <a href="#"><img src="{{$avatar_url}}"class="rounded-xl"width="30" alt="{{ Auth::user()->getDisplayName()}}"></a>
                
                  @endif
                 
               
            @endif 
                
                
                <span class="pt-3 pl-2 font-700"><?php echo (rand(10, 70));?>+ <h11>viewed</h11></span>
            </div>
                
                
                



                
                
                 <h5 class="col-4 text-left font-15" >Copyright</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">2020 CrowdRoom Inc</h5>
                    
                    
                    
                        @if($row->start_time) 
                     <h5 class="col-4 text-left font-15" >Event Starts</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"> {{ $row->start_time }}</h5>
                    
                    @endif
                    
                     <h5 class="col-4 text-left font-15" > Location</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400"style="color:#840606;">{{$location->name ?? ''}} {{$translation->address}}</h5>
                    
                 <h5 class="col-4 text-left font-15" >Reservation</h5>
                     
                    <h5 class="col-8 text-right font-14 opacity-60 font-400">Event Ticket Booking</h5>
                    
               
                   
                     
                 

                </div>
                
                <!--<div class="divider"></div>-->
                
                <!--<div class="d-flex mb-3">-->
                <!--    <div>-->
                <!--        <img src="/images/iconbulb.gif" width="40" class="">-->
                        
                        <!--<img src="{{$row->getBannerImageUrlAttribute('full')}}" width="110" class="rounded-s shadow-xl">-->
                        
                <!--    </div>-->
                    
                <!--    <div class="pl-3 w-100">-->
                       
                <!--        <h5 class="font-500">About {{$translation->title}}</h5>-->
                        
                <!--    </div>-->
                    
                <!--</div>-->
                    
                
                    
                <div class="divider mt-4"></div>
               
                
                <div class="d-flex mb-3">
                    <div><h5 class="opacity-50 font-500"><?php echo $translation->content ?> </h5></div>
                    <div class="ml-auto"><h5> </h5></div>
                </div>
                <!--<div class="d-flex mb-3">-->
                <!--    <div><h5 class="opacity-50 font-500">Total Amount to Pay</h5></div>-->
                <!--    <div class="ml-auto"><h5></h5></div>-->
                <!--</div>-->
                <!--<div class="d-flex mb-3">-->
                <!--    <div><h3 class="font-700">Grand Total</h3></div>-->
                <!--    <div class="ml-auto"><h3> </h3></div>-->
                <!--</div>-->
                
                <div class="divider"></div>
                
                <a href="#qrCodePopUp" class="qr-code btn btn-full btn-l rounded-s font-600 gradient-highlight" target="" rel="modal:open">Click here to Generate QR Poster to share on wechat</a>
                
            </div>
        </div>   







    <style>
        .social-icons {
            margin-bottom: 13px;
            padding: 4px 1px;
            box-shadow: 0.5px 0.4px 20px 8px #c3b1b518;
            border-radius: 1px;
            margin-left: -10px;
            margin-right: -10px;

            display: flex;
        }

        .share-icons {
            display: flex;
        }

        .facebook-icon,
        .twitter-icon,
        .qr-code,
        .service-wishlist {
            padding: 0px 10px;
        }

        #wishlist {
            padding-left: 13px;

            display: block;
        }

        @media(max-width: 576px) {
            .social-icons {
                display: flex;
                font-size: 28px;
            }
        }
    </style>
    <div calss="row" style="margin: 0px 10px; border-radius: 2px ; background#fff;">

        <div class="social-icons ">
            <div class="social-share">
                <div class="share-icons">
                    <a class="facebook-icon" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
                        <i class="icofont-facebook-messenger"></i>
                    </a>
                    <!--<a class="twitter-icon" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                                        <i class="icofont-twitter"></i>
                                    </a> -->

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>




                    <a class="qr-code" href="#qrCodePopUp" target="" rel="modal:open" original-title="{{__("Wechat")}}">
                        <i class="icofont-qr-code"></i>
                    </a>

                </div>
            </div>
            <div>
                <div class="service-wishlist {{$row->isWishList()}}" id="wishlist" data-id="{{$row->id}}" data-type="{{$row->type}}">
                    <i class="icofont-archive"></i>
                </div>
            </div>

            <div class="btn-group">
                @if($row->video)
                    <a href="#" class="btn btn-transparent has-icon bravo-video-popup" data-toggle="modal" data-src="{{ str_ireplace("watch?v=","embed/",$row->video) }}" data-target="#myModal">
                        <i class="input-icon field-icon fa">
                            <svg height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;"
                                xml:space="preserve">
                                <g fill="#FFFFFF">
                                    <path d="M2.25,24C1.009,24,0,22.991,0,21.75V2.25C0,1.009,1.009,0,2.25,0h19.5C22.991,0,24,1.009,24,2.25v19.5
                                            c0,1.241-1.009,2.25-2.25,2.25H2.25z M2.25,1.5C1.836,1.5,1.5,1.836,1.5,2.25v19.5c0,0.414,0.336,0.75,0.75,0.75h19.5
                                            c0.414,0,0.75-0.336,0.75-0.75V2.25c0-0.414-0.336-0.75-0.75-0.75H2.25z">
                                    </path>
                                    <path d="M9.857,16.5c-0.173,0-0.345-0.028-0.511-0.084C8.94,16.281,8.61,15.994,8.419,15.61c-0.11-0.221-0.169-0.469-0.169-0.716
                                            V9.106C8.25,8.22,8.97,7.5,9.856,7.5c0.247,0,0.495,0.058,0.716,0.169l5.79,2.896c0.792,0.395,1.114,1.361,0.719,2.153
                                            c-0.154,0.309-0.41,0.565-0.719,0.719l-5.788,2.895C10.348,16.443,10.107,16.5,9.857,16.5z M9.856,9C9.798,9,9.75,9.047,9.75,9.106
                                            v5.788c0,0.016,0.004,0.033,0.011,0.047c0.013,0.027,0.034,0.044,0.061,0.054C9.834,14.998,9.845,15,9.856,15
                                            c0.016,0,0.032-0.004,0.047-0.011l5.788-2.895c0.02-0.01,0.038-0.027,0.047-0.047c0.026-0.052,0.005-0.115-0.047-0.141l-5.79-2.895
                                            C9.889,9.004,9.872,9,9.856,9z">
                                    </path>
                                </g>
                            </svg>
                        </i>{{__("Tour Video")}}
                    </a>
                    @endif
            </div>

        </div>
    </div>


    {{-- Qr code pop up --}}


    <link rel="stylesheet" href="{!! asset('qrCode') !!}/css/modal.css" />
    <link rel="stylesheet" href="{!! asset('qrCode') !!}/css/style.css" />

    <div class="qr-modal" id="qrCodePopUp">
        <div class="qr-big-container">

            <div class="qr-pop-card" id="qrImage">
                <div class="qr-header row">
                    <!--<div class="qr-logo col-5">
                            <img src="{!! asset('qrCode') !!}/img/logo.png" alt="" />
                        </div> -->

                    <div class="qr-header-text">
                        {{$translation->title}}
                    </div>
                </div>

                {{-- <img class="product-image" src="{!! asset('qrCode') !!}/img/pexels-tún-807840.jpg" alt="" /> --}}
                <img class="qr-product-image" src="{{$row->getBannerImageUrlAttribute('full')}}" alt="" />
                {{-- <img class="product-image" src="{{$row->getGallery()[0]['large']}}" alt="" /> --}}
                <div class="qr-product-details row">
                    <div class="qr-details col-7">
                        
                        
                        
                        
                        
    <div class="card card-style-eventqr mb-2">
<div class="content">
<div class="d-flex">
@if($row->banner_image_id)
<div>
<img src="{{$row->getBannerImageUrlAttribute('full')}}" class="rounded-sm" width="100">
</div>
@endif


<div class="pl-3 w-100">
<h5 class="font-501"style="font-size:16px;">{{$translation->title}}</h5>
<!--<h4 class="font-700" style="font-size:14px; color:#b12222;">-->
    
            <i class="fa fa-credit-card"></i>
            {{ $row->display_price }} /Person
            
            <span class="qr-box" style="text-decoration: line-through;color: #c03!important;">¥{{ explode('.',$row->price)[0] }}</span>
                
            </p>
            @if ($row->start_time)

                                <span class="qr-time" style="font-size:10px;">
                                    <i class="fa fa-clock-o"></i>
                                    {{ $row->start_time }}
                                    
                                    
                                    @if(!empty($row->location->name))
                                        <i class="fa fa-map-marker"></i>

                                        @php $location = $row->location->translateOrOrigin(app()->getLocale())
                                        @endphp


                                        {{ $location->name }} 
                                        @endif
                                </span>
                                @endif
            
            
            
            
         </h4>
   
</div>
<div class="align-self-center mr-n2">
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-info-circle font-18 color-blue-dark opacity-20"></i></a>-->
<!--<a data-menu="menu-cart" href="#"><i class="fa icon-30 text-right fa-times-circle mt-2 font-18 color-red-dark opacity-20"></i></a>-->
</div>
</div>
</div>
</div> 



                        
                        
                        
                       <div class="card card-style-tourqr2 mb-2">
            <div class="content">
                
                
                
                
               <div class="d-flex mb-2">
                    <!--<div>-->
                    <!--    <img src="/images/iconbulb.gif" width="40" class="">-->
                        
                        <!--<img src="{{$row->getBannerImageUrlAttribute('full')}}" width="110" class="rounded-s shadow-xl">-->
                        
                    <!--</div>-->
                    
                    <div class="pl-3 w-100">
                        @if(!empty($row->location->name))
                            @php $location = $row->location->translateOrOrigin(app()->getLocale())
                            @endphp
                            
                            
                      
                    
                    
                    
                    @if(!empty($row->duration) or !empty($row->category_tour->name) or !empty($row->max_people) or !empty($row->location->name))
                    
                    
                        
                 <h5 class="font-500" style="margin-bottom:-33px; margin-left:-9px; font-size:12px; font-weight:600; line-height:1.3; margin-top: -12px; padding-bottom:3px; text-align:center;">
                           This Event will begin at {{ $row->start_time }} and will go on for {{duration_format($row->duration,true)}} {{$cat->name ?? ''}}. Taking Place in {{$location->name ?? ''}}. Ticket Details :
                           
                            @foreach ($row->ticket_types as $type)
                            
                                <p> {{ $type['name'] }} = ¥{{ $type['price'] }} / Person </p>
                          
                            @endforeach
                           
                             </h5>
                       
           
                        
                        
                    </div>
                    
                </div>
                
                
                <div class="d-flex mb-3">
                   
                   
         
                        @endif
                        @endif
                   
                    
                    
                    
                    <div class="pl-3 w-100">
                  
                     
                    </div>
                    
                </div> 
                
     
                 
        
            </div>
        </div>  
    
     
                <div class="">
                          
                             @if($translation->content)  
                    
                
                            <div class="qr-imp-infor">
                                <?php echo $translation->content ?>
                                
                               <p> Location :
                            {{$location->name ?? ''}} {{$translation->address}} </p>
                            </div>
                        @endif
                        
                      

                        </div>          
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                        <!--<div class="qr-imp-infor">-->
                        <!--    @foreach ($row->ticket_types as $type)-->
                        <!--    <div class="qr-imp-infor">-->
                        <!--        {{ $type['name'] }} = ¥{{ $type['price'] }}-->
                        <!--    </div>-->
                        <!--    @endforeach-->
                        <!--</div>-->
                        <div class="qr-seller">
                            <img src="{{ \App\User::findOrFail($row->create_user)->getAvatarUrl() ? \App\User::findOrFail($row->create_user)->getAvatarUrl() : asset('qrCode/img/avatar.png') }}" alt="" class="qr-avatar" />
                            <!--<span class="qr-seller-name">-->
                            <!--    {{ \App\User::findOrFail($row->create_user)->name }}-->
                            <!--    {{-- {{ __('hellodd hidddd') }} --}}-->
                            <!--    {{-- {{ $row->create_user }} --}}-->
                            <!--</span>-->
                        </div>



                    </div>
                    <div class="qr-code-img text-center col-5" style="margin-top:76px; margin-bottom:-5px;">
                        {{-- <img src="{!! asset('qrCode') !!}/img/qr-generator.png" alt="" /> --}}
                        <div class="">

                            <img src="data:image/<IMAGE_TYPE>;base64,{!! base64_encode(QrCode::format('png')->size(123)->generate(url()->current())); !!}">
                        </div>

                        <br>
                        <div class="qr-text">Long Press To Book A Ticket To This Event
                        
                        
                        
                                <!-- <span class="qr-text">-->
                                <!--    A {{duration_format($row->duration,true)}} Event -->

                                <!--</span>-->

                                
                                </div>
                    </div>
                </div>
            </div>
            <!--   <div class="button-div col-12 text-center">
                <a type="button" class="btn qr-btn-secondary" rel="modal:close" onclick="downloadQr(`{{ $row->slug }}`);">
                    Save to your phone
                </a>
            </div>-->
          

        </div>
    </div>





    <form action="/download/qrCode" method="post" id="downloadQrForm">
        @csrf
        <input type="hidden" name="url" value="{{ url()->current() }}">
        <input type="hidden" name="slug" value="{{ $row->slug }}">
    </form>

    <script type="text/javascript" src="{!! asset('qrCode/js') !!}/html2canvas_withCustomScale.js"></script>
    {{-- <script type="text/javascript" src="{!! asset('qrCode/js') !!}/html2canvas.min.js"></script> --}}


    <script type="text/javascript">
        function downloadQr(slug) {
            // $("#downloadQrForm").submit()

            // html2canvas(document.getElementById('qrCodePopUp'), {
            //     dpi: 2
            // }).then(function(canvas) {
            //     // to view the generated image on the same page
            //     document.body.appendChild(canvas);
            //
            //
            //     const a = document.createElement("a")
            //     document.body.appendChild(a)
            //
            //     a.href = canvas.toDataURL()
            //     a.download = slug + '.png'
            //     a.click()
            //     document.body.removeChild(a)
            //     // // to save the image as png file
            //     // Canvas2Image.saveAsPNG(canvas);
            //
            //     // Get base64URL
            //     // canvas.toDataURL('image/jpeg').replace('image/jpeg', 'image/octet-stream');
            // });

            html2canvas(document.getElementById('qrImage'), {
                dpi: 192,
                onrendered: function(canvas) {
                    document.body.appendChild(canvas);


                    const a = document.createElement("a")
                    document.body.appendChild(a)

                    a.href = canvas.toDataURL()
                    a.download = slug + '.png'
                    a.click()
                    document.body.removeChild(a)
                }
            });

        }
    </script>




  @if($translation->faqs)
<div class="g-rules">
    
    <div class="description">
          
            <div class="imp-infor">
                <div class="row">
                <div class="col-lg-4">
                    <div class="key">{{__("Hotel Policy")}}</div>
                </div>
                <div class="col-lg-8">
                    @foreach($translation->faqs as $key=> $item)
                    <div class="item @if($key > 1) d-none @endif">
                            <div class="strong" style="font-weight:800;">{{$item['title']}}</div>
                            <div class="context" style="font-weight:500;">{!! $item['content'] !!}</div>
                        </div>
                    @endforeach
                    @if( count($translation->faqs) > 2)
                        <div class="btn-show-all">
                            <span class="text">{{__("Show All")}}</span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    @endif
                </div>
            </div>
        
                    
        </div> </div> </div>@endif 







    <!--@if($translation->content)-->
    <!--    <div class="g-overview">-->
           <!--<h3>{{__("Description")}}</h3> --> 
    <!--        <div class="description">-->
    <!--            <?php echo $translation->content ?>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    @endif-->



       <!--<div class="infor-message">-->
       <!-- Need Help? Chat with Us - <a href="https://tawk.to/chat/5f7289cb4704467e89f30e10/default">Live Chat Here</a>-->
       <!-- </div>-->




        <link rel="stylesheet" href="{!! asset('vshowbox-master') !!}/dist/vshowbox.css">

        <style media="screen">
            .gallery {
                display: none;
            }

            #vShowBox {
                display: none;
            }

            .image {
                padding: 10px 0;
            }

            .bravo-more-book-mobile {
                display: none;
            }

            @media(max-width: 576px) {
                #gallery-hide-when-mobo {
                    display: none !important;
                }

                .gallery {
                    display: block;
                }

                #vShowBox {
                    display: block;
                }

            }
        </style>

        @if($row->getGallery())
            <div class="g-gallery" id="gallery-hide-when-mobo">
                <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
                    @foreach($row->getGallery() as $key=>$item)
                        <a href="{{$item['large']}}" data-thumb="{{$item['thumb']}}"></a>
                        @endforeach
                </div>
                <div class="social">
                    <div class="social-share">
                        <span class="social-icon">
                            <i class="icofont-share"></i>
                        </span>
                        <ul class="share-wrapper">
                            <li>
                                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
                                    <i class="fa fa-facebook fa-lg"></i>
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                                    <i class="fa fa-twitter fa-lg"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                        <i class="fa fa-heart-o"></i>
                    </div>
                </div>
            </div>
            @endif









            @if($row->getGallery())



                <div id="vShowBox"></div>



                <script src="{!! asset('vshowbox-master') !!}/dist/vshowbox.js"></script>
                <script>
                    const gallery = JSON.parse(`{!! json_encode($row->getGallery())!!}`);
                    var slide_images = [];
                    for (const val of gallery) {
                        if (val.large) {

                            slide_images.push({
                                caption: '',
                                content: val.large
                            })
                        }
                    }
                    const vshowbox = vShowBox({

                        container: document.querySelector('#vShowBox'),
                        slides: slide_images

                    });
                </script>



                @endif







                {{--
        @if($row->getGallery())
            <div class="g-gallery">
                <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
                    @foreach($row->getGallery() as $key=>$item)
                        <a href="{{$item['large']}}" data-thumb="{{$item['thumb']}}"></a>
                @endforeach
                </div>
                <div class="social">
                    <div class="social-share">
                        <span class="social-icon">
                            <i class="icofont-share"></i>
                        </span>
                        <ul class="share-wrapper">
                            <li>
                                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
                                    <i class="fa fa-facebook fa-lg"></i>
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                                    <i class="fa fa-twitter fa-lg"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                        <i class="fa fa-heart-o"></i>
                    </div>
                </div>
                </div>
                @endif --}}

                @include('Event::frontend.layouts.details.attributes')
                
               
                    @if($row->map_lat && $row->map_lng)
                        <div class="g-location">
                            <h3>{{__("Location")}}</h3>
                            <div class="location-map">
                                <div id="map_content"></div>
                            </div>
                        </div>
                        @endif
                        
                        
                        
    <!-- <div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m menu-active app"-->
    <!--    data-menu-height="400" -->
    <!--    data-menu-effect="menu-parallax">-->
    <!--    <img class="mx-auto mt-4 rounded-m" src="/images/appsIcon.png" alt="img" width="90">-->
        
    <!--    <h5 class="text-center2 boxed-text-xl style= padding-bottom:10px">-->
    <!--        Install Places App for a better experience-->
    <!--    </h5>-->
    <!--    <div class="boxed-text-l">-->
    <!--        <a href="https://apps.apple.com/us/app/places-by-crowdroom/id1549861039" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">iOS AppStore</a>-->
    <!--        <a href="#" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">Android App</a>-->
    <!--        <a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12">Maybe later</a>-->
    <!--    </div>-->
    <!--</div> -->
    