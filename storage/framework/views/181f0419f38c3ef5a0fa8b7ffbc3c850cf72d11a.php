<?php $__env->startSection('additional_dependencies'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/checkout1Style.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <nav class="checkout-nav">
            <span class="nav-row"><a class="checkout-nav-link" href="#">Obsah kosika</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link" href="../html/checkout2.html">Platba a doprava</a><i
                        class="fas fa-caret-right"></i><a
                        class="checkout-nav-link" href="../html/checkout3.html">Dodacie udaje</a></span>
    </nav>
    <section class="checkout-product-thmbs">
        <?php if(session('cart')): ?>
            <?php $total = 0; ?>
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total += $details['price'] * $details['amount']; ?>
                <hr>
                <article class="checkout-product-thmb">
                    <h3 class="product-name"><?php echo e($details['name']); ?></h3>
                    <i class="fas fa-times deleteProduct" role="button" data-id="<?php echo e($id); ?>"></i>
                    <img class="checkout-product-img"
                         src="<?php echo e(asset('img/'. $details['imgsource'] .'/sxs_side-img.jpg')); ?>">
                    <span class="product-amount"><i class="fa fa-minus remove-one"></i><input class="amount-input" type="text"
                                                                                   value="<?php echo e($details['amount']); ?>"><i
                                class="fa fa-plus add-one"></i></span>
                    <span class="product-price"><?php echo e($details['price']); ?>£</span>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
    <section class="checkout-summary">
        <div class="checkout-texts">
            <div class="checkout-text">Spolu bez DPH</div>
            <div class="checkout-nmb"><?php echo $total*0.8?>£</div>
            <div class="checkout-text">Spolu s DPH</div>
            <div class="checkout-nmb"><?php echo $total?>£</div>
        </div>
        <button class="white-bcg-button" id="nextButton" type="submit">Dalsi krok</button>
    </section>
    <?php else: ?>
        <p>Kosik je prazdny.</p>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('basic_layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>