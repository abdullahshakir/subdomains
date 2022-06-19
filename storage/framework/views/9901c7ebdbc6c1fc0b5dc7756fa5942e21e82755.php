
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
                <a href="<?php echo e(url('domains/'.$domainId.'/teams')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="row" action="<?php echo e(url('domains/'.$domainId.'/teams/'. $id['team'])); ?>"
                          method="post" enctype="multipart/form-data">
                          <?php echo method_field('PUT'); ?>
                          <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e(request()->getHost()); ?>" name="domain_name"/>
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" id="" class="form-control required" value="<?php echo e($data['name']); ?>" placeholder="Enter name">
                        </div>
                        <div class="col-6 form-group">
                            <label>Upload:</label>
                            <input type="file" id="jobs-application-resume" name="file"
                                   class="file-loading form-select required" data-show-preview="false"/>
                            <img src="<?php echo e($data['file']); ?>" alt="<?php echo e($data['file']); ?>"
                                class="mt-2" width="100" />
                        </div>
                        <div class="col-6 form-group">
                            <label>Designation:</label>
                            <input type="text" name="designation" id="" class="form-control required"
                                   value="<?php echo e($data['designation']); ?>" placeholder="Enter designation">
                        </div>
                        <div class="col-6 form-group">
                            <label>Facebook Link:</label>
                            <input type="text" name="facebook_link" id="" class="form-control required"
                                   value="<?php echo e($data['facebook_link']); ?>" placeholder="Enter facebook link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Google Link: </label>
                            <input type="text" name="google_link" id="" class="form-control required"
                                   value="<?php echo e($data['google_link']); ?>" placeholder="Enter google link">
                        </div>
                        <div class="col-6 form-group">
                            <label>Twitter Link:</label>
                            <input type="text" name="twitter_link" id="" class="form-control required"
                                   value="<?php echo e($data['twitter_link']); ?>" placeholder="Enter twitter link">
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea name="description"
                                          placeholder="Enter description" class="form-control
                                          required" cols="5" rows="5">
                                    <?php echo e($data['description']); ?>

                                </textarea>
                            </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/team/update.blade.php ENDPATH**/ ?>