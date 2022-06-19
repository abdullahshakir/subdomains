

<?php $__env->startSection('content'); ?>
<?php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
?>
    <section id="content">
        
        <div id="myTabContent2" class="tab-content">
            <div class="tab-pane fade show " id="home2">
                <div class="row">
                    <div class="col-6">
                        <h3>Team</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="<?php echo e(url('domains/'.$domainId.'/teams')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center">
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
            </div>
            <div class="tab-pane active show fade" id="profile2">
                <div class="row">
                    <div class="col-6">
                        <h3>Team Members</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="<?php echo e(url('domains/'.$domainId.'/teams/create')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>File</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Facebook</th>
                            <th>Google</th>
                            <th>Twitter</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                
                                <td> <?php echo e($item['name']); ?> </td>
                                <td>
                                    <img src="<?php echo e($item['file']); ?>"
                                        alt="<?php echo e($item['file']); ?>"
                                        width="100"
                                    >
                                </td>
                                <td> <?php echo e($item['designation']); ?> </td>
                                <td> <?php echo e($item['description']); ?> </td>
                                <td> <?php echo e($item['facebook_link']); ?> </td>
                                <td> <?php echo e($item['google_link']); ?> </td>
                                <td> <?php echo e($item['twitter_link']); ?> </td>
                                <td class="text-center">
                                    
                                    
                                    <a href="<?php echo e(URL::to('ratings/'.$key.'/edit')); ?>">
                                        <i class="icon-line-edit"></i>
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
            </div>
         </div>
    </section>
    <script src="<?php echo e(URL::asset('assets/js/functions.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/team/view.blade.php ENDPATH**/ ?>