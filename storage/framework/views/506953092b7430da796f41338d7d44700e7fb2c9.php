
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
                <a href="<?php echo e(url('domains/'.$domainId.'/portfolios')); ?>"
                   class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <form action="<?php echo e(url('domains/'.$domainId.'/portfolios')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e(request()->getHost()); ?>" name="domain_name"/>
                    <div class="form-process">
                        <div class="css3-spinner">
                            <div class="css3-spinner-scaler"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <label>Tile:</label>
                            <input type="text" name="title" id="title" class="form-control required" 
                                    placeholder="Enter title">
                        </div>
                        <div class="col-12 form-group">
                            <label>Type:</label>
                            <input type="text" name="type" id="type" class="form-control required" 
                                    placeholder="Enter type">
                        </div>
                        <div class="col-12 form-group">
                            <label>Category:</label>
                            <input type="text" name="category" id="category" class="form-control required" 
                                    placeholder="Enter category">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="form-group">
                                <label>Upload:</label>
                                <input type="file" id="jobs-application-resume" name="file"
                                       class="file-loading form-select required" data-show-preview="false"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary">create</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/portfolio/create.blade.php ENDPATH**/ ?>