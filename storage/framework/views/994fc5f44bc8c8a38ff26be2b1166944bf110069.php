<?php $__env->startSection('header'); ?>
<ul class="nav justify-content-center">
    <div class="nav " id="nav-tab" role="tablist">
        <a class="nav-link active" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="true" href="#" onclick="location.href = '<?php echo e(route('users')); ?>'">USUARIOS</a>
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#" onclick="location.href = '<?php echo e(route('units')); ?>'">TEMAS</a>
        <a class="nav-link" id="nav-users-tab" data-toggle="tab" role="tab" aria-controls="nav-users" aria-selected="false" href="#" onclick="location.href = '<?php echo e(route('tests')); ?>'">TESTS</a>
    </div>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/home.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php ( $teachers = \App\Teacher::all()); ?>
<?php ( $students = \App\Student::all()); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">USUARIOS</div>
                <div class="card-body">
                    <nav class="nav-justified" style="margin-bottom: 1rem">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-parent-tab" data-toggle="tab" role="tab" aria-controls="nav-parent" aria-selected="true">ALUMNOS</a>
                            <a class="nav-item nav-link" id="nav-parent-tab" data-toggle="tab" href="#" onclick="location.href = '<?php echo e(route('teachers')); ?>'" role="tab" aria-controls="nav-parent" aria-selected="false">PROFESORES</a>
                            <a class="nav-item nav-link" id="nav-parent-tab" data-toggle="tab" href="#" onclick="location.href = '<?php echo e(route('admins')); ?>'" role="tab" aria-controls="nav-parent" aria-selected="false">ADMINS</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-default" role="tabpanel" aria-labelledby="nav-default-tab">
                            <form action="<?php echo e(action('StudentController@listByName')); ?>" method="GET" role="search">
                                <div class="input-group mb-3">
                                    <input required type="text" class="form-control" placeholder="Introduce el nombre del usuario" name="name" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <input type="submit" class="btn btn-outline-secondary" type="button" value="Buscar"/>
                                        <input type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addModal" value="Añadir"/>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Profesor</th>
                                    <th scope="col">Licencia</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($student)): ?>
                                        <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><?php echo e($response->id); ?></th>
                                                <td><p data-editable><?php echo e($response->name); ?></p></td>
                                                <td><p data-editable><?php echo e($response->email); ?></p></td>
                                                <td><p data-editable><?php echo e($response->getTeacherName($response->id)); ?></p></td>
                                                <td><p data-editable><?php echo e($response->license); ?></p></td>
                                                <td>
                                                    <button class="open-deleteDialog close" data-name="<?php echo e($response->name); ?>" data-id="<?php echo e($response->id); ?>" type="button" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="table">
                                                <th scope="row"><?php echo e($s->id); ?></th>
                                                <td><p data-editable><?php echo e($s->name); ?></p></td>
                                                <td><p data-editable><?php echo e($s->email); ?></p></td>
                                                <td><p data-editable><?php echo e($s->getTeacherName($s->id)); ?></p></td>
                                                <td><p data-editable><?php echo e($s->license); ?></p></td>
                                                <td>
                                                    <button class="open-deleteDialog close" data-name="<?php echo e($s->name); ?>" data-id="<?php echo e($s->id); ?>" type="button" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir alumno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo e(action('StudentController@addStudent')); ?>" role="form">
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
                <div class="form-group mb-2">
                    <p>Profesor: </p>
                </div>
                <select class="form-control mx-sm-3 mb-2" style="max-width: 27rem" name="teacher_id" required>
                    <option value=""></option>
                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($t->id); ?>"><?php echo e($t->id); ?> - <?php echo e($t->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="form-group mb-2">
                    <p>Licencia: </p>
                </div>
                <select class="form-control mx-sm-3 mb-2" style="max-width: 27rem" name="license" required>
                    <option value=""></option>
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
          <h5 class="modal-title" id="exampleModalLabel">Eliminar alumno</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?php echo e(action('StudentController@deleteStudent')); ?>" role="form">
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



<script type="text/javascript">
    
    $('body').on('click', '[data-editable]', function(){
    
    var $el = $(this);
                
    var $input = $('<input/>').val( $el.text() );
    $el.replaceWith( $input );
    
    var save = function(){
        var $p = $('<p data-editable />').text( $input.val() );
        $input.replaceWith( $p );
    };
    
    /**
        We're defining the callback with `one`, because we know that
        the element will be gone just after that, and we don't want 
        any callbacks leftovers take memory. 
        Next time `p` turns into `input` this single callback 
        will be applied again.
    */
    $input.one('blur', save).focus();
    
});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Autoescuela\AutoPro-API\resources\views/home.blade.php ENDPATH**/ ?>