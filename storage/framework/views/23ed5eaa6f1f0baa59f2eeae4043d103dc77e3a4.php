


<div class="page-content-event">
        
        <div class="card notch-clear rounded-0 gradient-dark mb-n5">
            <div class="card-body" style="margin-bottom:30px;">
                
                
                 
                
            </div>
        </div>
    </div>  
    
    
    
    <div class="single-slider owl-carousel owl-no-dots owl-has-controls mb-0" style="margin-top:-175px;">
            <div data-card-height="270" class="card mb-0 bg-6 shadow-l">
                <div class="card-bottom text-center mb-6" style="margin-top:-100px;">
                    <h2 class="color-white text-uppercase font-900 mb-0" style="margin-top:-100px;">Splendid Simplicity</h2>
                    <p class="under-heading color-white">Ideal Space for Your Upcoming Activity.</p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </div>
            <div data-card-height="270" class="card mb-0 bg-5 shadow-l">
                <div class="card-bottom text-center mb-2" style="margin-top:-100px;">
                    <h2 class="color-white text-uppercase font-900 mb-0" style="margin-top:-100px;">Perfectly Organized</h2>
                    <p class="under-heading color-white">Mobile Website, or App or PWA Ready.</p>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </div>
        </div> 
    
    
    <div class="card card-style-request mb-2" style="z-index:300;">
<div class="content">
<div class="d-flex">
    
    
<div class="bravo-contact-block">
    <div class="container-fluid">
        <div class="row section" style="padding: 0px 0 !important;margin-left: -30px;
    margin-right: -30px; ">
            <div class="col-md-4 col-lg-4">
                <div role="form" class="form_wrapper" lang="en-US" dir="ltr">
                    <form method="post" action="<?php echo e(route('space_request.store')); ?>" class="bravo-contact-block-form">
                        <?php echo e(csrf_field()); ?>

                        <div style="display: none;">
                            <input type="hidden" name="g-recaptcha-response" value="">
                        </div>
                        
                        
                         <?php if(!Auth::id()): ?>
                        <div class="contact-form">
                            <div class="d-flex mb-3" style="margin-top:-15px;">
                                <!--<div class="align-self-center">-->
                                <!--<img src="images/home.jpeg" width="45" class="rounded-sm shadow-xl mr-2">-->
                                <!-- </div>-->


                        <div class="content" style="margin-left:-1px;">
                            
                            
                  <p class="font-600 color-highlight mb-n1">Hello There !</p>
                             <?php else: ?> 
                             
                             
                              <div class="contact-form">
                            <div class="d-flex mb-3" style="margin-top:-15px;">
                                <div class="align-self-center">
                                     <?php if($avatar_url = Auth::user()->getAvatarUrl()): ?>
                
                <!--<a href="#" style="margin-top:-10px"class="float-left  rounded-xl"><img src="<?php echo e($avatar_url); ?>" alt="<?php echo e(Auth::user()->getDisplayName()); ?>" class="rounded-xl"  height="32" width="32"></a>-->
                
                  
                     </div>
                     <?php else: ?>
                <span class="avatar-text"><?php echo e(ucfirst( Auth::user()->getDisplayName()[0])); ?></span>
                 <?php endif; ?>


                        <div class="content" style="margin-left:-1px;">
                                      
                        <p class="font-600 color-highlight mb-n1"><?php echo e(__("Hi! :Name",['name'=>Auth::user()->getDisplayName()])); ?></p>
                        
                              <?php endif; ?>  
                              
                              <h3>Find Your Space</h3>
                              <p class="font-600 color-highlight mb-n1" style="margin-top:-10px;color:#969696 !important;">Priority service（1对1咨询服务）</p>
                        
                              
                          </div>


                                  <?php if(!Auth::id()): ?>


                                <div class="ml-auto align-self-center">
                                 <img src="/images/iconbulb.gif" width="40" class="">
                                </div>
                                
                                  <?php else: ?> 
                                  
                                  <div class="ml-auto align-self-center">
                                 <img src="<?php echo e($avatar_url); ?>" width="40" class="">
                                </div>
                              <?php endif; ?>  


                            </div>




                            <div class="divider" style="margin-top:-10px !important;"></div>
                            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="contact-form">    
                            
                            
                                <div class="input-style input-style-2 input-required">
                                    <span class="input-style-1-active color-highlight">Location 城市</span>
                                     <em><i class="fa fa-angle-down"></i></em>
                                    <select class="form-control select" name="location_id" required>
                                        <option value="" >Select Location</option>
                                        <?php $__currentLoopData = $spaceLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spaceLocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($spaceLocation->name); ?>" ><?php echo e($spaceLocation->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            
                            
                            
                            
                               
                                
                                <div class="input-style input-style-2 input-required">
                                    <span class="input-style-1-active color-highlight">Activity Type 活动类型</span>
                                     <em><i class="fa fa-angle-down"></i></em>
                    <input type="text" placeholder=" <?php echo e(__('eg: Getaway, Birthday party, Work etc')); ?> " name="event_type" class="form-control">
                                    <!--<textarea name="event_type" cols="40" rows="1" class="form-control textarea" placeholder="<?php echo e(__('eg: Getaway, Birthday party, Work etc')); ?>"></textarea>-->
                                </div>
                                
                                
                                <div class="input-style input-style-2 input-required">
                                    <span class="input-style-1-active color-highlight">Space Type 场地类型</span>
                                     <em><i class="fa fa-angle-down"></i></em>
                                    <select class="form-control" name="space_type_id">
                                        <option value="" disabled>Select Types</option>
                                        <?php $__currentLoopData = $spaceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spaceType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($spaceType->name); ?>" ><?php echo e($spaceType->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <!--  <div class="input-style input-style-2 input-required">-->
                                <!--    <span class="input-style-1-active color-highlight">Space Type</span>-->
                                <!--    <select class="form-control select" name="space_type[]" multiple="multiple" required>-->
                                <!--        <option value="" disabled>Select Types</option>-->
                                <!--        <?php $__currentLoopData = $spaceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spaceType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                                <!--        <option value="<?php echo e($spaceType->name); ?>" ><?php echo e($spaceType->name); ?></option>-->
                                <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                <!--    </select>-->
                                <!--</div>-->
                               
                
                                <div class="input-style input-style-2 input-required">
                                     <span class="input-style-1-active color-highlight">People Attending 参加人数</span>
                                      <em><i class="fa fa-angle-down"></i></em>
                                    <select class="form-control" name="attendee_id">
                                        <option value="" >How Many People</option>
                                        <?php $__currentLoopData = $spaceAttendees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spaceAttendee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($spaceAttendee->name); ?>" ><?php echo e($spaceAttendee->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                <div class="input-style input-style-2 input-required">
                                     <span class="input-style-1-active color-highlight">Your Budget 预算</span>
                                      <em><i class="fa fa-angle-down"></i></em>
                                    <select class="form-control" name="budget_id" required>
                                        <option value="" >Select Budget</option>
                                        <?php $__currentLoopData = $spaceBudgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spaceBudget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($spaceBudget->name); ?>" >¥ <?php echo e($spaceBudget->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                 <div class="input-style input-style-2 input-required">
                                     <span class="input-style-1-active color-highlight">Preferred Date 日期</span>
                                      <em><i class="fa fa-angle-down"></i></em>
                                    <input type="date" value="date" placeholder="<?php echo e(__('Event Date')); ?>" name="event_date">
                                </div>
                                

                                <div class="input-style input-style-2 input-required">
                                    <span class="input-style-1-active color-highlight">Rent Duration 活动时长</span>
                                     <em><i class="fa fa-angle-down"></i></em>
                                    <select class="form-control" name="duration_id" required>
                                        <option value="" >Select Duration</option>
                                        <?php $__currentLoopData = $spaceDurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spaceDuration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($spaceDuration->name); ?>" ><?php echo e($spaceDuration->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                
                                
                                
                                
                                <div class="input-style input-style-2 input-required">
                                    <span class="input-style-1-active color-highlight">Needed Items 设备需求</span>
                                     <em><i class="fa fa-angle-down"></i></em>
                                    <select class="form-control select" name="requirement[]" multiple="multiple">
                                        <option value="" disabled>Select Requirements</option>
                                        <?php $__currentLoopData = $spaceRequirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spaceRequirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($spaceRequirement->name); ?>" ><?php echo e($spaceRequirement->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                 <div class="input-style input-style-2 input-required">
                                    <span class="input-style-1-active color-highlight">Extra Message 附加信息</span>
                                     
                                    <textarea name="message" cols="40" rows="1" class="form-control textarea" placeholder="<?php echo e(__('Message')); ?>"></textarea>
                                </div>
                                
                                
                                
                                 
                                <div class="content" style="margin-left:-1px;">
                                    <p class="font-600 color-highlight mb-n1">Enter Details</p>
                                    <h3>Contact Information</h3>
                                </div>
       

                                
                                
                                <div class="input-style input-style-2">
                                    <span class="input-style-1-active color-highlight">Name 名字</span>
                                    <input type="text" placeholder=" <?php echo e(__('Name')); ?> " name="name" value="<?php echo e(auth()->user()->name ?? ''); ?>" class="form-control" <?php echo e(auth()->check() ? '':''); ?>>
                                </div>
                                
                                <div class="input-style input-style-2">
                                    <span class="input-style-1-active color-highlight">Email 邮件</span>
                                    <input type="text" placeholder="<?php echo e(__('Email')); ?>" name="email" value="<?php echo e(auth()->user()->email ?? ''); ?>" class="form-control" <?php echo e(auth()->check() ? '':''); ?>>
                                </div>
                                
                                
                                <div class="input-style input-style-2">
                                    <span class="input-style-1-active color-highlight">Phone/Wechat ID 电话/微信</span>
                                    <input type="text" placeholder="<?php echo e(__('Phone')); ?>" name="phone" class="form-control" value="<?php echo e(auth()->user()->phone ?? ''); ?>" <?php echo e(auth()->check() ? '':''); ?>>
                                </div>
                                
                                
                                <?php if(auth()->guard()->guest()): ?>
                                <div class="row mb-0">
                                    <div class="col-6">
                                       <div class="input-style input-style-2">
                                        <span class="input-style-1-active color-highlight">Password</span>
                                        <input type="password" placeholder="<?php echo e(__("Your Password")); ?>" class="form-control" name="password">
                                       </div>
                                    </div>   
                                       
                                    <div class="col-6">   
                                       <div class="input-style input-style-2">
                                        <span class="input-style-1-active color-highlight">Confirm Password</span>
                                        <input type="password" placeholder="<?php echo e(__("Your Confirm Password")); ?>" class="form-control" name="password_confirmation">
                                       </div>
                                    </div>   
                                </div>    
                                <?php endif; ?>
                                
                                
                                
                                
                                
                               
                                <div class="form-group">
                                    <?php echo e(recaptcha_field('contact')); ?>

                                </div>
                                 <h5 style="colour:white!important;"><?php echo e(setting_item_with_lang("page_contact_sub_title")); ?></h5>
                                <p>
                                    <button class="submit btn btn-primary " type="submit">
                                        <?php echo e(__('SUBMIT MEETUP SPACE REQUEST')); ?>

                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    </button>
                                </p>
                                
                            </div>
                        </div>
                        <div class="form-mess"></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>


<div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m menu-active app" data-menu-height="400"
    style="max-height:140px; z-index:500;"  data-menu-effect="menu-parallax">
    <div>
        <img src="/images/appsIcon.png" class="rounded-sm" width="100" style="margin-left: 9px;
margin-top: 10px; border-radius:12px !important;">

        <div class="boxed-text-l" style="text-align:left; margin-top:-96px; margin-left:120px;">
            <h6 class="font-700 font-14 pb-2" style="margin-bottom:-6px;">24/7 Customer Support</h6>
            <h6 class="font-500 font-14 pb-2">Add us on Wechat : crowdroom1</h6>
            <a href="tel:15524059801" class="pwa-install mx-auto btn btn-m font-600 bg-highlight2">
                <i class="fa font-14 fa-phone color-phone" style="color: #f7f9f8 !important;"></i>Call</a>
            <a href="/home-request" class="pwa-install mx-auto btn btn-m font-600 bg-highlight2">Home Request</a>
            <!--<a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12">Maybe later</a>-->
        </div>
    </div>
</div>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/modules/Contact/Views/frontend/blocks/contact/space-request.blade.php ENDPATH**/ ?>