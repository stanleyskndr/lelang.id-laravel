

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
                <form method="POST" action=" <?php echo e(route('destroy_shoes', $shoes->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <h3><?php echo e($shoes->shoe_name); ?></h3>
                    <div class="mt-2"><?php echo e($shoes->shoe_description); ?></div>
                    <div class="mt-1">Rp. <?php echo e($shoes->shoe_price); ?></div>
                    <button class="btn btn-danger    mt-3"><?php echo e(__('Delete Shoes')); ?> </button>
                </form>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Binus\Semester 5\Web Programming\Kelas kecil\BP2\JustDuIt_2201745206_2201744802\JustDuIt\resources\views/shoes/delete_shoes.blade.php ENDPATH**/ ?>