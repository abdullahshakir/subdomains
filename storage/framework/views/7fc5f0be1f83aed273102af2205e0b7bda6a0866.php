
<?php $__env->startSection('content'); ?>
<?php
$id = request()->route()->parameters();
$default = '/';
$domainId = $id != null ? $id['domain'] : $default;
?>
    <section id="content">
        <div class="row">
            <div class="col-6">
                <h3>About</h3>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo e(url('domains/'.$domainId.'/about')); ?>"
                   class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row" action="<?php echo e(url('domains/'.$domainId.'/about')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($domainId); ?>" name="domain_id"/>
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label>Tile:</label>
                            <input type="text" name="title" id="title" class="form-control required" value=""
                                   placeholder="Enter title">
                        </div>
                        <div class="col-12 form-group">
                            <label>Color:</label>
                            <input type="text" name="color" class="form-control required" value=""
                                   placeholder="Enter color">
                        </div>
                        <div class="col-12 form-group">
                            <div class="row">
                                <div class="w-100"></div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea id="" name="description"
                                              placeholder="Enter description" class="form-control
                                              required" cols="30" rows="7">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary">create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/about/create.blade.php ENDPATH**/ ?>