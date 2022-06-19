<!DOCTYPE html charset="utf-8">
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="Saquib" content="Blade">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link   href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/bootstrap.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/style.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/swiper.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/dark.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/font-icons.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/animate.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/magnific-popup.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/custom.css')); ?>" type="text/css"/>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Home</title>
</head>
<body class="stretched side-header mb-0">
<header id="header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-between">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="index.html" class="standard-logo" data-dark-logo="assets/images/logo-side-dark.png"
                       data-mobile-logo="assets/images/logo.png"><img src="<?php echo e(URL::to('assets/images/logo-side.png')); ?>"
                                                                      alt="Canvas Logo"></a>
                    <a href="index.html" class="retina-logo" data-dark-logo="assets/images/logo-side-dark@2x.png"
                       data-mobile-logo="assets/images/logo@2x.png"><img src="<?php echo e(URL::to('assets/images/logo-side@2x.png')); ?>"
                                                                         alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                    </svg>
                </div>

                <div class="header-misc d-none d-sm-block">
                    <div class="d-flex my-lg-3">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>
                    </div>
                </div>
                <nav class="primary-menu on-click">
                    <ul class="menu-container">
                       <?php if(auth()): ?>
                            <li class="menu-item">
                                <a class="menu-link" href="<?php echo e(url('sub-domain')); ?>">
                                    Theme
                                </a>
                            </li>                       
                            <li class="menu-item">
                                <a class="menu-link" href="<?php echo e(route('domains.index')); ?>">
                                    Domain
                                </a>
                            </li>   
                       <?php endif; ?>
                        
                        <?php
                            $id = request()->route()->parameters();
                            $default = '/';
                            $domainId = $id != null ? $id['domain'] : $default;
                            // dd($domainId);
                        ?>
                        <li class="menu-item"><a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/ratings')); ?>">
                                <div>Rating</div>
                            </a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/services')); ?>">
                                <div>Services</div>
                            </a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/galleries')); ?>">
                                <div>Gallery</div>
                            </a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/portfolios')); ?>">
                                <div>Portfolio</div>
                            </a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/about')); ?>">
                                <div>About us</div>
                            </a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/contacts')); ?>">
                                <div>Contact us</div>
                            </a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/teams')); ?>">
                                <div>Team & Team Members</div>
                            </a>
                        </li>
                        
                        <li class="menu-item">
                            <a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/features')); ?>">
                                <div>Features</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/connectivities')); ?>">
                                <div>Connectivity</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/sliders')); ?>">
                                <div>Slider</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/headers')); ?>">
                                <div>Header</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="<?php echo e(url('domains/'.$domainId.'/footers')); ?>">
                                <div>Footer</div>
                            </a>
                        </li> 
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
============================================= -->
<script src="<?php echo e(URL::asset('assets/js/jquery.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/plugins.min.js')); ?>}"></script>

<!-- Footer Scripts

============================================= -->


</body>
</html>
<?php /**PATH D:\OPS-Project\subdomains\resources\views/layouts/side-bar.blade.php ENDPATH**/ ?>