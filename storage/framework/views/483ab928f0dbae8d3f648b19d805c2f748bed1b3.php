
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
                <a href="<?php echo e(url('domains/'.$domainId.'/footers')); ?>" class="text-decoration-none text-white btn-sm btn btn-secondary">Back</a>
            </div>
        </div>
    <div class="form-widget">
        <div class="form-result"></div>
        <div class="row">
            <div class="col-lg-12">
                <form class="row" action="<?php echo e(url('domains/'.$domainId.'/footers')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($domainId); ?>" name="domain_id"/>
                    <div class="form-process">
                        <div class="css3-spinner">
                            <div class="css3-spinner-scaler"></div>
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <label>Address Title:</label>
                        <input type="text" name="address_title" class="form-control required" value="" placeholder="Enter address title">
                    </div>
                    <div class="col-6 form-group">
                        <label>Address:</label>
                        <input type="text" name="address" class="form-control required" value="" placeholder="Enter address">
                    </div>
                    <div class="col-6 form-group">
                        <label>Phone:</label>
                        <input type="text" name="phone" class="form-control required" value="" placeholder="Enter phone number">
                    </div>
                    <div class="col-6 form-group">
                        <label>Fax:</label>
                        <input type="text" name="fax" class="form-control required" value="" placeholder="Enter fax">
                    </div>
                    <div class="col-6 form-group">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control required" value="" placeholder="Enter email">
                    </div>
                    <div class="col-6 form-group">
                        <label>Client Text:</label>
                        <input type="text" name="client_text" class="form-control required" value="" placeholder="Enter client text">
                    </div>
                    <div class="col-6 form-group">
                        <label>Facebook Link:</label>
                        <input type="text" name="facebook_link" class="form-control required" value="" placeholder="Enter facebook link">
                    </div>
                    <div class="col-6 form-group">
                        <label>Subscriber Link:</label>
                        <input type="text" name="subscriber_link" class="form-control required" value="" placeholder="Enter subscriber link">
                    </div>
                    <div class="col-6 form-group">
                        <label>Yahoo Link:</label>
                        <input type="text" name="yahoo_link" class="form-control required" value="" placeholder="Enter yahoo link">
                    </div>
                    <div class="col-6 form-group">
                        <label>Pinterest Link:</label>
                        <input type="text" name="pinterest_link" class="form-control required" value="" placeholder="Enter pinterest link">
                    </div>
                    <div class="col-6 form-group">
                        <label>Privacy Link:</label>
                        <input type="text" name="privacy_link" class="form-control required" value="" placeholder="Enter privacy link">
                    </div>
                    <div class="col-6 form-group">
                        <label>Terms & Conditions Link:</label>
                        <input type="text" name="term_link" class="form-control required" value="" placeholder="Enter terms & conditions link">
                    </div>
                    <div class="col-6 form-group">
                        <label>Subscribe Description:</label>
                        <textarea name="subscribe_description" placeholder="Enter subscribe description"
                                    class="form-control required" cols="5" rows="5">
                        </textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label>Description:</label>
                        <textarea name="description" placeholder="Enter description"
                                    class="form-control required" cols="5" rows="5">
                        </textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary">create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OPS-Project\subdomains\resources\views/backoffice/footer/create.blade.php ENDPATH**/ ?>