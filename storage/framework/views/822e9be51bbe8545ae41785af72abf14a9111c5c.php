

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <?php if(count($transactions) > 0): ?>
            <div class="card">
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="text-decoration-none" href="/viewTransactionDetail/<?php echo e($transaction->id); ?>">
                    <?php if(($loop->index+1) % 2 != 0): ?>
                        <div class="card-header bg-danger text-white">Transaction at <?php echo e($transaction->created_at); ?></div>
                    <?php else: ?>
                        <div class="card-header bg-white text-danger">Transaction at <?php echo e($transaction->created_at); ?></div>
                    <?php endif; ?>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <h3>You have no transaction yet</h3>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\phizza-hut\resources\views/transaction/transaction_history.blade.php ENDPATH**/ ?>