@if(!empty($location_category) and !empty($translation->surrounding))

<!--<h3 class="mb-4">{{__("What's Nearby")}}</h3>-->
 
     @foreach($location_category as $category)
     @if(!empty($translation->surrounding[$category->id]))
					@foreach($translation->surrounding[$category->id] as $item)
    <div class="list-group list-boxes">
                    <a href="#" class="border border-green-dark rounded-s shadow-xs">
                        <i class="{{clean($category->icon_class)}}"></i>
                        <span>{{$category->translations->name??$category->name}}</span>
                      
                        <strong>{{$item['name']}} - {{$item['content']}}</strong>
                        <u class="color-green-dark">NEAR</u>
                        <i class="fa fa-check-circle color-green-dark"></i>
                    
				    </a>        
                          
    </div>
                	@endforeach
				@endif
				
			@endforeach
			 
			
	<!--<div class="g-surrounding">-->
	<!--	<div class="location-title">-->
	<!--		<h3 class="mb-4">{{__("What's Nearby")}}</h3>-->
	<!--		@foreach($location_category as $category)-->
	<!--			<h6 class="font-weight-bold mb-3"><i class="{{clean($category->icon_class)}} "></i> {{$category->translations->name??$category->name}}</h6>-->
	<!--			@if(!empty($translation->surrounding[$category->id]))-->
	<!--				@foreach($translation->surrounding[$category->id] as $item)-->
	<!--					<div class="row mb-3">-->
	<!--						<div class="col-lg-4">{{$item['name']}} - {{$item['content']}}</div>-->
								<!--<div class="col-lg-4">{{$item['name']}} ({{$item['value']}}{{$item['type']}}) {{$item['content']}}</div>-->
							<!--<div class="col-lg-8">{{$item['content']}}</div>-->
	<!--					</div>-->
	<!--				@endforeach-->
	<!--			@endif-->
	<!--		@endforeach-->
	<!--	</div>-->
	<!--</div>-->
@endif
