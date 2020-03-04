<?php $__env->startSection('header'); ?>
<ul class="nav justify-content-center">
    <div class="nav " id="nav-tab" role="tablist">
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#" onclick="location.href = '<?php echo e(route('users')); ?>'">USUARIOS</a>
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#" onclick="location.href = '<?php echo e(route('units')); ?>'">TEMAS</a>
        <a class="nav-link active" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="true" href="#"  onclick="location.href = '<?php echo e(route('tests')); ?>'">TESTS</a>
    </div>
</ul>
<?php $__env->stopSection(); ?>

<?php ( $units = \App\Unit::all()); ?>
<?php ( $ques = \App\Question::all()); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TESTS</div>
                <div class="card-body">
                    <form action="<?php echo e(action('UnitController@listByName')); ?>" method="GET" role="search">
                        <div class="input-group mb-3">
                            <input required type="text" class="form-control" placeholder="Introduce el nombre del tema" name="name" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-outline-secondary" type="button" value="Buscar"/>
                                <input type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addModal" value="Añadir"/>
                            </div>
                        </div>
                    </form>
                    <?php if(isset($que)): ?>
                        <?php $__currentLoopData = $que; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="mb-0" style="float: left">Tema <?php echo e($u->id); ?>: <?php echo e($u->name); ?>       <img width="10%" src="<?php echo e(URL::to('../')); ?>/storage/app/public/<?php echo e($u->img); ?>"/></h5>
                                            <button class="open-deleteDialog close" data-name="<?php echo e($u->name); ?>" data-id="<?php echo e($u->id); ?>" type="button" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </button>
                                    </div>
                                    <?php $__currentLoopData = $ques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p style="font-weight: bold"><?php echo e($u->id); ?>.<?php echo e($i++); ?> <?php echo e($uc->name); ?></p>
                                            <img width="40%" src="<?php echo e(URL::to('../')); ?>/storage/app/public/<?php echo e($uc->img); ?>"/>
                                            <p><?php echo e($uc->content_unit); ?></p>
                                            <div class="modal-footer">
                                                <button class="open-deleteDialog close" data-name="<?php echo e($uc->name); ?>" data-id="<?php echo e($uc->id); ?>" type="button" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <input style="margin-top: 1rem" type="submit" class="btn btn-light" value="Modificar"/>
                                                <input style="margin-top: 1rem" type="submit" class="btn btn-info" data-toggle="modal" data-target="#addModalContent" value="Añadir"/>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/testsPanel.blade.php ENDPATH**/ ?>