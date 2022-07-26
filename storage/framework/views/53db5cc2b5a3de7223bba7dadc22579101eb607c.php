

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
        <a class="current-page"  href="/viewTransactionHistory"><?php echo e(__('Transaction History')); ?></a>
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
        <a class="current-page"  href="/viewUserTransaction"><?php echo e(__('All User Transaction')); ?></a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewAllUser"><?php echo e(__('All User')); ?></a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-con">
    <div class="middle-title">
        <h2>Transaction History</h2>
        <hr>
    </div>
    
    <div class="transaction-group">
        <?php if(count($transaction) > 0): ?>
            <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="" href="/viewTransactionDetail/<?php echo e($transaction->id); ?>">
                    <div class="transaction-con">
                        <div class="transaction-detail">
                            <h4>Transaction at <?php echo e($transaction->created_at); ?></h4>
                            <?php
                                $totalPrice = 0;
                            ?>
                            <?php $__currentLoopData = $transaction->transactionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $shoeQuantity = $trans->quantity;
                                    $shoePrice = $trans->shoes->shoe_price;
                                    $totalPrice = $totalPrice + ($shoeQuantity * $shoePrice);
                                ?>      
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <p>Total Price: Rp<?php echo e($totalPrice); ?></p>
                        </div>

                        <div class="transaction-img">
                            <?php $__currentLoopData = $transaction->transactionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e($trans->shoes->shoe_image); ?>" alt="">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="empty-alert">
                <img src="/storage/images/empty.png" alt="">
                <h2 class="">Your don't have any transaction :(</h2>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Binus\Web Programming\Project Web Lelang.ID\Lelang.ID Laravel Frontend\lelangid_final\resources\views/transaction/transaction_history.blade.php ENDPATH**/ ?>