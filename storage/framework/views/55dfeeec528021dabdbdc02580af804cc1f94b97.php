<?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
<?php if(is_default_lang()): ?>
<div class="panel">
    <div class="panel-title"><strong><?php echo e(__("Pricing and Tickets")); ?></strong></div>
    <div class="panel-body">
        <?php if(is_default_lang()): ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label"><?php echo e(__("Price (set same as your regular ticket price. This will be visible on your event page. Setup your Ticket Types and Prices Below)")); ?></label>
                        <input type="number" step="any" min="0" name="price" class="form-control" value="<?php echo e($row->price); ?>" placeholder="<?php echo e(__("Event Price (regular ticket price)")); ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <div class="form-group">
                        <label class="control-label"><?php echo e(__("Sale Price (this helps you attract more buyers)")); ?></label>
                        <input type="number" step="any" name="sale_price" class="form-control" value="<?php echo e($row->sale_price); ?>" placeholder="<?php echo e(__("Event Tcket Sale Price")); ?>">
                        <span><i><?php echo e(__("If the regular price is less than the discounted price , it will show the regular price")); ?></i></span>
                    </div>-->
                    
                </div>
            </div>
            <div class="form-group-item" >
                <label class="control-label"><?php echo e(__('Tickets (Setup your ticket types and prices here)')); ?></label>
                <div class="g-items-header">
                    <div class="row">
                        <div class="col-md-2"><?php echo e(__("Code")); ?></div>
                        <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                        <div class="col-md-4"><?php echo e(__('Ticket Price & Available Slots')); ?></div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="g-items">
                    <?php if(!empty($row->ticket_types)): ?>
                        <?php $__currentLoopData = $row->ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item" data-number="<?php echo e($key); ?>">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" <?php if(!is_default_lang()): ?> disabled <?php endif; ?> name="ticket_types[<?php echo e($key); ?>][code]" class="form-control" value="<?php echo e($item['code']); ?>" placeholder="<?php echo e(__("regular_ticket")); ?>">
                                    </div>
                                    <div class="col-md-5">
                                        <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                                <div class="g-lang">
                                                    <div class="title-lang"><?php echo e($language->name); ?></div>
                                                    <input type="text" name="ticket_types[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($item['name'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Name')); ?>">
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <input type="text" name="ticket_types[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($item['name'] ?? ''); ?>" placeholder="<?php echo e(__('Name')); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <lable><?php echo e(__("Price")); ?></lable>
                                        <input type="number" <?php if(!is_default_lang()): ?> disabled <?php endif; ?> min="0" name="ticket_types[<?php echo e($key); ?>][price]" class="form-control" value="<?php echo e($item['price']); ?>" placeholder="<?php echo e(__("Ticket Price")); ?>">
                                        <lable><?php echo e(__("Number")); ?></lable>
                                        <input type="number" <?php if(!is_default_lang()): ?> disabled <?php endif; ?> min="0" name="ticket_types[<?php echo e($key); ?>][number]" class="form-control" value="<?php echo e($item['number']); ?>" placeholder="<?php echo e(__("Ticket Number(how mnany available)")); ?>">
                                    </div>
                                    <div class="col-md-1">
                                        <?php if(is_default_lang()): ?>
                                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="text-right">
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                </div>
                <div class="g-more hide">
                    <div class="item" data-number="__number__">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" <?php if(!is_default_lang()): ?> disabled <?php endif; ?> __name__="ticket_types[__number__][code]" class="form-control" placeholder="<?php echo e(__("ticket_vip_1")); ?>">
                            </div>
                            <div class="col-md-5">
                                <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                        <div class="g-lang">
                                            <div class="title-lang"><?php echo e($language->name); ?></div>
                                            <input type="text" __name__="ticket_types[__number__][name<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Name')); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <input type="text" __name__="ticket_types[__number__][name]" class="form-control" value="" placeholder="<?php echo e(__('Name')); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <input type="number" min="0" __name__="ticket_types[__number__][price]" class="form-control" value="" placeholder="<?php echo e(__("Price Ticket")); ?>">
                                <input type="number" min="0" __name__="ticket_types[__number__][number]" class="form-control" value="" placeholder="<?php echo e(__("Number Ticket")); ?>">
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div class="form-group <?php if(!is_default_lang()): ?> d-none <?php endif; ?>">
            <label><input type="checkbox" name="enable_extra_price" <?php if(!empty($row->enable_extra_price)): ?> checked <?php endif; ?> value="1"> <?php echo e(__('Enable extra price')); ?>

            </label>
        </div>
        <div class="form-group-item <?php if(!is_default_lang()): ?> d-none <?php endif; ?>" data-condition="enable_extra_price:is(1)">
            <label class="control-label"><?php echo e(__('Extra Price')); ?></label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                    <div class="col-md-3"><?php echo e(__('Price')); ?></div>
                    <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                <?php if(!empty($row->extra_price)): ?>
                    <?php $__currentLoopData = $row->extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$extra_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item" data-number="<?php echo e($key); ?>">
                            <div class="row">
                                <div class="col-md-5">
                                    <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                            <div class="g-lang">
                                                <div class="title-lang"><?php echo e($language->name); ?></div>
                                                <input type="text" name="extra_price[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($extra_price['name'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Extra price name')); ?>">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <input type="text" name="extra_price[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($extra_price['name'] ?? ''); ?>" placeholder="<?php echo e(__('Extra price name')); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" <?php if(!is_default_lang()): ?> disabled <?php endif; ?> min="0" name="extra_price[<?php echo e($key); ?>][price]" class="form-control" value="<?php echo e($extra_price['price']); ?>">
                                </div>
                                <div class="col-md-3">
                                    <select name="extra_price[<?php echo e($key); ?>][type]" class="form-control" <?php if(!is_default_lang()): ?> disabled <?php endif; ?>>
                                        <option <?php if($extra_price['type'] ==  'one_time'): ?> selected <?php endif; ?> value="one_time"><?php echo e(__("One-time")); ?></option>
                                        <option <?php if($extra_price['type'] ==  'per_hour'): ?> selected <?php endif; ?> value="per_hour"><?php echo e(__("Per hour")); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <?php if(is_default_lang()): ?>
                                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="text-right">
                <?php if(is_default_lang()): ?>
                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                <?php endif; ?>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                    <div class="g-lang">
                                        <div class="title-lang"><?php echo e($language->name); ?></div>
                                        <input type="text" __name__="extra_price[__number__][name<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Extra price name')); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <input type="text" __name__="extra_price[__number__][name]" class="form-control" value="" placeholder="<?php echo e(__('Extra price name')); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <input type="number" min="0" __name__="extra_price[__number__][price]" class="form-control" value="">
                        </div>
                        <div class="col-md-3">
                            <select __name__="extra_price[__number__][type]" class="form-control">
                                <option value="one_time"><?php echo e(__("One-time")); ?></option>
                                <option value="per_hour"><?php echo e(__("Per hour")); ?></option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /www/wwwroot/crowdroom.y3579.com/custom/Event/Views/admin/event/pricing.blade.php ENDPATH**/ ?>