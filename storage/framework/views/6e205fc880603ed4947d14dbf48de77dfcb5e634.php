

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
                        <form method="POST" action=" <?php echo e(route('destroy_pizza', $pizza->id)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <h3><?php echo e($pizza->pizza_name); ?></h3>
                            <div class="mt-2"><?php echo e($pizza->pizza_description); ?></div>
                            <div class="mt-1">Rp. <?php echo e($pizza->pizza_price); ?></div>
                            <button class="btn btn-danger    mt-3"><?php echo e(__('Delete Pizza')); ?> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\phizza-hut\resources\views/pizza/delete_pizza.blade.php ENDPATH**/ ?>