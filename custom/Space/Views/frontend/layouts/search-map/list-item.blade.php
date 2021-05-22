<div class="bravo-list-item @if(!$rows->count()) not-found @endif">
    @if($rows->count())
        <div class="text-paginate">
            <span class="count-string">{{ __("Showing :from - :to of :total Spaces",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
        </div>
        <div class="list-item">
            <div class="row">
                @foreach($rows as $row)
                <div class="col-md-6 col-md-4 col-lg-3">
                    @include('Space::frontend.layouts.search.loop-gird')
                </div>
                @endforeach
            </div>
        </div>

        <div class="bravo-pagination">
            {{$rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links()}}
        </div>
        @else
        <div class="not-found-box">
            <h3 class="n-title">{{__("We couldn't find any spaces.")}}</h3>
            <p class="p-desc">{{__("Try changing your filter criteria")}}</p>
            {{--<a href="#" onclick="return false;" click="" class="btn btn-danger">{{__("Clear Filters")}}</a>--}}
        </div>
        @endif


</div>



<style media="screen">
    .bottom-menu-item {
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    .bottom-menu-item i {
        color: #a70d0d
    }
</style>


    <!--         <div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m menu-active app"-->
    <!--    data-menu-height="400" -->
    <!--    data-menu-effect="menu-parallax">-->
    <!--    <img class="mx-auto mt-4 rounded-m" src="/images/appsIcon.png" alt="img" width="90">-->
        
    <!--    <h5 class="text-center2 boxed-text-xl style= padding-bottom:10px">-->
    <!--        Install Places App for a Better Experience-->
    <!--    </h5>-->
    <!--    <div class="boxed-text-l">-->
    <!--        <a href="https://apps.apple.com/us/app/places-by-crowdroom/id1549861039" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">iOS AppStore</a>-->
    <!--        <a href="#" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">Android App</a>-->
    <!--        <a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12">Maybe later</a>-->
    <!--    </div>-->
    <!--</div> -->


<!--<div class="bravo-wrap">-->

<!--    <div class="bravo_detail_space">-->

<!--        <div class="bravo-more-book-mobile">-->
<!--            <div class="container" style="justify-content: space-between; height=" 50px;>-->

<!--                 <a href="/space?_layout=map" class="bottom-menu-item">-->
<!--                    <i class="icofont-trello" aria-hidden="true"></i>-->
<!--                    <div>Venues</div>-->
<!--                </a>-->

<!--                <a href="/activity?_layout=map" class="bottom-menu-item">-->
<!--                    <i class="icofont-users-social" aria-hidden="true"></i>-->
<!--                    <div>Experience</div>-->
<!--                </a> -->
<!--                <a class="bottom-menu-item" href="/event?_layout=map">-->
<!--                    <i class="icofont-pixels" aria-hidden="true"></i>-->
<!--                    <div>Events</div>-->
<!--                </a>-->
<!--                <a href="/service?_layout=map" class="bottom-menu-item">-->
<!--                    <i class="icofont-building-alt" aria-hidden="true"></i>-->
<!--                    <div>Apartments</div>-->
<!--                </a>-->
                
<!--                <a href="/user/booking-history" class="bottom-menu-item">-->
<!--                    <i class="icofont-live-support" aria-hidden="true"></i>-->
<!--                    <div>Bookings</div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->