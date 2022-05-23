
<?php $__env->startSection('title', 'Listado de Alumnos'); ?>
<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="row">
                <div class="col-sm">
                    <a href="<?php echo e(url('nuevoAlumno')); ?>" class="btn btn-success mb-2">Agregar Alumno</a>
                </div>
                <div class="col-sm">
                    <form method="post" action="<?php echo e(url('buscarAlumno')); ?>">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">
                    </div>
                        <input required autocomplete="off" name="dni" class="form-control mb-2" type="number" placeholder="DNI">
                    </div>
                    <div class="col-sm">
                    <button type="submit" class="btn btn-danger">Buscar Alumno</button>
                    </div>
            </form>
            <br>
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <ul>
                        <li><?php echo \Session::get('success'); ?></li>
                    </ul>
                </div>
            <?php endif; ?>
            <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Nuevo Pago</th>
                        <th>Ficha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($a->nombre." ".$a->apellido); ?></td>
                            <td><?php echo e($a->dni); ?></td>
                            <td><?php echo e($a->telefono); ?></td>
                            <td>
                                <a class="btn btn-warning" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="<?php echo e(url('borrarAlumno/'.$a->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="<?php echo e(url('agregarPago/'.$a->id)); ?>" class="btn btn-success mb-2">
                                    <i class="fa fa-comment-dollar"></i>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(url('verficha/'.$a->id)); ?>" class="btn btn-info mb-2">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<?php if(\Session::has('success')): ?>
    <div class="alert alert-success">
        <ul>
            <li><?php echo \Session::get('success'); ?></li>
        </ul>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.administrador", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gimnasio\resources\views/layouts/alumnos.blade.php ENDPATH**/ ?>