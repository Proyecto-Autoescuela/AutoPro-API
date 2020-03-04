<?php $__env->startSection('header'); ?>
<ul class="nav justify-content-center">
    <div class="nav " id="nav-tab" role="tablist">
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#" onclick="location.href = '<?php echo e(route('users')); ?>'">USUARIOS</a>
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#" onclick="location.href = '<?php echo e(route('units')); ?>'">TEMAS</a>
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#"  onclick="location.href = '<?php echo e(route('tests')); ?>'">TESTS</a>
        <a class="nav-link active" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="true" href="#" onclick="location.href = '<?php echo e(route('options')); ?>'">OPCIONES</a>
    </div>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">OPCIONES</div>
                <div class="card-body">
                    OPCIONES
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/optionsPanel.blade.php ENDPATH**/ ?>