@if($row->banner_image_id)
    <div class="bravo_banner" style="background-image: url('{{$row->getBannerImageUrlAttribute('full')}}')">
        <div class="container">
            <div class="bravo_gallery">
             <div class="qr-back-btn">
                 <a href="javascript:javascript:history.go(-1)"> <div>
                     <i class="fa fa-angle-double-left"></i>Back</div></a>
             </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

