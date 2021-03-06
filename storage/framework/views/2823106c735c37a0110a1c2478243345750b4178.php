<?php $__env->startSection('additional_dependencies'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/loginStyle.css')); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <section class="main-forms">
            <form method="post" class="main-forms-inwrapper">
                <h2>Pre prihlasenie zadaj prihlasovacie udaje</h2>
                <div class="form-group">
                    <label for="email-input">Email login</label><input type="text" id="email-input">
                    <label for="heslo-input">Heslo</label><input type="text" id="heslo-input">
                </div>
                <button class="white-bcg-button" type="submit">Prihlas</button>
                <a href="../html/registracia.html">Nie si registrovany?</a>
            </form>
        </section>
        <div class="carousel">
            <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo e(asset('img/carousel1_xl.jpg')); ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo e(asset('img/carousel2.jpg')); ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo e(asset('img/carousel3.jpg')); ?>" alt="Third slide">
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