<?php ( $students = \App\Student::all()); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ELIMINAR</div>
                <div class="card-body">
                    <select class="form-control mx-sm-3 mb-2" style="max-width: 41rem">
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($s->id); ?>. <?php echo e($s->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p style="margin-left: 1rem"><input type="checkbox"/>  Se que voy a borrar un estudiante</p>
                    <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="ELIMINAR"/>
                    <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('students')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/deleteStudentsView.blade.php ENDPATH**/ ?>