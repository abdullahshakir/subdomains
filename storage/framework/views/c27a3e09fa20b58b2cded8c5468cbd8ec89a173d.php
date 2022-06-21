<div class="section mb-0" data-spy="scroll" data-target="#navbar" data-offset="0">
    <div class="container">
        <h3 id="gallery">Gallery</h3>
        <div class="divider"><i class="icon-circle"></i></div>
        <div class="masonry-thumbs grid-container grid-6" data-big="3" data-lightbox="gallery">
            <?php $__empty_1 = true; $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a class="grid-item" href="<?php echo e($images['file']); ?>" data-lightbox="gallery-item">
                <img src="<?php echo e($images['file']); ?>"
                     alt="<?php echo e($images['file']); ?>"
                     width="100"
                >
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center">Not record found</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\OPS-Project\subdomains\resources\views/pages/gallery.blade.php ENDPATH**/ ?>