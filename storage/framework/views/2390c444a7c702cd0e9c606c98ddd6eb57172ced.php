

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
            <h4 class="">Rp<?php echo e($shoes->shoe_price); ?></h4>
            <?php if(auth()->guard()->guest()): ?>
                <div class="invalid-feedback">
                    <h4>You need to login to buy this shoes.</h4>
                </div>
            <?php else: ?>
                <?php if(auth::check() && auth::user()->role == 0): ?>
                    <form method="POST" action=" <?php echo e(route('add_to_cart', $shoes->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="qty-input"> 
                            <input id="quantity" placeholder="Enter Quantity" type="text" class="form-control <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="quantity" value="<?php echo e(old('quantity')); ?>" autofocus>
                            <button class="">Add to Cart</button>
                        </div>    
                    </form>
                    <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  
                <?php else: ?>
                    <?php if(auth::check() && auth::user()->role == 1): ?>
                        <a href="<?php echo e(route('edit_shoes', $shoes->id)); ?>">
                            <button class="edit-shoes-btn">
                                <?php echo e(__('Update shoes')); ?>

                            </button>
                        </a>
                    <?php endif; ?>           
                <?php endif; ?>
            <?php endif; ?>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Binus\Web Programming\Project Lab Web Prog\JustDuIt\resources\views/shoes/shoes_show.blade.php ENDPATH**/ ?>