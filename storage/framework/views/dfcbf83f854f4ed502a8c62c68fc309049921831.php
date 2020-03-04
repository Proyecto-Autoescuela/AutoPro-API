<?php $__env->startSection('header'); ?>
<ul class="nav justify-content-center">
    <div class="nav " id="nav-tab" role="tablist">
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#" onclick="location.href = '<?php echo e(route('users')); ?>'">USUARIOS</a>
        <a class="nav-link active" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="true" href="#" onclick="location.href = '<?php echo e(route('units')); ?>'">TEMAS</a>
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#" onclick="location.href = '<?php echo e(route('tests')); ?>'">TESTS</a>
    </div>
</ul>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/units.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php ( $i = 1); ?>
<?php ( $units = \App\Unit::all()); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TEMAS</div>
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
                    <?php if(isset($unit)): ?>
                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5>Tema <?php echo e($response->id); ?>: <?php echo e($response->name); ?>       <img width="10%" src="<?php echo e(URL::to('../')); ?>/storage/app/public/<?php echo e($response->img); ?>"/></h5>
                                            <button class="open-deleteDialog close" data-name="<?php echo e($response->name); ?>" data-id="<?php echo e($response->id); ?>" type="button" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </button>
                                        </h5>
                                    </div>
                                    <?php $__currentLoopData = $response->contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p style="font-weight: bold"><?php echo e($response->id); ?>.<?php echo e($i++); ?> <?php echo e($uc->name); ?></p>
                                            <img width="40%"  src="<?php echo e(URL::to('../')); ?>/storage/app/public/<?php echo e($uc->img); ?>"/>
                                            <p><?php echo e($uc->content_unit); ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </div>
                            </div>
                            <input type="hidden"<?php echo e($i = 1); ?> />
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header myGrid" id="headingOne">
                                        <img width="40%" src="<?php echo e(URL::to('../')); ?>/storage/app/public/<?php echo e($u->img); ?>"/>
                                        <button class="btn " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="mb-0" style="float: left">Tema <?php echo e($u->id); ?>: <?php echo e($u->name); ?></h5>
                                        </button>
                                        <button class="open-deleteDialog close" data-name="<?php echo e($u->name); ?>" data-id="<?php echo e($u->id); ?>" type="button" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php $__currentLoopData = $u->contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                        <div class="itemGrid">
                                            <b><?php echo e($u->id); ?>.<?php echo e($i++); ?> <?php echo e($uc->name); ?></b>
                                            <button class="open-deleteContent close" type="button" data-name="<?php echo e($uc->name); ?>" data-id="<?php echo e($uc->id); ?>">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            <img width="40%" src="<?php echo e(URL::to('../')); ?>/storage/app/public/<?php echo e($uc->img); ?>"/>
                                            <p><?php echo e($uc->content_unit); ?></p>
                                            <div class="modal-footer">
                                                <input style="margin-top: 1rem" type="submit" class="btn btn-light" value="Modificar"/>
                                                <input style="margin-top: 1rem" type="submit" class="btn btn-info" data-toggle="modal" data-target="#addModalContent" value="Añadir"/>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </div>
                            </div>
                            <input type="hidden"<?php echo e($i = 1); ?> />
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir tema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo e(action('UnitController@addUnit')); ?>" role="form" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <p>Titulo: </p>
                  </div>
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" placeholder="Titulo" name="name" required>
                  </div>
                  <div class="form-group mb-2">
                    <p>Imagen:</p><img id="uploadPreview" style="max-width: 250px; display:block; margin:auto;"/>
                  </div>
                  <div class="form-group mx-sm-3 mb-2">
                    <input name="img" type="file" id="uploadImage" class="form-control-file" accept="image/*" required onchange="PreviewImage();">
                  </div>
                  <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                <div class="modal-footer">
                    <input style="margin-top: 1rem" type="submit" class="btn btn-light" value="Cerrar" data-dismiss="modal"/>
                    <input style="margin-top: 1rem" type="submit" class="btn btn-info" value="Añadir"/>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="addModalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir contenido tema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo e(action('UnitContentController@addUnitContent')); ?>" role="form" enctype="multipart/form-data">
                <p>Selecciona el tema a donde se va a añadir</p>
                <select class="form-control" style="max-width: 41rem" name="id" aria-describedby="basic-addon2" required>
                    <option value=""></option>
                    <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($u->id); ?>">Tema <?php echo e($u->id); ?>: <?php echo e($u->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <br>
                <div class="form-group mb-2">
                    <p>Titulo: </p>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" placeholder="Titulo" name="name" required>
                </div>
                <div class="form-group mb-2">
                    <p>Imagen:</p><img id="uploadPreview" style="max-width: 250px; display:block; margin:auto;"/>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input name="img" type="file" id="uploadImage" class="form-control-file" accept="image/*" required onchange="PreviewImage();">
                </div>
                <div class="form-group mb-2">
                    <p>Texto: </p>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <pre><textarea placeholder="Texto tema..." class="form-control" id="exampleFormControlTextarea1" name="content_unit" required></textarea><pre>
                </div>     
                <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                <div class="modal-footer">
                    <input style="margin-top: 1rem" type="submit" class="btn btn-light" value="Cerrar" data-dismiss="modal"/>
                    <input style="margin-top: 1rem" type="submit" class="btn btn-info" value="Añadir"/>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar tema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?php echo e(action('UnitController@deleteUnit')); ?>" role="form">
            <?php echo e(method_field('DELETE')); ?>

            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
            <div class="modal-body">
                <input type="hidden" id="userID" name="userID" value="">
                <p id="userName"></p>
            <div class="modal-footer">  
                <input style="margin-top: 1rem" type="button" class="btn btn-light" value="Cancelar" data-dismiss="modal"/>
                <input id='delete' style="margin-top: 1rem" type="submit" class="btn btn-danger deleteUser" value="Eliminar">
            </div>
        </form>
      </div>
    </div>
</div>


<div class="modal fade" id="deleteContentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar contenido de tema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?php echo e(action('UnitContentController@deleteUnitContent')); ?>" role="form">
            <?php echo e(method_field('DELETE')); ?>

            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
            <div class="modal-body">
                <input type="hidden" id="contentID" name="contentID" value="">
                <p id="contentName"></p>
            <div class="modal-footer">  
                <input style="margin-top: 1rem" type="button" class="btn btn-light" value="Cancelar" data-dismiss="modal"/>
                <input id='delete' style="margin-top: 1rem" type="submit" class="btn btn-danger deleteUser" value="Eliminar">
            </div>
        </form>
      </div>
    </div>
</div>

<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/unitsPanel.blade.php ENDPATH**/ ?>