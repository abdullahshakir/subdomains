
<?php $__env->startSection('content'); ?>
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Theme</h3>
            </div>
            <div class="col-6 text-end">
                <?php if(auth()->user()->is_admin): ?>
                    <a href="<?php echo e(route('sub-domain.create')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td> <?php echo e($item->name); ?> </td>
                            <td> <?php echo e($item->created_at); ?> </td>
                            <td class="text-center">
                                <form id="delete-form-<?php echo e($item->id); ?>"
                                      action="<?php echo e(URL::to('sub-domain/'.$item->id)); ?>"
                                      method="post">
                                    <a href="<?php echo e(URL::to('sub-domain.destroy')); ?>"
                                       onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-<?php echo e($item->id); ?>').submit();">
                                        <i class="icon-line-trash"></i>
                                    </a>
                                    <a href="<?php echo e(URL::to('sub-domain/'.$item->id.'/edit')); ?>">
                                        <i class="icon-line-edit"></i>
                                    </a>
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/theme/view.blade.php ENDPATH**/ ?>