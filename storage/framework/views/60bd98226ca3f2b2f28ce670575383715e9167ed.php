<?php $__env->startSection('additional_dependencies'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/productDetailStyle.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="product-info">
        <img class="main-img"
             srcset="<?php echo e(asset('img/'. $product->imgsource .'/xl_main-img.jpg')); ?> 950w,
                        <?php echo e(asset('img/'. $product->imgsource .'/l_main-img.jpg')); ?> 380w,
                        <?php echo e(asset('img/'. $product->imgsource .'/m_main-img.jpg')); ?> 450w,
                        <?php echo e(asset('img/'. $product->imgsource .'/sxs_main-img.jpg')); ?> 300w"
             sizes="(min-width: 1200px) 37vw,
                        (min-width: 992px) and (max-width: 1199px) 37vw,
                        (min-width: 768px) and (max-width: 991px) 58vw,
                        95vw"
             src="<?php echo e(asset('img/'. $product->imgsource .'/sxs_main-img.jpg')); ?>">
        <img class="side-img1"
             srcset="<?php echo e(asset('img/'. $product->imgsource .'/xl_side-image.jpg')); ?> 475w,
                        <?php echo e(asset('img/'. $product->imgsource .'/l_side-image.jpg')); ?> 190w,
                        <?php echo e(asset('img/'. $product->imgsource .'/m_side-image.jpg')); ?> 225w,
                        <?php echo e(asset('img/'. $product->imgsource .'/sxs_side-img.jpg')); ?> 150w"
             sizes="(min-width: 1200px) 18.5vw,
                        (min-width: 992px) and (max-width: 1199px) 18.5vw,
                        (min-width: 768px) and (max-width: 991px) 29vw,
                        47.5vw"
             src="<?php echo e(asset('img/'. $product->imgsource .'/sxs_side-img.jpg')); ?>">
        <img class="side-img2"
             srcset="<?php echo e(asset('img/'. $product->imgsource .'/xl_side-image.jpg')); ?> 475w,
                        <?php echo e(asset('img/'. $product->imgsource .'/l_side-image.jpg')); ?> 190w,
                        <?php echo e(asset('img/'. $product->imgsource .'/m_side-image.jpg')); ?> 225w,
                        <?php echo e(asset('img/'. $product->imgsource .'/sxs_side-img.jpg')); ?> 150w"
             sizes="(min-width: 1200px) 18.5vw,
                        (min-width: 992px) and (max-width: 1199px) 18.5vw,
                        (min-width: 768px) and (max-width: 991px) 29vw,
                        47.5vw"
             src="<?php echo e(asset('img/'. $product->imgsource .'/sxs_side-img.jpg')); ?>">
        <h2 class="product-name"><?php echo e($product->name); ?></h2>
        <span class="rating-big">
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star"></i>
            </span>
        <p class="product-desc"><?php echo e($product->description); ?></p>
        <span class="product-price"><?php echo e($product->price); ?>£</span>
        <form type="GET" class="add-to-cart" action="<?php echo e(url('checkout1/addToCart')); ?>">
        <span class="product-amount"><i class="fa fa-plus" onclick="increaseInput()"></i><input class="amount-input"
                                                                                                type="text" name="amnt" value="1"><i
                    class="fa fa-minus" onclick="decreaseInput()"></i></span>
            <input type="hidden" value="<?php echo e($product->id); ?>" name="id">
            <button class="white-bcg-button" id="buyButton" type="submit">Pridaj do kosika</button>
        </form>
    </section>
    <section class="add-review">
        <h2>Pridaj recenziu</h2>
        <form method="POST">
            <textarea class="new-review"></textarea>
            <span class="add-review-controls">
                    <span class="rating"><i class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i
                                class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i
                                class="fa fa-star"></i>
                    </span>
                    <button class="white-bcg-button" id="addReview" type="submit">Pridaj recenziu</button>
                </span>
        </form>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('basic_layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>