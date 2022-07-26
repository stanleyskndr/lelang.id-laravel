<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="<?php echo e(asset('jquery.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/bootstrap.js')); ?>" defer></script>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,300;1,400&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo e(asset('storage/res/lelangid_logo4.png')); ?>">
    <?php echo $__env->yieldContent('title'); ?>
</head>

<body>
    <div class="nav-bar">
        <a class="navbar-logo" href="<?php echo e(route('home')); ?>">
            <img src="../storage/res/lelangid_logo2.png" alt="">
        </a>

        <div class="search-bar">
            <form method="GET" action="">
                <input type="text" name="search_input" placeholder="Search for item or brand name..">
                <button type="submit">
                    <img src="../storage/res/search-icon-yellow.png" alt="">
                </button>
            </form>
        </div>

        <div class="nav-menu">
            <li class="nav-item dropdown-menu">
                <a href="#" role="button" >
                    <div class="nav-username">
                        <p>Category</p> 
                    </div>
                    <div class="dropdown-icon">
                        <img src="../storage/res/down-arrow-yellow.png" alt="">
                    </div>
                </a>
        
                <div class="dropdown-item ">
                    <a href="">
                        <p>Sneakers</p>
                        <p>Electronics</p>
                        <p>Bicycle</p>
                        <p>Watch</p>
                        <p>Fashion Acc.</p>
                        <p>Branded Apparel</p>
                    </a>
                </div>
            </li>
            <?php if(auth()->guard()->guest()): ?>
                <?php echo $__env->yieldContent('nav-menu-guest'); ?>
            <?php else: ?>
                <?php if(Auth::user()->role == 0): ?>
                    <?php echo $__env->yieldContent('nav-menu-user'); ?>
                <?php else: ?>
                    <?php echo $__env->yieldContent('nav-menu-admin'); ?>

                <?php endif; ?>
                <li class="nav-item dropdown-menu">
                    <a href="#" role="button" >
                        <div class="nav-profile-pic">
                            <img src="/storage/res/profile-pic.png" alt="">
                        </div>
                        <div class="nav-username">
                            <?php echo e(Auth::user()->username); ?>

                        </div>
                        <div class="dropdown-icon">
                            <img src="../storage/res/down-arrow-yellow.png" alt="">
                        </div>
                    </a>

                    <div class="dropdown-item ">
                        <a  href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>
            <?php endif; ?>
        </div>   
    </div>

    <main class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html><?php /**PATH D:\Binus\Web Programming\Project Web Lelang.ID\lelangid_final_fix\resources\views/layouts/template.blade.php ENDPATH**/ ?>