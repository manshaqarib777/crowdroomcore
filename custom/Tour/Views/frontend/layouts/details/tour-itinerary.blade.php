@if($translation->itinerary)
    <!--<div class="g-itinerary">-->
        <!--<h3> {{__("Itinerary")}} </h3>-->
        
        
        
       
              <div class="single-slider owl-carousel owl-no-dots" style="margin-top:58px; margin-bottom:-15px;">
                @foreach($translation->itinerary as $item)   
            <div class="item" style="margin-top:10px;">
                <div data-card-height="185" class="card rounded-m shadow-l" style="background-image: url('{{ !empty($item['image_id']) ? get_file_url($item['image_id'],"full") : "" }}')">
                    <!--<div class="card-top mt-2">-->
                    <!--    <p class="color-white"><i class="fa fa-star color-yellow-dark px-2"></i>4.9</p>-->
                    <!--</div>-->
                    <div class="card-bottom mb-2">
                        <h5 class="color-white font-15 px-2" style="margin-top:-80px!important;">{{$item['title']}}</h5>
                        <p class="color-white mb-0 mt-n2 font-11 opacity-70 px-2">
                            {{$item['desc']}}
                        </p>
                        <p class="color-white mb-0 mt-n2 font-11 opacity-70 px-2">
                            {!! clean($item['content']) !!}
                        </p>
                    </div>
                    <div class="card-overlay bg-gradient opacity-30"></div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
            @endforeach
           </div>
        
        
        
        
        
        
        
        
        <!--<div class="list-item owl-carousel">-->
        <!--    @foreach($translation->itinerary as $item)-->
        <!--        <div class="item" style="background-image: url('{{ !empty($item['image_id']) ? get_file_url($item['image_id'],"full") : "" }}')">-->
        <!--            <div class="header">-->
        <!--                <div class="item-title">{{$item['title']}}</div>-->
        <!--                <div class="item-desc">{{$item['desc']}}</div>-->
        <!--            </div>-->
        <!--            <div class="body">-->
        <!--                <div class="item-title">{{$item['title']}}</div>-->
        <!--                <div class="item-desc">{{$item['desc']}}</div>-->
        <!--                <div class="item-context">-->
        <!--                    {!! clean($item['content']) !!}-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    @endforeach-->
        <!--</div>-->
    <!--</div>-->
@endif
