

<?php $__env->startSection('nav-menu-guest'); ?>
    <li class="nav-item">
        <a href="">Home</a>
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
        <a href="/viewCart">My bids</a>
    </li>
    <li class="nav-item">
        <a href="/viewTransactionHistory">
            <img src="/storage/res/message-icon.png" alt="">
        </a> 
    </li>
    <li class="nav-item">
        <a href="/viewTransactionHistory">
            <img src="/storage/res/notif-icon.png" alt="">
        </a> 
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav-menu-admin'); ?>
    <li class="nav-item">
        <a href="">Home</a>
    </li>
    <li class="nav-item">
        <a class="" href="/viewUserTransaction"><?php echo e(__('All Transaction')); ?></a>
    </li>
    <li class="nav-item">
        <a href="/createShoes">
            <button class="">Create Auction</button>
        </a> 
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <title><?php echo e($shoes->shoe_name); ?> - Lelang.ID</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-con">
    <div class="productpage-con">
        <div class="productpage-upper">
            <div class="productpage-image">
                <img class="" src="<?php echo e($shoes->shoe_image); ?>" alt="<?php echo e($shoes->shoe_image); ?>">
            </div>
            <div class="productpage-body">
                <div class="productpage-header">
                    <h2><?php echo e($shoes->shoe_name); ?></h2>
                    <h5>Brand New</h5>
                </div>
                <hr>
                <div class="productpage-bid">
                    <div class="productpage-bid-detail">
                        <h5>CURRENT BID</h5>
                        <p>Rp<?php echo e($shoes->shoe_bid); ?></p>
                        <h6>By <?php echo e($shoes->user->username); ?></h6>
                    </div>
                    <div class="productpage-bid-detail">
                        <h5>ENDS IN</h5>
                        <div class="bid-countdown">
                            <div id="countdown"></div>
                        </div>
                        <h6>Ends at <?php echo e($shoes->end); ?></h6>      
                    </div> 
                </div>
                <hr>
                <div class="productpage-bid-input">
                    <?php if(auth()->guard()->guest()): ?>
                        <h5>PLACE BID</h5>
                        <div class="invalid-feedback">
                            <h4>You need to login to bid.</h4>
                        </div>
                    <?php else: ?>
                        <?php if(auth::check() && auth::user()->role == 0): ?>
                            
                            <h5>PLACE BID</h5>
                            <?php
                                date_default_timezone_set("Asia/Jakarta");
                                $end = $end;
                                $distance = strtotime($end) - time();
                            ?>

                            <?php if($distance <= 0): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong>You can't place bid on auction that already ended.</strong>
                                </span>
                            <?php else: ?>
                                <form method="POST" action=" <?php echo e(route('update_shoes', $shoes->id)); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-input">
                                        <p>Rp</p>
                                        <input id="bid" type="text" class="form-control <?php $__errorArgs = ['bid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bid" value="<?php echo e($shoes->shoe_bid); ?>" autofocus>
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('Confirm Bid')); ?>

                                        </button> 
                                    </div>
                                    <?php if($errors->any()): ?> <h4 style="color: red;"><?php echo e($errors->first()); ?></h4> 
                                        <?php endif; ?> 
                                    <?php $__errorArgs = ['price'];
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
                                </form>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(auth::check() && auth::user()->role == 1): ?>
                                
                                <h5>CLOSE BID</h5>
                                <div class="close-bid">
                                    <form method="POST" action=" <?php echo e(route('destroy_shoes', $shoes->id)); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <button ><?php echo e(__('Delete Auction')); ?> </button>
                                    </form>
                                </div>     
                            <?php endif; ?>           
                        <?php endif; ?>
                    <?php endif; ?>
                </div>  
            </div>
        </div>

        <div class="productpage-bottom">
            <div class="productpage-desc">
                <h5>DESCRIPTION</h5>
                <p class=""><?php echo e($shoes->shoe_description); ?></p>
            </div>
        </div>
    </div>
</div>

<script>
    CountDownTimer('<?php echo e($start); ?>', 'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new Date('<?php echo e($end); ?>');
        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;
        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = '<b class="color-red">Auction Ended.</b> ';
                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML = days +"d ";
            document.getElementById(id).innerHTML += hours + 'h ';
            document.getElementById(id).innerHTML += minutes + 'm ';
            document.getElementById(id).innerHTML += seconds + 's';
        }
        timer = setInterval(showRemaining, 1000);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Binus\Web Programming\Project Web Lelang.ID\lelangid_final_fix\resources\views/shoes/shoes_show.blade.php ENDPATH**/ ?>