
<?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header>
   <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</header>
<div id="main">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<footer>
   <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</footer>
<?php /**PATH D:\OPS-Project\subdomains\resources\views/layouts/default.blade.php ENDPATH**/ ?>