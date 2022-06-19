
<?php $__env->startSection('content'); ?>
<?php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
?>
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>Edit</h3>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo e(url('domains/'.$domainId.'/sliders')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        $id = request()->route()->parameters()   
                    ?>
                    <form class="row" action="<?php echo e(url('domains/'.$domainId.'/sliders/'. $id['slider'])); ?>"
                          method="post" enctype="multipart/form-data">
                          <?php echo method_field('PUT'); ?>
                          <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e(request()->getHost()); ?>" name="domain_name"/>
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
                            <label>SubTitle:</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control required"
                                   value="<?php echo e($data['sub_title']); ?>" placeholder="Enter subtitle">
                        </div>
                        <div class="form-group">
                            <label>Upload:</label>
                            <input type="file" id="jobs-application-resume" name="file" class="file-loading form-select required" data-show-preview="false" />
                                <img src="<?php echo e($data['file']); ?>" alt="<?php echo e($data['file']); ?>"
                                    class="mt-2" width="100" />
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/slider/update.blade.php ENDPATH**/ ?>