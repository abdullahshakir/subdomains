
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
                <h3>Edit</h3>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo e(url('domains/'.$domainId.'/about')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row" action="<?php echo e(URL::to('domains/'.$domainId.'/about/'.$id['about'])); ?>"
                          method="post" enctype="multipart/form-data">
                          <?php echo method_field('PUT'); ?>
                          <?php echo csrf_field(); ?>
                          <input type="hidden" value="<?php echo e($domainId); ?>" name="domain_id"/>
                          <input type="hidden" value="1" name="is_center"/>
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label>Title:</label>
                            <input type="text" name="title" id="title" class="form-control required"
                                   value="<?php echo e($data['title']); ?>" placeholder="Enter title">
                        </div>
                        <div class="col-12 form-group">
                            <label>Color:</label>
                            <input type="text" name="color" class="form-control required"
                                   value="<?php echo e($data['color']); ?>" placeholder="Enter color">
                        </div>
                        <div class="col-12 form-group">
                            <label>Description:</label>
                            <textarea name="description" id="description" placeholder="Enter description"
                                      class="form-control required" cols="30" rows="5">
                                <?php echo e($data['description']); ?>

                            </textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/about/update.blade.php ENDPATH**/ ?>