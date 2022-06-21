<section id="content" data-spy="scroll" data-target="#navbar" data-offset="0">
    <div class="section" id="services">
        <div class="container">
            <h3 class="m-0">Our Services</h3>
            <div class="divider"><i class="icon-circle"></i></div>
            <div class="heading-block center">
                <h2><?php echo e($withSubService->title ?? 'This is an title'); ?></h2>
                <span><?php echo e($withSubService->sub_title ?? 'This is an sub title'); ?></span>
            </div>
            <div class="row col-mb-50">
                <div class="col-lg-4 text-center text-lg-start">
                    <img data-animate="fadeInLeftBig"
                         src="<?php echo e($withSubService->file ?? null); ?>"
                         alt="<?php echo e($withSubService->file ?? null); ?>"
                         width="100"
                    >
                </div>
                <?php if(isset($services)): ?>
                <div class="col-8">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-lg-6 col-md-6 topmargin">
                            <div class="w-100 mb-5">
                                <div class="feature-box fbox-plain fbox-sm fbox-dark">
                                    <div class="fbox-icon">
                                        <a href="#">
                                            <img src="<?php echo e($subService['file']); ?>"
                                                 alt="<?php echo e($subService['file']); ?>"
                                                 width="100"
                                            >
                                        </a>
                                    </div>
                                    <div class="fbox-content">
                                        <h3><?php echo e($subService['title']); ?></h3>
                                        <p>
                                            <?php echo e($subService['description']); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-center">Not record yet</p>
                        <?php endif; ?>
                      </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container clearfix">
        <div class="row col-mb-50">
            <h3 class="m-0">Features</h3>
            <div class="divider"><i class="icon-circle"></i></div>
            <?php if(isset($features)): ?>
            <?php $__empty_1 = true; $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <a href="#">

                            <img data-animate="fadeInLeftBig"
                                 src="<?php echo e($feature['file'] ?? null); ?>"
                                 alt="<?php echo e($feature['file'] ?? null); ?>"
                                 width="50" height="50"
                                 style="border-radius: 50%;"
                            >
                        </a>
                    </div>
                    <div class="fbox-content">
                        <h3><?php echo e($feature['title']); ?><span
                                class="subtitle"><?php echo e($feature['description']); ?></span></h3>
                    </div>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center">Not record yet</p>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH D:\OPS-Project\subdomains\resources\views/pages/services.blade.php ENDPATH**/ ?>