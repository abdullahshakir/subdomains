
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
                <h3>Footer</h3>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo e(url('domains/'.$domainId.'/footers/create')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
            </div>
        </div>
        <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Address Title</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Email</th>
                        <th>Download Text</th>
                        <th>Total Downloads</th>
                        <th>Total Clients</th>
                        <th>Client Text</th>
                        <th>Subscribe Description</th>
                        <th>Subscriber Link</th>
                        <th>Facebook Link</th>
                        <th>Yahoo Link</th>
                        <th>Pinterest Link</th>
                        <th>Privacy Link</th>
                        <th>Term & Condition Link</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php if($data != null): ?>
                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td> <?php echo e($item['address_title']); ?> </td>
                            <td> <?php echo e($item['address']); ?> </td>
                            <td> <?php echo e($item['phone']); ?> </td>
                            <td> <?php echo e($item['fax']); ?> </td>
                            <td> <?php echo e($item['email']); ?> </td>
                            <td> <?php echo e($item['download_text']); ?></td>
                            <td> <?php echo e($item['total_download']); ?> </td>
                            <td> <?php echo e($item['total_client']); ?> </td>
                            <td> <?php echo e($item['client_text']); ?> </td>
                            <td> <?php echo e($item['subscribe_description']); ?> </td>
                            <td> <?php echo e($item['facebook_link']); ?> </td>
                            <td> <?php echo e($item['facebook_link']); ?> </td>
                            <td> <?php echo e($item['yahoo_link']); ?> </td>
                            <td> <?php echo e($item['pinterest_link']); ?> </td>
                            <td> <?php echo e($item['term_link']); ?> </td>
                            <td> <?php echo e($item['privacy_link']); ?> </td>
                            <td class="text-center">
                                        
                            
                            <a href="<?php echo e(URL::to('footers/'.$key.'/edit')); ?>">
                                <i class="icon-line-edit"></i>
                            </a>
                                
                        </td>
                    
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="16" class="text-center"> No record found </td>
                        </tr>
                    <?php endif; ?>
                    <?php endif; ?>
                </tbody>
                </table>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/footer/view.blade.php ENDPATH**/ ?>