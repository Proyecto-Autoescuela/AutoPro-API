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
                    <form action="<?php echo e(action('StudentController@listByName')); ?>" method="GET" role="search">
                        <div class="input-group mb-3">
                            <input required type="text" class="form-control" placeholder="Introduce el alumno" name="name" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" type="button" value="Buscar"/>
                            </div>
                        </div>
                    </form>
                    <?php if(isset($student)): ?>
                        <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name"><?php echo e($response->id); ?>. <?php echo e($response->name); ?></h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text"><?php echo e($response->email); ?></p>
                                    <p class="text">Profesor: <?php echo e($response->getTeacherName($response->id)); ?></p>
                                    <p class="text">Licencia: <?php echo e($response->license); ?></p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button>
                            <div class="card mygrid">
                                <div class="card-header">
                                    <h3 class="name"><?php echo e($s->id); ?>. <?php echo e($s->name); ?></h3>
                                </div>
                                <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p class="text"><?php echo e($s->email); ?></p>
                                    <p class="text">Profesor: <?php echo e($s->getTeacherName($s->id)); ?></p>
                                    <p class="text">Licencia: <?php echo e($s->license); ?></p>
                                </blockquote>
                                </div>
                            </div>
                        </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <input style="margin-top:1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('students')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/StudentViews/searchStudentsView.blade.php ENDPATH**/ ?>