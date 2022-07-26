

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-xl">
        <div class="card p-4">
            <div class="row">
                <div class="col-sm-5 d-flex align-items-center">
                    <img class="card-img-top" src="<?php echo e($pizza->pizza_image); ?>" alt="<?php echo e($pizza->pizza_image); ?>">
                </div>
                <div class="col-sm">
                    <div class="card-body">
                        <h3><?php echo e($pizza->pizza_name); ?></h3>
                        <div class="mt-2"><?php echo e($pizza->pizza_description); ?></div>
                        <div class="mt-1">Rp. <?php echo e($pizza->pizza_price); ?></div>
                        <?php if(auth::check() && auth::user()->isAdmin == 0): ?>
                            <form method="POST" action=" <?php echo e(route('add_to_cart', $pizza->id)); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="form-group row mt-5">
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
                                <button class="btn btn-primary">Add to Cart</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\phizza-hut\resources\views/pizza/pizza_show.blade.php ENDPATH**/ ?>