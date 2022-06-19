

<?php $__env->startSection('content'); ?>
<?php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
// dd($domainId);
?>
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Feature</h3>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo e(url('domains/'.$domainId.'/features/create')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>            
        <div class="table-responsive">
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($data != null): ?>
                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td> <?php echo e($item['title']); ?> </td>
                        <td> <?php echo e($item['description']); ?> </td>
                        <td>
                            <img src="<?php echo e($item['file']); ?>"
                                    alt="<?php echo e($item['file']); ?>"
                                    width="100"
                            >
                        </td>
                        
                        <td class="text-center">
                            
                            
                            <a href="<?php echo e(URL::to('domains/'.$domainId.'/features/'.$key.'/edit')); ?>">
                                <i class="icon-line-edit"></i>
                            </a>
                                
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="12" class="text-center"> No record found </td>
                    </tr>
                <?php endif; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/feature/view.blade.php ENDPATH**/ ?>