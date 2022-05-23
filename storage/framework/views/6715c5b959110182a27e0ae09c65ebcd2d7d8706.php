
<?php $__env->startSection('title','RESERVAS'); ?>
<?php $__env->startSection('content'); ?>
<div class="container fluid">
    <form method="POST" action="/reservar">
      <?php echo csrf_field(); ?>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputDocumento">DNI (sin puntos)</label>
            <input type="text" class="form-control" id="inputDocumento" placeholder="Documento">
          </div>
        </div>
        <div class="form-group col-md-4">
         
         
            <label for="inputState">Clase</label>
            <select id="inputState" class="form-control">
              <option selected>Elegí tu clase</option>
              
              <?php $__currentLoopData = $clases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option><?php echo e($c->nombre." ".$c->horario); ?></option>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline1">Toggle this custom radio</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">Or toggle this other custom radio</label>
          </div>
        <br>
        <button type="submit" class="btn btn-danger">Reservar</button>
      </form>
    </div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gimnasio\resources\views/layouts/formulariodereserva.blade.php ENDPATH**/ ?>