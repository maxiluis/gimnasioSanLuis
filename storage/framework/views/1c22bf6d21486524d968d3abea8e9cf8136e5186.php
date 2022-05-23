
<?php $__env->startSection('title', 'Nuevo Alumno'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        
        <form method="POST" action="<?php echo e(url('/nuevaClase')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <br>
                <label class="label">Clase</label>
                <input required autocomplete="off" name="descripcion" class="form-control"
                       type="text" placeholder="Clase">
                       <br>
                       <label class="label">Cupo</label>
                       <input required autocomplete="off" name="cupo" class="form-control"
                              type="text" placeholder="Cupo">
                       <label class="label">Descripcion</label>
                <input required autocomplete="off" name="horario" class="form-control"
                       type="text" placeholder="Horario">
                       <br>
                       <label class="dni">Profesor</label>
                       <select name="profesor" id="profesor" class="form-control">
                           <?php $__currentLoopData = $profesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($profesor->id); ?>"><?php echo e($profesor->nombre." ".$profesor->apellido); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>

            </div>
            <br>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a class="btn btn-primary" href="<?php echo e(url("clases")); ?>">Volver al listado</a>
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
<?php echo $__env->make("layouts.administrador", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gimnasio\resources\views/layouts/nuevaclase.blade.php ENDPATH**/ ?>