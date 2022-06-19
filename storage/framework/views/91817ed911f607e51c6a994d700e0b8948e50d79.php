

<?php $__env->startSection('content'); ?>
<?php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
// dd($domainId);
?>
    <section id="content">
        <h3>Contact us</h3>
            <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>message</th>
                        <th>subject</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td> <?php echo e($item->name); ?> </td>
                            <td> <?php echo e($item->email); ?> </td>
                            <td> <?php echo e($item->phone); ?> </td>
                            <td> <?php echo e($item->message); ?> </td>
                            <td> <?php echo e($item->subject); ?> </td>
                            <td> <?php echo e($item->created_at); ?> </td>
                            <td class="text-center">
                                <form id="delete-form-<?php echo e($item->id); ?>"
                                      action="<?php echo e(URL::to('delete-contact', $item->id)); ?>"
                                      method="post">
                                    <a href="<?php echo e(URL::to('delete-contact')); ?>"
                                       onclick="event.preventDefault();
                                           document.getElementById(
                                           'delete-form-<?php echo e($item->id); ?>').submit();">
                                        <i class="icon-line-trash"></i>
                                    </a>
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                </form>
                            </td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/contact/view.blade.php ENDPATH**/ ?>