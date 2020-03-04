<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ALUMNOS</div>
                <div class="card-body">
                    <input type="button" class="btn btn-light btn-lg btn-block" value="BUSCAR" onclick="location.href = '<?php echo e(route('search')); ?>'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="AÑADIR" onclick="location.href = '<?php echo e(route('add')); ?>'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="MODIFICAR" onclick="location.href = '<?php echo e(route('modify')); ?>'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="ELIMINAR" onclick="location.href = '<?php echo e(route('delete')); ?>'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('home')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/autopro/AutoPro-API-features-migrations/resources/views/studentsPanel.blade.php ENDPATH**/ ?>