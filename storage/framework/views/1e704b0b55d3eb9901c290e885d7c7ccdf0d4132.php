<?php $__env->startSection('additional_dependencies'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/welcomeStyle.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="main-products-section">
       <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="product-thumbnail">
                    <a class="thumbnail-pic" href="<?php echo e(url('products/'.$product->id)); ?>">
                        <img alt="obrazok produktu" src="<?php echo e(asset('img/'. $product->imgsource .'/sxs_main-img.jpg')); ?>">
                    </a>
                    <h1 class="product-name">
                        <a href="<?php echo e(url('products/'.$product->id)); ?>"><?php echo e($product->name); ?></a>
                    </h1>
                        <p class="product-desc"><?php echo e($product->description); ?></p>
                        <p class="product-price"><?php echo e($product->price); ?>£</p>
                    <form type="get" action="<?php echo e(url('checkout1/addToCart')); ?>">
                        <input type="hidden" value="1" name="amnt">
                        <input type="hidden" value="<?php echo e($product->id); ?>" name="id">
                        <button class="white-bcg-button buy-product" type="submit">Pridaj do kosika</button>
                    </form>
                </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
    <div class="carousel">
        <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo e(asset('img/carousel1_xl.jpg')); ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo e(asset('img/carousel2_.jpg')); ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo e(asset('img/carousel3_.jpg')); ?>" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('basic_layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>