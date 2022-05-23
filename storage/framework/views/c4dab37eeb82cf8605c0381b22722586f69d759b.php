
<?php $__env->startSection('title', 'Listado de Alumnos'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="row">
   
        <form method="post" action="<?php echo e(url('buscarReserva')); ?>">
            <?php echo csrf_field(); ?>
            <div class="col-sm">
            <div class="form-group">
                    <label class="label">Seleccione clase</label>
                    <select name="clase" id="clase" class="form-control">
                        <?php $__currentLoopData = $clases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($clase->id); ?>"><?php echo e($clase->descripcion); ?></option>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                    </select>
                    <label class="input-group-btn" for="txtDate">Fecha</label>
            <input id="txtDate" type="text" name="fecha" class="form-control date-input" readonly="readonly" />
            </div>
            <button type="submit" class="btn btn-danger">Busca Reservas</button>
        </form>
        <br>
        <h5>Reservas del dia: </h5><h6><?php echo e(date('Y-m-d')); ?></h6>
        <h5>Cantidad de inscriptos<h6><?php echo e($cantidad); ?></h6>
        <h5>Lugares disponibles<h6><?php echo e($cantidad); ?></h6>    
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
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha de clase</th>
                <th class="text-center">Fecha de reserva</th>
                <th class="text-center">Eliminar</th>
            </tr>
            </thead>
            <tbody>
                <?php if(isset($reservas)): ?>
                <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($reserva->nombre." ".$reserva->apellido); ?></td>
                    <td><?php echo e($reserva->fecha); ?></td>
                    <td><?php echo e($reserva->created_at); ?></td>
                    <td>
                        <a class="btn btn-warning" href="#">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="" method="post">
                           <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
              
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
<script type="text/javascript">
    $(function () {
        $("#txtDate").datepicker({
            format: "yyyy-mm-dd",
            locale: 'es',
            language: 'es',
            startDate: "0",
            todayHighlight: "true",
            autoclose:"true",
            daysOfWeekDisabled: [0, 6]});
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.administrador", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gimnasio\resources\views/layouts/reservas.blade.php ENDPATH**/ ?>