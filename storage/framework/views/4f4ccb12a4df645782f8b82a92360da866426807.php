<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('basic_layout.parts.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('additional_dependencies'); ?>
</head>
<body>
<div class="wrapper-container">
    <?php echo $__env->make('basic_layout.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <main class="content">
        <?php echo $__env->make('basic_layout.parts.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>

    </main>
    <?php echo $__env->make('basic_layout.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php echo $__env->make('basic_layout.parts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
