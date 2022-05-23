
<?php $__env->startSection('title', 'Clases'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <a href="<?php echo e(url('/agregarClases')); ?>" class="btn btn-success mb-2">Agregar Clase</a>
        <br>
        <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <ul>
                <li><?php echo \Session::get('success'); ?></li>
            </ul>
        </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Clase</th>
                <th class="text-center">Horario</th>
                <th class="text-center">Profesor</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $clases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($clase->descripcion); ?></td>
                    <td><?php echo e($clase->horario); ?></td>
                    <td><?php echo e($clase->nombre." ".$clase->apellido); ?></td>
                    <td>
                        <a class="btn btn-warning" href="#">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{}}" method="post">
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
<br>
<?php if(\Session::has('success')): ?>
    <div class="alert alert-success">
        <ul>
            <li><?php echo \Session::get('success'); ?></li>
        </ul>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.administrador", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gimnasio\resources\views/layouts/clases.blade.php ENDPATH**/ ?>