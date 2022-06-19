

<?php $__env->startSection('content'); ?>
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Domain</h3>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo e(route('domains.index')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>
        <div class="table-responsive">
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/domain/show.blade.php ENDPATH**/ ?>