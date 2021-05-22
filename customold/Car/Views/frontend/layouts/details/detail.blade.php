<?php
/**
 * @var $translation \Modules\Car\Models\CarTranslation
 * @var $row \Modules\Car\Models\Car
 */
?>
<div class="g-header">
    <div class="left">
        <h2>{{$translation->title}}</h2>
        @if($translation->address)
            <p class="address"><i class="fa fa-map-marker"></i>
                {{$translation->address}}
            </p>
            @endif
            @if($row->passenger)
                <div class="g-location">
                    <span class="text">
                        {{__("Passenger")}}: {{$row->passenger}} | {{__("Baggage")}}: {{$row->baggage}} | {{__("Door")}}: {{$row->door}} sqm
                        <br>
                        <div class="imp-infor"><h4>{{$row->gear}}</h4></div>
                    </span>
                    
                </div>
                @endif
    </div>
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

      
@include('Car::frontend.layouts.details.attributes')

 <div class="infor-message">
        Need Help? Chat with Us - <a href="https://tawk.to/chat/5f7289cb4704467e89f30e10/default">Live Chat Here</a>
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
                        <svg height="18px" padding-right="5px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24"
                            style="enable-background:new 0 0 24 24;" xml:space="preserve">
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
                    </i>{{__("Watch Video")}}
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
                    <div class="">
                        <div class="qr-location">
                            <span class="qr-people">

                                @if(!empty($row->location->name))
                                    <i class="fa fa-map-marker"></i>

                                    @php $location = $row->location->translateOrOrigin(app()->getLocale())
                                    @endphp


                                    {{$location->name ?? ''}}
                                    @endif
                            </span>
                            <span class="qr-people">


                                <i class="fa fa-bed"></i>
                                {{$row->passenger}} Bedrooms
                            </span>
                        </div>
                        <div class="qr-small-dec">
                            {{-- {!! str_replace(" ","&nbsp;",$translation->title) !!} --}}
                            {{$translation->title}}

                        </div>
                        {{-- {!! str_limit($translation->content,50) !!} --}}


                    </div>
                    


                    <div class="qr-price" style="color: #00001e !important; margin-top:0 !important;padding-top:0">
                        <span class="qr-yen-logo">¥</span>{{ explode('.',$row->price)[0] }}<span class="qr-small-dec">/Year</span> 
                        <!-- <span class="qr-box"
                            style="text-decoration: line-through;color: #c03!important;">¥{{ explode('.',$row->sale_price)[0] }}</span>-->


                    </div>
                    
                     @if($row->gear)
               <div class="qr-imp-infor">
                   {{$row->gear}}</div>
                   @endif
                   
                    
                    <div class="qr-seller">
                        <img src="{{ \App\User::findOrFail($row->create_user)->getAvatarUrl() ? \App\User::findOrFail($row->create_user)->getAvatarUrl() : asset('qrCode/img/avatar.png') }}" alt="" class="qr-avatar" />
                        <span class="qr-seller-name">
                            {{ \App\User::findOrFail($row->create_user)->name }}
                            {{-- {{ __('hellodd hidddd') }} --}}
                            {{-- {{ $row->create_user }} --}}
                        </span>
                    </div>



                </div>
                <div class="qr-code-img text-center col-5">
                    {{-- <img src="{!! asset('qrCode') !!}/img/qr-generator.png" alt="" /> --}}
                    <div class="">

                        <img src="data:image/<IMAGE_TYPE>;base64,{!! base64_encode(QrCode::format('png')->size(123)->generate(url()->current())); !!}">
                    </div>

                    <br>
                    <div class="qr-text">Long Press To see details about This
                        {{$translation->title}}.
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="button-div col-12 text-center">
            <a type="button" class="btn qr-btn-secondary" rel="modal:close" onclick="downloadQr(`{{ $row->slug }}`);">
                Download
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







@if($translation->content)
    <div class="g-overview">
        <h3>{{__("Description")}}</h3>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
    @endif







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








            <!--  @if($row->getGallery())
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
@endif
-->







<!-- 
            @if($translation->faqs)
                <div class="g-faq">
                    <h3> {{__("FAQs")}} </h3>
                    @foreach($translation->faqs as $item)
                        <div class="item">
                            <div class="header">
                                <i class="field-icon icofont-support-faq"></i>
                                <h5>{{$item['title']}}</h5>
                                <span class="arrow"><i class="fa fa-angle-down"></i></span>
                            </div>
                            <div class="body">
                                {{$item['content']}}
                            </div>
                        </div>
                        @endforeach
                </div>
                @endif-->
                
                
                
                @if($row->map_lat && $row->map_lng)
                    <div class="g-location">
                        <h3>{{__("Location")}}</h3>
                        <div class="location-map">
                            <div id="map_content"></div>
                        </div>
                    </div>
                    @endif