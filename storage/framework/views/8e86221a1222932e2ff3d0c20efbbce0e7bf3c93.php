

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
        <h2>All User Transaction</h2>
        <hr>
    </div> 
    <?php if(count($transactions) > 0): ?>
        <div class="cart-group">
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="" href="/viewTransactionDetail/<?php echo e($transaction->id); ?>">
                    <div class="admin-trans-con">
                        <div class="admin-trans-img">
                            <?php $__currentLoopData = $transaction->transactionDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e($trans->shoes->shoe_image); ?>" alt="">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="admin-trans-body">
                            <h4>Transaction at <?php echo e($transaction->created_at); ?></h4>
                            <p>User: <?php echo e($transaction->userDetail->username); ?> (<?php echo e($transaction->userDetail->id); ?>)</p>
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
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <h3>You have no transaction yet</h3>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Binus\Web Programming\Project Web Lelang.ID\Lelang.ID Laravel Frontend\lelangid_final\resources\views/admin_management/view_user_transaction.blade.php ENDPATH**/ ?>