<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PROFESORES</div>
                <div class="card-body">
                    <input type="button" class="btn btn-light btn-lg btn-block" value="BUSCAR" onclick="location.href = '<?php echo e(route('searchTeachers')); ?>'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="AÑADIR" onclick="location.href = '<?php echo e(route('addTeachers')); ?>'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="MODIFICAR" onclick="location.href = '<?php echo e(route('modifyTeachers')); ?>'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="ELIMINAR" onclick="location.href = '<?php echo e(route('deleteTeachers')); ?>'"/>
                    <input type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('home')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/autopro/AutoPro-API-features-migrations/resources/views/teachersPanel.blade.php ENDPATH**/ ?>