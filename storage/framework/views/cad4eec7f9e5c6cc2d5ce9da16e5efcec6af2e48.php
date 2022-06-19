

<?php $__env->startSection('content'); ?>
<?php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
// dd($domainId);
?>
    <section id="content">
        <ul id="myTab2" class="nav nav-pills boot-tabs">
            <li class="nav-item"><a class="nav-link active" href="#home2" data-bs-toggle="tab">Team</a></li>
            <li class="nav-item"><a class="nav-link" href="#profile2" data-bs-toggle="tab">Team Members</a></li>
        </ul>
        <div id="myTabContent2" class="tab-content">
            <div class="tab-pane fade show active" id="home2">
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
                            <th>Subtitle</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td> <?php echo e($item->title); ?> </td>
                                <td> <?php echo e($item->sub_title); ?> </td>
                                <td> <?php echo e($item->created_at); ?> </td>
                                <td class="text-center">
                                    <form id="delete-form-<?php echo e($item->id); ?>"
                                          action="<?php echo e(URL::to('delete-team', $item->id)); ?>"
                                          method="post">
                                        <a href="<?php echo e(URL::to('delete-team')); ?>"
                                           onclick="event.preventDefault();
                                               document.getElementById(
                                               'delete-form-<?php echo e($item->id); ?>').submit();">
                                            <i class="icon-line-trash"></i>
                                        </a>
                                        <a href="<?php echo e(URL::to('edit-team/'.$item->id)); ?>">
                                            <i class="icon-line-edit"></i>
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
            </div>
            <div class="tab-pane fade" id="profile2">
                <div class="row">
                    <div class="col-6">
                        <h3>Team Members</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="<?php echo e(url('domains/'.$domainId.'/teams')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Create</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>TeamTitle</th>
                            <th>Name</th>
                            <th>File</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Facebook</th>
                            <th>Google</th>
                            <th>Twitter</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td> <?php echo e($item->team->title); ?> </td>
                                <td> <?php echo e($item->name); ?> </td>
                                <td>
                                    <img src="<?php echo e($item->file); ?>"
                                         alt="<?php echo e($item->file); ?>"
                                         width="100"
                                    >
                                </td>
                                <td> <?php echo e($item->designation); ?> </td>
                                <td> <?php echo e($item->description); ?> </td>
                                <td> <?php echo e($item->facebook_link); ?> </td>
                                <td> <?php echo e($item->google_link); ?> </td>
                                <td> <?php echo e($item->twitter_link); ?> </td>
                                <td> <?php echo e($item->created_at); ?> </td>
                                <td class="text-center">
                                    <form id="delete-form-<?php echo e($item->id); ?>"
                                          action="<?php echo e(URL::to('delete-team', $item->id)); ?>"
                                          method="post">
                                        <a href="<?php echo e(URL::to('delete-team')); ?>"
                                           onclick="event.preventDefault();
                                               document.getElementById(
                                               'delete-form-<?php echo e($item->id); ?>').submit();">
                                            <i class="icon-line-trash"></i>
                                        </a>
                                        <a href="<?php echo e(URL::to('edit-team-members/'.$item->id)); ?>">
                                            <i class="icon-line-edit"></i>
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
            </div>
         </div>
    </section>
    <script src="<?php echo e(URL::asset('assets/js/functions.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/team/view.blade.php ENDPATH**/ ?>