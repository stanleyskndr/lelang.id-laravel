

<?php $__env->startSection('nav-menu-guest'); ?>
    <li class="nav-item">
        <a  href="<?php echo e(route('home')); ?>">All Shoes</a>
    </li>
    <?php if(Route::has('register')): ?>
        <li class="nav-item">
            <a class="" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
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
        <a class="current-page" href="/viewCart"><?php echo e(__('Cart')); ?></a>
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
    <div class="middle-title">
        <h2>Cart</h3>
        <hr>
    </div>
    <div class="cart-group">
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="shoes-detail">
                <div class="shoes-detail-img">
                    <img class="" src="<?php echo e($cart->shoes->shoe_image); ?>" alt="<?php echo e($cart->shoes->shoe_image); ?>">
                </div>

                <div class="shoes-detail-body">
                    <h2><?php echo e($cart->shoes->shoe_name); ?></h2>
                    <h4 class="">Rp<?php echo e($cart->shoes->shoe_price); ?></h4>
                    <p class="">Quantity: <?php echo e($cart->quantity); ?></p>
                    <p class="">Total price: Rp<?php echo e($cart->quantity * $cart->shoes->shoe_price); ?></p>
                    <div class="cart-detail-cta">
                        <form method="POST" action=" <?php echo e(route('update_cart', $cart->id)); ?>">  
                            <?php echo csrf_field(); ?>
                            <div class="qty-input">
                                <input id="quantity" placeholder="Update Quantity" type="text" <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="quantity" value="<?php echo e(old('quantity')); ?>" autofocus>
                                <button class="">Update</button>                               
                            </div>
  
                        </form>
                        <form class="delete-cart" method="POST" action=" <?php echo e(route('destroy_cart', $cart->id)); ?>">  
                            <?php echo csrf_field(); ?>
                            <button class="">
                                <img src="/storage/images/trash-white.png" alt="">
                            </button>
                        </form>
                    </div>
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
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($carts) != 0): ?>
            <form method="POST" action=" <?php echo e(route('create_transaction')); ?>">
                <?php echo csrf_field(); ?>
                <div class="checkout-btn">
                    <button class="">Checkout</button>
                </div>
            </form>
        <?php else: ?>
            <div class="empty-alert">
                <img src="/storage/images/empty.png" alt="">
                <h2 class="">Your cart is empty :(</h2>
            </div>
            
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Binus\Web Programming\Project Lab Web Prog\JustDuIt\resources\views/cart/view_cart.blade.php ENDPATH**/ ?>