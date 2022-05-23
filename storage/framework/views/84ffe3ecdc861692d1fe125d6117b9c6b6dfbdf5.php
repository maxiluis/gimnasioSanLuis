
<?php $__env->startSection('title', 'Nuevo Alumno'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        
        <form method="POST" action="<?php echo e(url('/agregarAlumno')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <br>
                <label class="label">Nombre Alumno</label>
                <input required autocomplete="off" name="nombre" class="form-control"
                       type="text" placeholder="Nombre">
                       <br>
                       <label class="label">Apellido Alumno</label>
                <input required autocomplete="off" name="apellido" class="form-control"
                       type="text" placeholder="Apellido">
                       <br>
                       <label class="dni">DNI Alumno</label>
                <input required autocomplete="off" name="dni" class="form-control"
                       type="text" placeholder="DNI">
                       <br>
                       <label class="label">Telefono Alumno</label>
                <input required autocomplete="off" name="telefono" class="form-control"
                       type="text" placeholder="Telefono">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a class="btn btn-primary" href="<?php echo e(url("alumnos")); ?>">Volver al listado</a>
        </form>
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
<?php echo $__env->make("layouts.administrador", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gimnasio\resources\views/layouts/nuevoalumno.blade.php ENDPATH**/ ?>