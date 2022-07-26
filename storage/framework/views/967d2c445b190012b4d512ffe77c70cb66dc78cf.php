

<?php $__env->startSection('nav-menu-guest'); ?>
    <li class="nav-item">
        <a  href="<?php echo e(route('home')); ?>">All Shoes</a>
    </li>
    <?php if(Route::has('register')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
        </li>
    <?php endif; ?>
    <li class="nav-item">
        <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav-menu-user'); ?>
    <li class="nav-item">
        <a href="<?php echo e(route('home')); ?>">All Shoes</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewTransactionHistory"><?php echo e(__('Transaction History')); ?></a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewCart"><?php echo e(__('Cart')); ?></a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav-menu-admin'); ?>
    <li class="nav-item">
        <a href="<?php echo e(route('home')); ?>">All Shoes</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewUserTransaction"><?php echo e(__('All User Transaction')); ?></a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewAllUser"><?php echo e(__('All User')); ?></a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-con">
    <div class="shoes-detail">
        <div class="shoes-detail-img">
            <img class="" src="<?php echo e($shoes->shoe_image); ?>" alt="<?php echo e($shoes->shoe_image); ?>">
        </div>
        <div class="shoes-detail-body">
            <h2><?php echo e($shoes->shoe_name); ?></h2>
            <p class=""><?php echo e($shoes->shoe_description); ?></p>
            <h4 class="">Last bid : Rp. <?php echo e($shoes->shoe_bid); ?></h4>
            <?php if(auth()->guard()->guest()): ?>
                <div class="invalid-feedback">
                    <h4>You need to login to bid.</h4>
                </div>
            <?php else: ?>
                <?php if(auth::check() && auth::user()->role == 0): ?>
                    <form method="GET" action=" <?php echo e(route('bid_shoes', $shoes->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="qty-input"> 
                            
                            <button class="">Bid</button>
                        </div>    
                    </form>             
                <?php else: ?>
                    <?php if(auth::check() && auth::user()->role == 1): ?>
                        <a href="<?php echo e(route('bid_shoes', $shoes->id)); ?>">
                        </a>
                    <?php endif; ?>           
                <?php endif; ?>
            <?php endif; ?>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Binus\Semester 5\Web Programming\Kelas kecil\BP2\JustDuIt_2201745206_2201744802\JustDuIt\resources\views/shoes/shoes_show.blade.php ENDPATH**/ ?>