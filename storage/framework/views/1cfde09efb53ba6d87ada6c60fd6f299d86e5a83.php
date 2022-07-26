

<?php $__env->startSection('content'); ?>
<div class="row display-4">Our freshly made pizza!</div>
<?php if(!auth::check() || auth::user()->isAdmin == 0): ?>
    <form method="GET" action="<?php echo e(route('search_pizza')); ?>">
        <div class="form-group d-flex justify-content-center mt-3 align-items-center">
            <label for="name" class="col-form-label">Search Pizza:</label>
            <span class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" placeholder="Search your favorite pizza">
            </span>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
<?php else: ?>
    <a href="/createPizza"><button class="btn btn-dark text-white mt-3">Add Pizza</button></a>
<?php endif; ?>
<div class="d-flex justify-content-center flex-wrap mt-4">
    <?php if(count($pizzas) > 0): ?>
        <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="text-decoration-none" href="/pizzaDetail/<?php echo e($pizza->id); ?>">
                <div class="card mr-4 mb-4" style="width: 18rem;">
                    <img class="card-img-top" style="height: 200px" src="<?php echo e($pizza->pizza_image); ?>" alt="<?php echo e($pizza->pizza_image); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($pizza->pizza_name); ?></h5>
                        <h6 class="card-subtitle mb-1 text-muted"><?php echo e($pizza->pizza_description); ?></h6>
                        <p class="card-text">Rp. <?php echo e($pizza->pizza_price); ?></p>
                        <?php if(auth::check() && auth::user()->isAdmin == 1): ?>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="editPizza/<?php echo e($pizza->id); ?>">
                                    <button class="btn btn-primary">
                                        <?php echo e(__('Update Pizza')); ?>

                                    </button>
                                </a>
                                <a href="deletePizza/<?php echo e($pizza->id); ?>">
                                    <button class="btn btn-danger">
                                        <?php echo e(__('Delete Pizza')); ?>

                                    </button>
                                </a>
                            </div>
                        <?php endif; ?>  
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <h3>No Pizza Found</h3>
    <?php endif; ?>
</div>
<div class="d-flex justify-content-center">
    <?php echo e($pizzas->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Binus\Semester 5\Web Programming\Kelas kecil lab\phizza-hut\resources\views/home.blade.php ENDPATH**/ ?>