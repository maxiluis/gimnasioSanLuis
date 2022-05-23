
<?php $__env->startSection('title', 'Pagos'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
   

    <div class="col-12">
        <form method="POST" action="<?php echo e(url('/nuevopago')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <br>
                <?php $__currentLoopData = $cuotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="label">Nombre Alumno</label>
                <input name="nombre" class="form-control"
                       type="text" value="<?php echo e($item->nombre." ".$item->apellido); ?>" disabled >
                       <br>
                       <label class="label">DNI Alumno</label>
                <input name="dni" class="form-control"
                       type="text" value="<?php echo e($item->dni); ?>" disabled >
                       <label class="label">Codigo Interno</label>
                <input name="alumno" id="alumno" class="form-control"
                       type="text" value="<?php echo e($item->id); ?>" readonly >
                       <br>
                       <label class="label">Descripcion</label>
                        <select name="descripcion" id="descripcion" class="form-control">
                            <option value="2">2 clases</option>
                            <option value="3">3 clases</option>
                            <option value="5">5 clases</option>
                            <option value="8">8 clases</option>
                            <option value="12">12 clases</option>
                            <option value="20">20 clases</option>
                            <option value="30">30 clases</option>
                        </select>
                        <br>
                       <label class="dni">Dinero</label>
                <input required autocomplete="off" name="precio" class="form-control"
                       type="text" placeholder="Ingrese dinero">
                       <br>
                       <label class="label">Vencimiento</label>
                        <input id="txtDate" type="text" name="vencimiento" class="form-control date-input" readonly="readonly" />
                      
                
            </div>
            <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button type="submit" class="btn btn-success">Actualizar Cuota</button>
        </form>
    </div>
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <ul>
                <li><?php echo \Session::get('success'); ?></li>
            </ul>
        </div>
    <?php endif; ?>
</div>
<br>
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
<?php echo $__env->make("layouts.administrador", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gimnasio\resources\views/layouts/cuotasalumno.blade.php ENDPATH**/ ?>