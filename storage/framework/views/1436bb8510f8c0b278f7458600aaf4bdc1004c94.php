

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-center flex-wrap mt-4">
    <?php if(count($users) > 0): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mr-4 mb-4" style="width: 18rem;">
                <div class="card-header bg-danger text-white">User ID: <?php echo e(($loop->index+1)); ?></div>
                <div class="card-body">
                    <div class="card-subtitle mb-3">Username: <?php echo e($user->username); ?></div>
                    <div class="card-subtitle mb-3">Email: <?php echo e($user->email); ?></div>
                    <div class="card-subtitle mb-3">Address: <?php echo e($user->address); ?></div>
                    <div class="card-subtitle mb-3">Phone Number: <?php echo e($user->phone_number); ?></div>
                    <div class="card-subtitle mb-3">Gender: <?php echo e($user->gender); ?></div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <h3>Currently there isn't any shoes available.</h3>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Binus\Semester 5\Web Programming\Kelas kecil lab\JustDuIt\resources\views/admin_management/view_user.blade.php ENDPATH**/ ?>