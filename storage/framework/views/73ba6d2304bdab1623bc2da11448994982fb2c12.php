

<?php $__env->startSection('title'); ?>
    <title>Home - JustDuIt!</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav-menu-guest'); ?>
    <li class="nav-item">
        <a class="current-page" href="">All Shoes</a>
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
        <a class="current-page" href="">All Shoes</a>
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
        <a class="current-page" href="">All Shoes</a>
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

        <?php if(auth()->guard()->guest()): ?>
            <div class="middle-title">
                <h1>All Shoes</h1>
                <hr>
            </div>  
        <?php else: ?>
            <?php if(!auth::check() || auth::user()->role != 1): ?>
                <div class="middle-title">
                    <h1>All Shoes</h1>
                    <hr>
                </div> 
            <?php else: ?>
                <div class="content-header">
                    <h1>All Shoes</h1>           
                    <a href="/createShoes">
                        <button class="">Add Shoes</button>
                    </a>     
                </div>
            <?php endif; ?>
        <?php endif; ?>
           
        <div class="show-shoes">
            <?php if(auth::check() && auth::user()->role == 1): ?>
                <?php if(count($shoes) > 0): ?>
                    <?php $__currentLoopData = $shoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a  href="/shoeDetail/<?php echo e($shoe->id); ?>">
                            <div class="shoes-card">
                                <img class="" src="<?php echo e($shoe->shoe_image); ?>" alt="<?php echo e($shoe->shoe_image); ?>">
                                <div class="card-body">
                                    <p class="card-title"><?php echo e($shoe->shoe_name); ?></p>
                                    <div class="shoes-price">
                                        <p>Rp<?php echo e($shoe->shoe_bid/10); ?></p>
                                    </div>
                                    
                                    <div class="modify-shoes">                                      
                                        <div class="modify-shoes-buttons">                                           
                                            <form action="/deleteShoes/<?php echo e($shoe->id); ?>">
                                                <button class="delete-shoes-btn">
                                                    <?php echo e(__('Close bid')); ?>

                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="empty-alert">
                        <h2>No Shoes Found :(</h2>
                    </div> 
                <?php endif; ?>
            <?php else: ?>
                <?php if(count($shoes) > 0): ?>
                    <?php $__currentLoopData = $shoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/shoeDetail/<?php echo e($shoe->id); ?>">
                            <div class="shoes-card">
                                <img class="" src="<?php echo e($shoe->shoe_image); ?>" alt="<?php echo e($shoe->shoe_image); ?>">
                                <div class="card-body">
                                    <p class="card-title"><?php echo e($shoe->shoe_name); ?></p>
                                    <div class="shoes-price">
                                        <p>Last bid Rp. <?php echo e($shoe->shoe_bid); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="empty-alert">
                        <h2>No Shoes Found :(</h2>
                    </div>     
                <?php endif; ?>
            <?php endif; ?>
        <div class="paginate-links">
            <?php echo e($shoes->links()); ?>

        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\kaka\Web Prog\Final Project\JustDuIt\resources\views/home.blade.php ENDPATH**/ ?>