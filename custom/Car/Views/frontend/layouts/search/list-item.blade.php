<div class="row">
    <div class="col-lg-3 col-md-12">
        @include('Car::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <div class="text">
                    @if($rows->total() > 1)
                        {{ __(":count cars found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count car found",['count'=>$rows->total()]) }}
                    @endif
                </div>
                <div class="control">

                </div>
            </div>
            <!--<div class="list-item">-->
                 <div class="page-content pb-3"> 
 
 
        
        <!-- card in this page format must have the class card-full to avoid seeing behind it-->
        <div class="card card-full rounded-m pb-4">
            <div class="drag-line"></div>
            
            <div class="content">
                
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            <div class="col-lg-4 ">
                                @include('Car::frontend.layouts.search.loop-gird')
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-4">
                            {{__("Car not found")}}
                        </div>
                    @endif
                <!--</div>-->
            </div> </div> </div>
            <div class="bravo-pagination">
                {{$rows->appends(request()->query())->links()}}
                @if($rows->total() > 0)
                    <span class="count-string">{{ __("Showing :from - :to of :total Cars",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
