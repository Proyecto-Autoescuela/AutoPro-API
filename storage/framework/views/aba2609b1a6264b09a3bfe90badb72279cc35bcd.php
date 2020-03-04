<?php $__env->startSection('content'); ?>
<?php ( $admins = \App\User::all()); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MODIFICAR</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(action('UserController@updateAdmin')); ?>" role="form">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="PUT">
                        <p>Selecciona el admin que quieres modificar</p>
                        <select class="form-control" style="max-width: 41rem" name="id" aria-describedby="basic-addon2" required>
                            <option value=""></option>
                            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($s->id); ?>"><?php echo e($s->id); ?>. <?php echo e($s->name); ?> | <?php echo e($s->email); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <br>
                        <div class="form-group mb-2">
                            <p>Nombre: </p>
                          </div>
                          <div class="form-group mx-sm-3 mb-2">
                          <input type="text" class="form-control" placeholder="Nombre" name="name" required>
                          </div>
                          <div class="form-group mb-2">
                            <p>Correo: </p>
                          </div>
                          <div class="form-group mx-sm-3 mb-2">
                              <input type="email" class="form-control" placeholder="Correo" name="email" required>
                          </div>
                          <div class="form-group mb-2">
                              <p>Contraseña: </p>
                          </div>
                          <div class="form-group mx-sm-3 mb-2">
                              <input type="text" class="form-control" placeholder="Contraseña" name="password" required>
                          </div>
                          <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                          <input style="margin-top: 1rem" type="submit" class="btn btn-light btn-lg btn-block" value="ACTUALIZAR" />
                    </form>
                    <input style="margin-top: 1rem" type="button" class="btn btn-light btn-lg btn-block" value="ATRAS" onclick="location.href = '<?php echo e(route('admins')); ?>'"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/adminViews/modifyAdminsView.blade.php ENDPATH**/ ?>