@foreach($rows as $row)
    @php
        $translation = $row->translateOrOrigin(app()->getLocale()); @endphp
        
        
        
    <div class="page-content" style="margin-top:130px;">
        @if($image_tag = get_image_tag($row->image_id,'full'))
        
        
          <a href="#" class="card card-style bg-1" data-card-height="150">
            <div class="card-center pl-3">
                <h1 class="color-white mb-n1 font-30">Sports</h1>
                <p class="color-white opacity-50 mb-0">Curated by Top Critics</p>
            </div>
            <div class="card-center">
                <span class="icon icon-s float-right bg-theme color-black mr-3 rounded-xl"><i class="fa fa-arrow-right"></i></span>
            </div>
            <div class="card-overlay bg-black opacity-60"></div>
        </a>
        
        
        

          <a href="{{$row->getDetailUrl()}}" class="card card-style" data-card-height="150">{!! $image_tag !!}
          
            <div class="card-center pl-3">
                
                 @php $category = $row->getCategory; @endphp
                    @if(!empty($category))
                        @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp
                        
                         <a  href="{{$category->getDetailUrl(app()->getLocale())}}">
                                    {{$t->name ?? ''}}
                                </a>
                
                <h1 class="color-white mb-n1 font-30">{{$t->name ?? ''}}</h1>
                
                     @endif
                     
                 <a class="color-white opacity-50 mb-0" href="{{$row->getDetailUrl()}}"> {{$translation->title}}</a>
                <!--<p class="color-white opacity-50 mb-0">{{$translation->title}}</p>-->
            </div>
            
            <div class="card-overlay bg-black opacity-60"></div>
          </a>
        
        @endif

    </div>
        
        
        
        
    <!--<div class="post_item ">-->
    <!--    <div class="header">-->
            <!--@if($image_tag = get_image_tag($row->image_id,'full'))-->
            <!--    <header class="post-header">-->
            <!--        <a href="{{$row->getDetailUrl()}}">-->
            <!--            {!! $image_tag !!}-->
            <!--        </a>-->
            <!--    </header>-->
            <!--    <div class="cate">-->
            <!--        @php $category = $row->getCategory; @endphp-->
            <!--        @if(!empty($category))-->
            <!--            @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp-->
            <!--            <ul>-->
            <!--                <li>-->
            <!--                    <a href="{{$category->getDetailUrl(app()->getLocale())}}">-->
            <!--                        {{$t->name ?? ''}}-->
            <!--                    </a>-->
            <!--                </li>-->
            <!--            </ul>-->
            <!--        @endif-->
            <!--    </div>-->
            <!--@endif-->
            <!--<div class="post-inner">-->
            <!--    <h4 class="post-title">-->
            <!--        <a class="text-darken" href="{{$row->getDetailUrl()}}"> {{$translation->title}}</a>-->
            <!--    </h4>-->
                
                <!-- 
                <div class="post-info">
                    <ul>
                        @if(!empty($row->getAuthor))
                            <li>
                                @if($avatar_url = $row->getAuthor->getAvatarUrl())
                                    <img class="avatar" src="{{$avatar_url}}" alt="{{$row->getAuthor->getDisplayName()}}">
                                @else
                                    <span class="avatar-text">{{ucfirst($row->getAuthor->getDisplayName()[0])}}</span>
                                @endif
                                <span> {{ __('BY ')}} </span>
                                {{$row->getAuthor->getDisplayName() ?? ''}}
                            </li>
                        @endif
                        <li> {{__('DATE ')}}  {{ display_date($row->updated_at)}}  </li>
                    </ul>
                </div>-->
                
                <!-- <div class="post-desciption">
                    {!! get_exceprt($translation->content) !!}
                </div>
                
                
                
                <a class="btn-readmore" href="{{$row->getDetailUrl()}}">{{ __('Read More')}}</a>-->
            <!--</div>-->
    <!--    </div>-->
    <!--</div>-->
@endforeach
