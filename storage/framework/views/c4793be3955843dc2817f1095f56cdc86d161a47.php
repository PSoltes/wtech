<?php $__env->startSection('additional_dependencies'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/categoryPreviewStyle.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form class="filtre" id="filtre" method="get">
        <div class="price-range-filter">
            <div class="input-group-custom">
                <label for="price-box1">Cena od</label><input type="text" class="form-control" id="price-box1"
                                                              name="priceFrom" value="<?php echo e($filter['priceFrom']); ?>">
            </div>
            <div class="input-group-custom">
                <label for="price-box2">Cena do</label><input type="text" class="form-control" id="price-box2"
                                                              name="priceTo" value="<?php echo e($filter['priceTo']); ?>">
            </div>
        </div>
        <div class="order-filter">
            <span class="radio"><b>Zoradit podla:</b></span>
            <span class="radio"><input type="radio" id="cheapest" name="order" value="asc" <?php if($filter['order'] == 'asc') echo 'checked';?>><label for="cheapest">Najlacnejsie</label></span>
            <span class="radio"><input type="radio" id="expensive" name="order" value="desc" <?php if($filter['order'] == 'desc') echo 'checked';?>><label for="expensive">Najdrahsie</label></span>
            <span class="radio"><input type="radio" id="popular" name="order" value="pop" <?php if($filter['order'] == 'pop') echo 'checked';?>><label for="popular">Najoblubenejsie</label></span>
        </div>
        <div class="input-group-custom">
            <button type="submit" class="white-bcg-button filter-submit-button">Filtruj</button>
        </div>
    </form>
    <section class="main-products-section">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="product-thumbnail">
                <a class="thumbnail-pic" href="<?php echo e(url('products/'.$product->id)); ?>">
                    <img alt="obrazok produktu" src="<?php echo e(asset('img/'. $product->imgsource .'/sxs_main-img.jpg')); ?>">
                </a>
                <h1 class="product-name">
                    <a href="<?php echo e(url('products/'.$product->id)); ?>"><?php echo e($product->name); ?></a>
                </h1>
                <p class="product-desc"><?php echo e($product->description); ?></p>
                <p class="product-price"><?php echo e($product->price); ?>£</p>
                <form type="get" class="add-to-cartForm" action="<?php echo e(url('checkout1/addToCart')); ?>">
                    <input type="hidden" value="1" name="amnt">
                    <input type="hidden" value="<?php echo e($product->id); ?>" name="id">
                    <button class="white-bcg-button buy-product" type="submit">Pridaj do kosika</button>
                </form>
            </article>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>V tejto sekcii nie su ziadne produkty</p>
        <?php endif; ?>
    </section>
    <nav class="pagination-wrapper">
        <?php echo e($products->links()); ?>

    </nav>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('basic_layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>