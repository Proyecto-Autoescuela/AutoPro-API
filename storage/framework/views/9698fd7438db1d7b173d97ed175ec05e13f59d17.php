<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PANEL GENERAL</div>
                <div class="card-body">
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="ALUMNOS" onclick="location.href = '<?php echo e(route('students')); ?>'"/>
                    <input type="submit" class="btn btn-light btn-lg btn-block"value="PROFESOR" onclick="location.href = '<?php echo e(route('teachers')); ?>'"/>
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="ADMINS" onclick="location.href = '<?php echo e(route('admins')); ?>'"/>
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="TEMARIOS" onclick="location.href = '<?php echo e(route('units')); ?>'"/>
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="TESTS" />
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="RESERVAS" />
                    <input type="submit" class="btn btn-light btn-lg btn-block" value="OPCIONES" />
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/autopro/AutoPro-API-features-migrations/resources/views/home.blade.php ENDPATH**/ ?>