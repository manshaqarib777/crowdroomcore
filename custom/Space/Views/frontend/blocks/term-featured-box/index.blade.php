@if(!empty($list_term))
    <div class="bravo-car-term-featured-box">
        <div class="container">
            <div class="title">
                {{$title}}
            </div>
            @if($desc)
                <div class="sub-title">
                    {{$desc}}
                </div>
            @endif
            <div class="row">
                @foreach($list_term as $item)
                    <?php
                    $image_url = get_file_url($item->image_id, 'full');
                    $page_search = Modules\Space\Models\Space::getLinkForPageSearch(false , [ 'terms[]' =>  $item->id] );
                    $tran = $item->translateOrOrigin(app()->getLocale());
                    ?>
                    <div class="col-xs-4 col-sm-3 col-6">
                        <a href="{{ $page_search }}">
                            <div class="featured-item">
                                <div class="image">
                                    <img src="{{$image_url}}" class="img-responsive">
                                </div>
                                <h4 class="text">
                                    {{$tran->name}}
                                </h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif