<div class="row">
    <div class="col-lg-3 col-md-12">
        @include('Space::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <div class="text">
                    @if($rows->total() > 1)
                        {{ __(":count spaces found",['count'=>$rows->total()]) }}
                        @else
                        {{ __(":count space found",['count'=>$rows->total()]) }}
                        @endif
                </div>
                <div class="control">

                </div>
            </div>
            <div class="list-item">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                        <div class="col-lg-4 col-md-6">
                            @include('Space::frontend.layouts.search.loop-gird')
                        </div>
                        @endforeach
                        @else
                        <div class="col-lg-12">
                            {{__("Space not found")}}
                        </div>
                        @endif
                </div>
            </div>
            <div class="bravo-pagination">
                {{$rows->appends(request()->query())->links()}}
                @if($rows->total() > 0)
                    <span class="count-string">{{ __("Showing :from - :to of :total Spaces",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                    @endif
            </div>
        </div>
    </div>
</div>