
<?php $__env->startSection('title', 'Lista de Profesores'); ?>
<?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="<?php echo e(url('nuevoprofesor')); ?>" class="btn btn-success mb-2">
                <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Profe
            </a>
            <br>
            <table class="table  table-striped table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $profesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($p->nombre." ".$p->apellido); ?></td>
                            <td><?php echo e($p->dni); ?></td>
                            <td><?php echo e($p->telefono); ?></td>
                            <td>
                                <a class="btn btn-warning" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="<?php echo e(url('borrarProfesor/'.$p->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
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
        <?php echo e(\Session::get('success')); ?>

    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.administrador", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gimnasio\resources\views/layouts/profesores.blade.php ENDPATH**/ ?>