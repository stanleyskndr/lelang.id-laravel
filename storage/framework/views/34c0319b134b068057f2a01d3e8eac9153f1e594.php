

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-danger text-white"><?php echo e(__('Login')); ?></div>

            <div class="card-body">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                        <div class="col-md-6">
                            <?php if(Cookie::has('email')): ?>
                                <input id="email" placeholder="Email Address" type="email" class="form-control" name="email" value="<?php echo e(Cookie::get('email')); ?>" required autocomplete="email" autofocus>
                            <?php else: ?>
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                        <div class="col-md-6">
                            <?php if(Cookie::has('password')): ?>
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" value="<?php echo e(Cookie::get('password')); ?>" required autocomplete="current-password">
                            <?php else: ?>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                <label class="form-check-label" for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Login')); ?>

                            </button>

                            <?php if(Route::has('password.request')): ?>
                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                <?php echo e(__('Forgot Your Password?')); ?>

                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Binus\Semester 5\Web Programming\Kelas kecil lab\phizza-hut\resources\views/auth/login.blade.php ENDPATH**/ ?>