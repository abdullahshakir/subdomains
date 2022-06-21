<div class="section mb-0" data-spy="scroll" data-target="#navbar" data-offset="0">
    <div class="container">
        <h3 id="portfol">Portfolio</h3>
        <div class="divider"><i class="icon-circle"></i></div>
        <div class="grid-filter-wrap">
            <ul class="grid-filter" data-container="#portfolio">
                <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
                
            </ul>
            <div class="grid-shuffle" data-container="#portfolio">
                <i class="icon-random"></i>
            </div>
        </div>
        <div id="portfolio" class="portfolio row grid-container g-0" data-layout="fitRows">
            <?php $__empty_1 = true; $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 media <?php echo e($item['type']); ?>">
                <div class="grid-inner">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="<?php echo e($item['file']); ?>" alt="<?php echo e($item['file']); ?>">
                        </a>
                        <div class="bg-overlay">
                            <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                <a href="<?php echo e($item['file']); ?>" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Image"><i class="icon-line-plus"></i></a>
                                <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                            </div>
                            <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html"><?php echo e($item['title']); ?></a></h3>
                        <span><a href="#"><?php echo e($item['category']); ?></a></span>
                    </div>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="12" class="text-center"> No record found </td>
                </tr>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH D:\OPS-Project\subdomains\resources\views/pages/portfolio.blade.php ENDPATH**/ ?>