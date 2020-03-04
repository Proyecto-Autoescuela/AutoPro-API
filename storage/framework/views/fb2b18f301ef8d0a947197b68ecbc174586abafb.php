<?php $__env->startSection('content'); ?>
<?php ( $teachers = \App\Teacher::all()); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">AÑADIR</div>
                <div class="card-body">
                    <form method="POST" action="enviar">
                        <div class="form-group mb-2">
                          <p>Nombre: </p>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group mb-2">
                          <p>Correo: </p>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="email" class="form-control" placeholder="Correo">
                        </div>
                        <div class="form-group mb-2">
                            <p>Contraseña: </p>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="email" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="form-group mb-2">
                            <p>Profesor: </p>
                        </div>
                        <select class="form-control mx-sm-3 mb-2" style="max-width: 41rem">
                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($t->id); ?>. <?php echo e($t->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="form-group mb-2">
                            <p>Licencia: </p>
                        </div>
                        <select class="form-control mx-sm-3 mb-2" style="max-width: 41rem">
                            <option>A</option>
                            <option>A1</option>
                            <option>A2</option>
                            <option>B</option>
                            <option>B+E</option>
                            <option>C</option>
                            <option>C+E</option>
                            <option>D</option>
                            <option>D+E</option>
                        </select>
                        <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="AÑADIR"/>
                    </form>
                    <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('students')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/add.blade.php ENDPATH**/ ?>