

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
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Theme</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td> <?php echo e($item->theme->name); ?> </td>
                            <td> <?php echo e($item->title); ?> </td> 
                            <td> <?php echo e($item->url); ?> </td> 
                            <td> <?php echo e($item->created_at); ?> </td> 
                            <td class="text-center d-flex">
                                <form id="delete-form-<?php echo e($item->id); ?>"
                                      action="<?php echo e(URL::to('domains', $item->id)); ?>"
                                      method="post">
                                <a href="<?php echo e(URL::to('domains')); ?>"
                                       onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-<?php echo e($item->id); ?>').submit();">
                                <i class="icon-line-trash"></i>
                                </a>
                                
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                </form>
                                <a href="<?php echo e(URL::to('domains/'. $item->id)); ?>" class="adjust-left-margin">
                                    <i class="icon-line2-settings"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="12" class="text-center"> No record found </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/domain/view.blade.php ENDPATH**/ ?>