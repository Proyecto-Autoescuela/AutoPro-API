<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/search.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php ( $teachers = \App\Teacher::all()); ?>
<?php ( $students = \App\Student::all()); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BUSCAR</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Introduce el alumno" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button">Buscar</button>
                        </div>
                    </div>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name"><?php echo e($s->name); ?></h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text"><?php echo e($s->email); ?></p>
                                    <p class="text">Pass: <?php echo e($s->password); ?></p>
                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text">Profesor: <?php echo e($t->name); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text">Licencia: <?php echo e($s->license); ?></p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <input style="margin-top:1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('students')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/searchStudentsView.blade.php ENDPATH**/ ?>