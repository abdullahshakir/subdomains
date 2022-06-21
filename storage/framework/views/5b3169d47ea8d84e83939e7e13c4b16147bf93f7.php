<section id="content" class="p-0">
    <div class="content-wrap">
        <div class="container clearfix" id="aboutus">
            <h3>About Us</h3>
            <div class="divider"><i class="icon-circle"></i></div>
        </div>
        <div class="row p-0 bottommargin-lg align-items-stretch">
            <?php $__empty_1 = true; $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-4 dark col-padding overflow-hidden" style="background-color: <?php echo e($about['color']); ?>">
                    <div>
                        <h3 class="text-uppercase" style="font-weight: 600;"><?php echo e($about['title']); ?></h3>
                        <p style="line-height: 1.8;">
                            <?php echo e($about['description']); ?>

                        </p>
                        <a href="#" class="button button-border button-light button-rounded--}}
                            button-reveal text-end text-uppercase m-0">
                            <i class="icon-angle-right"></i>
                            <span>Read More</span>
                        </a>
                        <i class="icon-bulb bgicon"></i>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center">Not record found</p>
            <?php endif; ?>
         </div>
        <div class="section m-0">
            <div class="container clearfix">
                <div class="row col-mb-50">

                    <div class="col-sm-6 col-lg-3 text-center" data-animate="bounceIn">
                        <i class="i-plain i-xlarge mx-auto icon-line2-directions"></i>
                        <div class="counter counter-lined"><span data-from="100" data-to="846"
                                                                 data-refresh-interval="50" data-speed="2000"></span>K+
                        </div>
                        <h5>Lines of Codes</h5>
                    </div>

                    <div class="col-sm-6 col-lg-3 text-center" data-animate="bounceIn" data-delay="200">
                        <i class="i-plain i-xlarge mx-auto mb-0 icon-line2-graph"></i>
                        <div class="counter counter-lined"><span data-from="3000" data-to="15360"
                                                                 data-refresh-interval="100" data-speed="2500"></span>+
                        </div>
                        <h5>KBs of HTML Files</h5>
                    </div>

                    <div class="col-sm-6 col-lg-3 text-center" data-animate="bounceIn" data-delay="400">
                        <i class="i-plain i-xlarge mx-auto mb-0 icon-line2-layers"></i>
                        <div class="counter counter-lined"><span data-from="10" data-to="408" data-refresh-interval="25"
                                                                 data-speed="3500"></span>*
                        </div>
                        <h5>No. of Templates</h5>
                    </div>

                    <div class="col-sm-6 col-lg-3 text-center" data-animate="bounceIn" data-delay="600">
                        <i class="i-plain i-xlarge mx-auto mb-0 icon-line2-clock"></i>
                        <div class="counter counter-lined"><span data-from="60" data-to="1200"
                                                                 data-refresh-interval="30" data-speed="2700"></span>+
                        </div>
                        <h5>Hours of Coding</h5>
                    </div>

                </div>

            </div>
        </div>
        <div class="container clearfix">
            <div class="heading-block center mt-lg-5">
                <h2><?php echo e(isset($withTeamMembers) ? $withTeamMembers->title : ''); ?></h2>
                <span><?php echo e(isset($withTeamMembers) ? $withTeamMembers->sub_title : ''); ?></span>
            </div>
            <div class="row col-mb-50 mb-0">
                <?php if(isset($withTeamMembers)): ?>
                <?php $__empty_1 = true; $__currentLoopData = $withTeamMembers['teamMembers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $members): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-6">
                    <div class="team team-list row align-items-center">
                        <div class="team-image col-sm-6">
                            <img src="<?php echo e($members->file); ?>" alt="<?php echo e($members->file); ?>"
                                class="" width="100" height="280"/>
                        </div>
                        <div class="team-desc col-sm-6">
                            <div class="team-title"><h4><?php echo e($members->name); ?></h4><span><?php echo e($members->designation); ?></span></div>
                            <div class="team-content">
                                <p><?php echo e($members->description); ?></p>
                            </div>
                            <a href="<?php echo e($members->facebook_link); ?>" class="social-icon si-rounded si-small si-light si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="<?php echo e($members->twitter_link); ?>" class="social-icon si-rounded si-small si-light si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                            <a href="<?php echo e($members->google_link); ?>" class="social-icon si-rounded si-small si-light si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center">Not record found</p>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section><?php /**PATH D:\OPS-Project\subdomains\resources\views/pages/about-us.blade.php ENDPATH**/ ?>