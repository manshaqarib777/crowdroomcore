<div class="bravo-list-item <?php if(!$rows->count()): ?> not-found <?php endif; ?>">
    <?php if($rows->count()): ?>
        <div class="text-paginate">
            <span class="count-string"><?php echo e(__("Showing :from - :to of :total Events",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
        </div>
        <div class="list-item">
            <div class="row">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-md-4 col-lg-3">
                    <?php echo $__env->make('Event::frontend.layouts.search.loop-gird', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="bravo-pagination">
            <?php echo e($rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links()); ?>

        </div>
        <?php else: ?>
        <div class="not-found-box">
            <h3 class="n-title"><?php echo e(__("We couldn't find any events.")); ?></h3>
            <p class="p-desc"><?php echo e(__("Try changing your filter criteria")); ?></p>
            
        </div>
        <?php endif; ?>
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


<div class="bravo-wrap">

    <div class="bravo_detail_event">

        <div class="bravo-more-book-mobile">
            <div class="container" style="justify-content: space-between; height=" 50px;>

                
                 <a href="/space?_layout=map" class="bottom-menu-item">
                    <i class="icofont-trello" aria-hidden="true"></i>
                    <div>Venues</div>
                </a>

                <a href="/activity?_layout=map" class="bottom-menu-item">
                    <i class="icofont-users-social" aria-hidden="true"></i>
                    <div>Experience</div>
                </a> 
                <a class="bottom-menu-item" href="/event?_layout=map">
                    <i class="icofont-pixels" aria-hidden="true"></i>
                    <div>Events</div>
                </a>
                <a href="/service?_layout=map" class="bottom-menu-item">
                    <i class="icofont-building-alt" aria-hidden="true"></i>
                    <div>Apartments</div>
                </a>
                
                <a href="/user/booking-history" class="bottom-menu-item">
                    <i class="icofont-live-support" aria-hidden="true"></i>
                    <div>Bookings</div>
                </a>
                
               
                
            </div>
        </div>
    </div>
</div><?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Event/Views/frontend/layouts/search-map/list-item.blade.php ENDPATH**/ ?>