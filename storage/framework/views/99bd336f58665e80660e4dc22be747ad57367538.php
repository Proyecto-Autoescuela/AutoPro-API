<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/search.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php ( $admins = \App\User::all()); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BUSCAR</div>
                <div class="card-body">
                    <form action="<?php echo e(action('UserController@listByName')); ?>" method="GET" role="search">
                        <div class="input-group mb-3">
                            <input required type="text" class="form-control" placeholder="Introduce el admin" name="name" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" type="button" value="Buscar"/>
                            </div>
                        </div>
                    </form>
                    <?php if(isset($admin)): ?>
                        <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name"><?php echo e($response->id); ?>. <?php echo e($response->name); ?></h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text"><?php echo e($response->email); ?></p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name"><?php echo e($a->id); ?>. <?php echo e($a->name); ?></h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text"><?php echo e($a->email); ?></p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <input style="margin-top:1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('admins')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/adminViews/searchAdminsView.blade.php ENDPATH**/ ?>