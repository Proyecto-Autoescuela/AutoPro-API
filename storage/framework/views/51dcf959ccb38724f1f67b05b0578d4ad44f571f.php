<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/searchUnit.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php ( $units = \App\Unit::all()); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BUSCAR</div>
                <div class="card-body">
                    <form action="<?php echo e(action('UnitController@listByID')); ?>" method="GET" role="search">
                        <div class="input-group mb-3">
                            <input required type="text" class="form-control" placeholder="Introduce número del tema que quieres encontrar" name="id" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" type="button" value="Buscar"/>
                            </div>
                        </div>
                    </form>
                    <input style="margin-bottom: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('units')); ?>'"/>
                    <?php if(isset($unit)): ?>
                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name">Tema <?php echo e($response->id); ?>: <?php echo e($response->name); ?><img style="max-width: 70px" src="<?php echo e(URL::to('../')); ?>/storage/app/public/<?php echo e($response->unit_url); ?>"/></h3>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p class="text"><pre><?php echo e($response->content_unit); ?></pre></p>
                                    </blockquote>
                                </div>
                            </div>
                        </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button style="margin-bottom: 1rem">
                            <div class="card mygrid" style="max-width: 42rem">
                                <div class="card-header">
                                <h3 class="name">Tema <?php echo e($u->id); ?>: <?php echo e($u->name); ?><img style="max-width: 70px" src="<?php echo e(URL::to('../')); ?>/storage/app/public/<?php echo e($u->unit_url); ?>"/></h3>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p class="text"><pre><?php echo e($u->content_unit); ?></pre></p>
                                    </blockquote>
                                </div>
                            </div>
                        </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/unitViews/searchUnitsView.blade.php ENDPATH**/ ?>