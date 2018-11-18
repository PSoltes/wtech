<header class="top-navigation-bar">
    <div class="top-navigation-bar-left">
        <a href="<?php echo e(url('/')); ?>"><img alt="Logo lukolandie" src="<?php echo e(asset('img/logo.png')); ?>"></a>
    </div>
    <div class="top-navigation-bar-middle">
        <input type="text" name="searchText">
        <button class="black-bcg-button" type="submit">Hladaj</button>
    </div>
    <div class="top-navigation-bar-right">
        <a class="search-topbar-small" role="button" href=""><i class="fa fa-search"></i></a>
        <?php if(auth()->guard()->guest()): ?>
            <a class="link-topbar-small" role="button" href="<?php echo e(url('/login')); ?>">
                <div class="link-topbar-big">Prihlasenie</div>
                <i class="fas fa-user-circle"></i> </a>
        <?php else: ?>
            <a class="link-topbar-small" href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        <?php endif; ?>
            <a class="link-topbar-small" role="button" href="<?php echo e(url('checkout1')); ?>">
            <div class="link-topbar-big">Nakupny kosik</div>
            <i class="fa fa-shopping-cart"></i> </a>
        <div class="menu-topbar-small" role="button" id="menu-button" onclick="OpenNav()"><i class="fa fa-bars"></i>
        </div>
        <nav class="top-ctg-menu" id="top-ctg-menu">
            <ul>
                <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times"></i>
                    </a></li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('/'. $category->name)); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
    </div>
</header>