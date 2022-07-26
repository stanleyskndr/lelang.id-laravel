

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
            <h4 class="">Last bid : Rp. <?php echo e($shoes->shoe_bid); ?> By <?php echo e($shoes->user->username); ?></h4>
            
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

							// clearInterval(timer);
							// document.getElementById(id).innerHTML = '<b>TUGAS SUDAH BERAKHIR</b> ';
							return;
						}
						var days = Math.floor(distance / _day);
						var hours = Math.floor((distance % _day) / _hour);
						var minutes = Math.floor((distance % _hour) / _minute);
						var seconds = Math.floor((distance % _minute) / _second);

						document.getElementById(id).innerHTML = days + 'days ';
						document.getElementById(id).innerHTML += hours + 'hrs ';
						document.getElementById(id).innerHTML += minutes + 'mins ';
						document.getElementById(id).innerHTML += seconds + 'secs';
					}
					timer = setInterval(showRemaining, 1000);
				}
            </script>
            <h4>Auction ends in :</h4>
			<div id="countdown">
            <?php if(auth()->guard()->guest()): ?>
                <div class="invalid-feedback">
                    <h4>You need to login to bid.</h4>
                </div>
            <?php else: ?>
                <?php if(auth::check() && auth::user()->role == 0): ?>
                    <form method="GET" action=" <?php echo e(route('bid_shoes', $shoes->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="qty-input"> 
                            
                            <button class="">Bid</button>
                        </div>    
                    </form>             
                <?php else: ?>
                    <?php if(auth::check() && auth::user()->role == 1): ?>
                        <a href="<?php echo e(route('bid_shoes', $shoes->id)); ?>">
                        </a>
                    <?php endif; ?>           
                <?php endif; ?>
            <?php endif; ?>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Binus\Semester 5\Web Programming\Kelas kecil\BP2\JustDuIt\resources\views/shoes/shoes_show.blade.php ENDPATH**/ ?>