<?php ( $units = \App\Unit::all()); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ELIMINAR</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(action('UnitController@deleteUnit')); ?>" role="form">
                        <?php echo e(method_field('DELETE')); ?>

                        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                        <select class="form-control mx-sm-3 mb-2" style="max-width: 41rem" name="id" required>
                            <option value=""></option>
                            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($u->id); ?>">Tema <?php echo e($u->id); ?>: <?php echo e($u->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p style="margin-left: 1rem"><input type="checkbox" required/>  Se que voy a borrar un tema</p>
                        <input style="margin-top: 1rem" type="submit" class="btn btn-light btn-lg btn-block" value="ELIMINAR"/>
                    </form>
                    <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('units')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/unitViews/deleteUnitsView.blade.php ENDPATH**/ ?>