<!-- Header
  ============================================= -->
<header id="header" class="full-header pl-0 transparent-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                    ============================================= -->
                <div id="logo">
                    <a href="<?php echo e(url('/{id}')); ?>" class="standard-logo" data-dark-logo="assets/images/logo-dark.png"><img
                            src="<?php echo e(URL::asset('assets/images/logo.png')); ?>" alt="Canvas Logo"></a>
                    <a href="<?php echo e(url('/{id}')); ?>" class="retina-logo" data-dark-logo="assets/images/logo-dark@2x.png"><img
                            src="<?php echo e(URL::asset('assets/images/logo@2x.png')); ?>" alt="Canvas Logo"></a>
                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                        </path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                        </path>
                    </svg>
                </div>

                <!-- Primary Navigation
                    ============================================= -->
                <nav class="primary-menu" id="#navbar">
                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="<?php echo e(url('/{id}')); ?>">
                                <div>Home</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#services">
                                <div>Services</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#gallery">
                                <div>Gallery</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#portfol">
                                <div>Portfolio</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#aboutus">
                                <div>About us</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#contactus">
                                <div>Contact us</div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #footer end -->

<section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-60 min-vh-md-100 pl-0 include-header">
    <div class="slider-inner">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="swiper-slide dark">
                    <div class="container">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp"><?php echo e($slider['title']); ?></h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">
                                <?php echo e($slider['sub_title']); ?>

                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide-bg"
                         style="background-image: url('http://php.subdomain.com:8000/.<?php echo e($slider['file']); ?>');"></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center">Not record yet</p>
                <?php endif; ?>






























            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
        </div>
        <a href="#" data-scrollto="#content" data-offset="100" class="one-page-arrow dark">
            <i class="icon-angle-down infinite animated fadeInDown"></i>
        </a>
    </div>
</section>
<?php /**PATH D:\OPS-Project\subdomains\resources\views/includes/header.blade.php ENDPATH**/ ?>