<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,300;1,400&display=swap" rel="stylesheet">
    <title>Login - Lelang.ID</title>
</head>
<body>
    <div class="login-register-bg">
        <div class="login-register-con">
            <div class="login-register-left">
                <div class="login-register-left-title">
                    <h1>Welcome Back!</h1>
                    <p>Login for awesome auction experience</p>
                </div>
                <div class="login-register-illustration">
                    <img src="/storage/res/illustration_1.png" alt="">
                </div>
            </div>
            <div class="login-register-right">
                <div class="login-register-logo login-logo">
                    <a href="/">
                        <img src="/storage/res/lelangid_logo2.png" alt="">
                    </a>          
                </div>
                <div class="login-register-right-title">
                    <h2>Login</h2>
                    <hr>
                </div>
                <div class="login-register-form">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>                
        
                        <div class="form-input">
                            
                            <?php if(Cookie::has('email')): ?>
                                <input id="email" placeholder="Email Address" type="email" class="form-control" name="email" value="<?php echo e(Cookie::get('email')); ?>" required autocomplete="email" autofocus>
                            <?php else: ?>
                                <input id="email" placeholder="Email Address" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                            <?php endif; ?>
        
                            <?php $__errorArgs = ['email'];
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
        
                        <div class="form-input">
                            
                            <?php if(Cookie::has('password')): ?>
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" value="<?php echo e(Cookie::get('password')); ?>" required autocomplete="current-password">
                            <?php else: ?>
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            <?php endif; ?>
        
                            <?php $__errorArgs = ['password'];
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
        
                        <div class="remember-me">
                            <input class="" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
        
                            <label class="" for="remember">
                                <?php echo e(__('Remember Me')); ?>

                            </label>
                        </div>
        
                        <button type="submit" class="">
                            <?php echo e(__('Login')); ?>

                        </button>
                    </form>
                </div>
                
                <div class="login-register-msg">
                    <p>Don't have an account?</p>
                    <a href="/register" class="yellow-text">Create now</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html><?php /**PATH D:\Binus\Web Programming\Project Web Lelang.ID\Lelang.ID Laravel Frontend\lelangid_final\resources\views/auth/login.blade.php ENDPATH**/ ?>