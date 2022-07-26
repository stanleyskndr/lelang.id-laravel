

<?php $__env->startSection('title'); ?>
    <title>Home - Lelang.ID</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav-menu-guest'); ?>
    <li class="nav-item">
        <a class="current-page" href="">Home</a>
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
        <a class="current-page" href="">Home</a>
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

<?php $__env->startSection('content'); ?>
    <div class="content-con">
        <div class="slider-con">
            <div class="carousel-item">
                <img class="d-block w-100" src="/storage/res/slider1.png" alt="Second slide">
            </div>
        </div>
           
        <div class="section-con">
            <div class="section-header">
                <h3>Top Categories</h3>
                <div class="see-all-con">
                    <p>See all</p>
                    <img src="/storage/res/down-arrow-yellow.png" alt="">
                </div>
            </div>
            <div class="cats-con">
                <div class="cat-con">
                    <p>Sneakers</p>
                    <img src="/storage/res/cat-pic1.png" alt="">
                </div>
                <div class="cat-con">
                    <p>Electronics</p>
                    <img src="/storage/res/cat-pic2.png" alt="">
                </div>
                <div class="cat-con">
                    <p>Bicycle</p>
                    <img src="/storage/res/cat-pic3.png" alt="">
                </div>
                <div class="cat-con">
                    <p>Watch</p>
                    <img src="/storage/res/cat-pic4.png" alt="">
                </div>
                <div class="cat-con">
                    <p>Fashion Acc.</p>
                    <img src="/storage/res/cat-pic5.png" alt="">
                </div>
                <div class="cat-con">
                    <p>Branded Apparel</p>
                    <img src="/storage/res/cat-pic6.png" alt="">
                </div>
            </div>
        </div>

        <div class="section-con">
            <?php if(auth::check() && auth::user()->role == 1): ?>
                <div class="section-header">
                    <h3>Ongoing Auctions</h3>
                </div>
                <div class="auctions-con">
                    <?php if(count($shoes) > 0): ?>
                        <?php $__currentLoopData = $shoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $end = $shoe->end;
                            $distance = strtotime($end) - time();
                        ?>

                        <?php if($distance > 0): ?>
                            <a  href="/shoeDetail/<?php echo e($shoe->id); ?>">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img class="" src="<?php echo e($shoe->shoe_image); ?>" alt="<?php echo e($shoe->shoe_image); ?>">
                                    </div> 
                                    <div class="product-countdown">
                                        <img src="/storage/res/time-icon.png" alt="">
                                        <script>
                                            CountDownTimer('<?php echo e($shoe->start); ?>', 'countdown');
                                            function CountDownTimer(dt, oldid)
                                            {
                                                var id = oldid.concat('<?php echo e($shoe->id); ?>') 
                                                var end = new Date('<?php echo e($shoe->end); ?>');
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
                                        
                                                    document.getElementById(id).innerHTML = days + "d ";
                                                    document.getElementById(id).innerHTML += hours + 'h ';
                                                    document.getElementById(id).innerHTML += minutes + 'm ';
                                                    document.getElementById(id).innerHTML += seconds + 's';
                                                }
                                                timer = setInterval(showRemaining, 1000);
                                            }
                                        </script>
                                        <p id="countdown<?php echo e($shoe->id); ?>"></p>
                                    </div>  
                                    <div class="product-body">
                                        <p class="card-title"><?php echo e($shoe->shoe_name); ?></p>
                                        <div class="product-detail">
                                            <div class="product-bid">
                                                <h6>CURRENT BID</h6>
                                                <p>Rp<?php echo e($shoe->shoe_bid/10); ?></p>
                                            </div>               
                                            <div class="close-bid">                                                                            
                                                <form action="/shoeDetail/<?php echo e($shoe->id); ?>">
                                                    <button class="delete-shoes-btn">
                                                        <?php echo e(__('Close bid')); ?>

                                                    </button>
                                                </form>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="empty-alert">
                            <h2>No Shoes Found :(</h2>
                        </div> 
                    <?php endif; ?>
                </div> 
                <div class="section-header">
                    <h3>Ended Auctions</h3>
                </div>
                <div class="auctions-con">
                    <?php if(count($shoes) > 0): ?>
                        <?php $__currentLoopData = $shoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $end = $shoe->end;
                            $distance = strtotime($end) - time();
                        ?>

                        <?php if($distance <= 0): ?>
                            <a  href="/shoeDetail/<?php echo e($shoe->id); ?>">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img class="" src="<?php echo e($shoe->shoe_image); ?>" alt="<?php echo e($shoe->shoe_image); ?>">
                                    </div> 
                                    <div class="product-countdown auction-ended">
                                        <img src="/storage/res/time-icon.png" alt="">
                                        <p>Ended</p>
                                    </div>  
                                    <div class="product-body">
                                        <p class="card-title"><?php echo e($shoe->shoe_name); ?></p>
                                        <div class="product-detail">
                                            <div class="product-bid">
                                                <h6>CURRENT BID</h6>
                                                <p>Rp<?php echo e($shoe->shoe_bid/10); ?></p>
                                            </div>               
                                            <div class="close-bid">                                                                            
                                                <form action="/shoeDetail/<?php echo e($shoe->id); ?>">
                                                    <button class="delete-shoes-btn">
                                                        <?php echo e(__('Close bid')); ?>

                                                    </button>
                                                </form>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="empty-alert">
                            <h2>No Shoes Found :(</h2>
                        </div> 
                    <?php endif; ?>
                </div>      
            <?php else: ?>
                <div class="section-header">
                    <h3>Ongoing Auctions</h3>
                </div>
                <div class="auctions-con">
                    <?php if(count($shoes) > 0): ?>
                        <?php $__currentLoopData = $shoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                date_default_timezone_set("Asia/Jakarta");
                                $now = date('d-m-y H:i:s', time());
                                $end = $shoe->end;
                                $distance = strtotime($end) - time();
                            ?>

                            <?php if($distance > 0): ?>
                                <a href="/shoeDetail/<?php echo e($shoe->id); ?>">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img class="" src="<?php echo e($shoe->shoe_image); ?>" alt="<?php echo e($shoe->shoe_image); ?>">
                                        </div>
                                        <div class="product-countdown">
                                            <img src="/storage/res/time-icon.png" alt="">
                                            <script>
                                                CountDownTimer('<?php echo e($shoe->start); ?>', 'countdown');
                                                function CountDownTimer(dt, oldid)
                                                {
                                                    var id = oldid.concat('<?php echo e($shoe->id); ?>') 
                                                    var end = new Date('<?php echo e($shoe->end); ?>');
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
                                            
                                                        document.getElementById(id).innerHTML = days + "d ";
                                                        document.getElementById(id).innerHTML += hours + 'h ';
                                                        document.getElementById(id).innerHTML += minutes + 'm ';
                                                        document.getElementById(id).innerHTML += seconds + 's';
                                                    }
                                                    timer = setInterval(showRemaining, 1000);
                                                }
                                            </script>
                                            <p id="countdown<?php echo e($shoe->id); ?>"></p>
                                        </div>                           
                                        <div class="product-body">
                                            <p class="card-title"><?php echo e($shoe->shoe_name); ?></p>
                                            <div class="product-detail">
                                                <div class="product-bid">
                                                    <h6>CURRENT BID</h6>
                                                    <p>Rp<?php echo e($shoe->shoe_bid); ?></p>
                                                </div>
                                                <h5>Brand New</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>  
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="empty-alert">
                            <h2>No Product Found :(</h2>
                        </div>     
                    <?php endif; ?>
                </div>

                <div class="section-header">
                    <h3>Ended Auctions</h3>
                </div>
                <div class="auctions-con">
                    <?php if(count($shoes) > 0): ?>
                        <?php $__currentLoopData = $shoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                date_default_timezone_set("Asia/Jakarta");
                                $end = $shoe->end;
                                $distance = strtotime($end) - time();
                            ?>

                            <?php if($distance <= 0): ?>
                                <a href="/shoeDetail/<?php echo e($shoe->id); ?>">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <img class="" src="<?php echo e($shoe->shoe_image); ?>" alt="<?php echo e($shoe->shoe_image); ?>">
                                        </div>
                                        <div class="product-countdown auction-ended">
                                            <img src="/storage/res/time-icon.png" alt="">
                                            <p>Ended</p>
                                        </div>                           
                                        <div class="product-body">
                                            <p class="card-title"><?php echo e($shoe->shoe_name); ?></p>
                                            <div class="product-detail">
                                                <div class="product-bid">
                                                    <h6>CURRENT BID</h6>
                                                    <p>Rp<?php echo e($shoe->shoe_bid); ?></p>
                                                </div>
                                                <h5>Brand New</h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>  
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="empty-alert">
                            <h2>No Product Found :(</h2>
                        </div>     
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <div class="paginate-links">
            <?php echo e($shoes->links()); ?>

        </div>
    </div>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Binus\Semester 5\Web Programming\Kelas kecil\BP2\lelangid_final\resources\views/home.blade.php ENDPATH**/ ?>