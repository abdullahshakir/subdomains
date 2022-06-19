<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/bootstrap.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/style.css')); ?>"  type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/swiper.css')); ?>"  type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/dark.css')); ?>"  type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/font-icons.css')); ?>"  type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/animate.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/magnific-popup.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/custom.css')); ?>"  type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/components/bs-datatable.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/components/bs-filestyle.css')); ?>" type="text/css" />
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <?php if(auth()->guard()->check()): ?>
                        
                        <?php endif; ?>
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="row p-0 m-0">
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <?php if(auth()->guard()->check()): ?>
                        <?php echo $__env->make('layouts.side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 pl-0">
                    <div class="container pl-0">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('assets/js/plugins.min.js')); ?>"></script>

<!-- Footer Scripts
============================================= -->


<script src="<?php echo e(asset('assets/js/components/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/components/bs-datatable.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/components/bs-filestyle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/components/tinymce/tinymce.min.js')); ?>"></script>

<script>
    $(document).ready(function() {
        $('#datatable1').dataTable();
    });

    jQuery(document).ready( function(){
        $('.dobpicker').datepicker({
            autoclose: true,
        });

        $("#jobs-application-resume").fileinput({
            required: true,
            browseClass: "btn btn-secondary",
            browseIcon: "",
            removeClass: "btn btn-danger",
            removeLabel: "",
            removeIcon: "<i class='icon-trash-alt1'></i>",
            showUpload: false
        });

        tinymce.init({
            selector: '#jobs-application-message',
            menubar: false,
            setup: function(editor) {
                editor.on('change', function(e) {
                    editor.save();
                });
            }
        });
    })
</script>

</html>
<?php /**PATH D:\OPS-Project\subdomains\resources\views/layouts/app.blade.php ENDPATH**/ ?>