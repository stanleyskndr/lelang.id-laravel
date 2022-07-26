

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-xl">
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card p-4 mt-4">
                <div class="row">
                    <div class="col-sm-5 d-flex align-items-center">
                        <img class="card-img-top" src="<?php echo e($cart->pizza->pizza_image); ?>" alt="<?php echo e($cart->pizza->pizza_image); ?>">
                    </div>
                    <div class="col-sm">
                        <div class="card-body">
                            <h3><?php echo e($cart->pizza->pizza_name); ?></h3>
                            <div class="mt-2">Rp. <?php echo e($cart->pizza->pizza_price); ?></div>
                            <div class="mt-2">Quantity: <?php echo e($cart->quantity); ?></div>
                            <form method="POST" action=" <?php echo e(route('update_cart', $cart->id)); ?>">  
                                <?php echo csrf_field(); ?>
                                <div class="form-group row mt-3">
                                    <label for="quantity" class="col-md-3 col-form-label"><?php echo e(__('Quantity:')); ?></label>

                                    <div class="col-md-8">
                                        <input id="quantity" type="text" class="form-control <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="quantity" value="<?php echo e(old('quantity')); ?>" autofocus>

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
                                <button class="btn btn-primary mt-3">Update Quantity</button>
                            </form>
                            <form method="POST" action=" <?php echo e(route('destroy_cart', $cart->id)); ?>">  
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger mt-3">Delete From Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($carts) != 0): ?>
            <form method="POST" action=" <?php echo e(route('create_transaction')); ?>">
                <?php echo csrf_field(); ?>
                <div class="text-center"><button class="btn btn-dark btn-block p-2 mt-3">Checkout</button></div>
            </form>
        <?php else: ?>
            <h2 class="text-center mt-2">You don't have any pizza in your cart</h2>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\phizza-hut\resources\views/cart/view_cart.blade.php ENDPATH**/ ?>