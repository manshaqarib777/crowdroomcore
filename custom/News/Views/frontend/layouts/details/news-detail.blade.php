
   


    <div class="card card-stylenews">
            <div class="content">
                 @php $category = $row->getCategory; @endphp
                @if(!empty($category))
                    @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp
                    
                 <a href="{{$category->getDetailUrl(app()->getLocale())}}">
                                {{$t->name ?? ''}}
                            </a>    
                <!--<p class="mb-n1 color-highlight font-600">Awesome Article</p>-->
                 @endif
                
                <h1>
                   {{$translation->title}}
                </h1>
                <p>
                    {!! $translation->content !!}
                </p>
                
                <div class="divider"></div>
                
                <div class="d-flex">
                    <div class="mr-2">
                        <img src="/images/appsIcon.png" width="40" class="rounded-s">
                    </div>
                    <div>
                        <h5> @if(!empty($row->getAuthor))</h5>
                        <p class="mb-0 mt-n2" style="margin-top:10px!important;">{{$row->getAuthor->getDisplayName() ?? ''}} | {{ display_date($row->updated_at)}} </p>
                     @endif
                     </div>
                   
                </div>

                
                <!--<h4>Offers From Local Partners</h4>-->
                
                
           
            
                <!--<p>-->
                <!--    Donec consectetur dictum nisi, et sodales lectus rutrum at. Donec lacinia metus quis metus rutrum, sed aliquet neque faucibus.-->
                <!--    Donec consectetur dictum nisi, et sodales lectus rutrum at. Donec lacinia metus quis metus rutrum, sed aliquet neque faucibus.-->
                <!--    Donec consectetur dictum nisi, et sodales lectus rutrum at. Donec lacinia metus quis metus rutrum, sed aliquet neque faucibus.-->
                <!--    Donec consectetur dictum nisi, et sodales lectus rutrum at. Donec lacinia metus quis metus rutrum, sed aliquet neque faucibus.-->
                <!--</p>-->
                
                
            </div>
        </div>
        
       
        
 

<div class="article">
    <!--<div class="header">-->
    <!--    @if($image_url = get_file_url($row->image_id, 'full'))-->
    <!--        <header class="post-header">-->
    <!--            <img src="{{ $image_url  }}" alt="{{$translation->title}}">-->
    <!--        </header>-->
    <!--        <div class="cate">-->
    <!--            @php $category = $row->getCategory; @endphp-->
    <!--            @if(!empty($category))-->
    <!--                @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp-->
    <!--                <ul>-->
    <!--                    <li>-->
    <!--                        <a href="{{$category->getDetailUrl(app()->getLocale())}}">-->
    <!--                            {{$t->name ?? ''}}-->
    <!--                        </a>-->
    <!--                    </li>-->
    <!--                </ul>-->
    <!--            @endif-->
    <!--        </div>-->
    <!--    @endif-->
    <!--</div>-->
    <!--<h2 class="title">{{$translation->title}}</h2>-->
    <!--<div class="post-info">-->
    <!--    <ul>-->
    <!--        @if(!empty($row->getAuthor))-->
    <!--            <li>-->
    <!--                <span> {{ __('BY ')}} </span>-->
    <!--                {{$row->getAuthor->getDisplayName() ?? ''}}-->
    <!--            </li>-->
    <!--        @endif-->
    <!--        <li> {{__('DATE ')}}  {{ display_date($row->updated_at)}}  </li>-->
    <!--    </ul>-->
    <!--</div>-->
    <!--<div class="post-content"> {!! $translation->content !!}</div>-->
    <!--<div class="space-between">-->
    <!--    @if (!empty($tags = $row->getTags()) and count($tags) > 0)-->
    <!--        <div class="tags">-->
    <!--            {{__("Tags:")}}-->
    <!--            @foreach($tags as $tag)-->
    <!--                @php $t = $tag->translateOrOrigin(app()->getLocale()); @endphp-->
    <!--                <a href="{{ $tag->getDetailUrl(app()->getLocale()) }}" class="tag-item"> {{$t->name ?? ''}} </a>-->
    <!--            @endforeach-->
    <!--        </div>-->
    <!--    @endif-->
        <!--<div class="share"> {{__("Share")}}-->
        <!--    <a class="facebook share-item" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" original-title="{{__("Facebook")}}"><i class="fa fa-facebook fa-lg"></i></a>-->
        <!--    <a class="twitter share-item" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" original-title="{{__("Twitter")}}"><i class="fa fa-twitter fa-lg"></i></a>-->
        <!--</div>-->
       
</div>


                      <div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m menu-active app"
        data-menu-height="400" style="max-height:150px" 
        data-menu-effect="menu-parallax">
                           <div>
                       <img src="/images/appsIcon.png" class="rounded-sm" width="100" style="margin-left: 9px;
    margin-top: 10px; border-radius:12px !important;">
    
                   
        <!--<img class="mx-auto mt-4 rounded-m" src="/images/appsIcon.png" alt="img" width="90">-->
        
        <!--<h5 class="text-center2 boxed-text-xl style= padding-bottom:10px">-->
        <!--    Install Places App for a Better Experience-->
        <!--</h5>-->
        <div class="boxed-text-l" style="text-align:right; margin-top:-75px;margin-left:52px;">
              <h6 class="font-500 font-14 pb-2">Install Places App for a Better Experience</h6>
            <a href="https://crowdroom.y3579.com/news/get-places-mobile-app" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">iOS App</a>
            <a href="https://crowdroom.y3579.com/news/get-places-mobile-app" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">Android App</a>
            <!--<a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12">Maybe later</a>-->
        </div> </div>
    </div> 
         
 
