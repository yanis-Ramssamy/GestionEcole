



<?php $__env->startSection('titre'); ?>

Bienvenue les éléves 



<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenu'); ?>


<div class="d-flex justify-content-center mb-4">
  
  <a class="btn btn-primary" href="<?php echo e(route('professeur.index')); ?>">Voir les Professeurs</a>
</div>
<table class="table table-bordered">
  <thead>
    <tr class="table-primary">
     
      <th scope="col">First</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Détails</th>
      <th scope="col">Suppression</th>
      <th scope="col">Modification</th>
    </tr>
  </thead>
  <tbody>



        <?php $__currentLoopData = $eleves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eleve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
      <tr>
        <td><?php echo e($eleve->id); ?></td>
        <td><?php echo e($eleve->nom); ?></td>
        <td><?php echo e($eleve->prenom); ?></td> 
        <td><a href="<?php echo e(route('eleve.show', $eleve->id)); ?>" type="button" class="btn btn-success">voir</a></td> 
        <td><form action="<?php echo e(route('eleve.destroy',$eleve->id)); ?>" method="POST">
          <?php echo csrf_field(); ?> 
          <?php echo method_field('DELETE'); ?>
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
          </td>
          <td> 
             <button><a href="<?php echo e(route('eleve.edit', $eleve->id)); ?>" type ="button" class="btn btn-warning" >modifier un élève  </a></button> 
          </td>  
        
        
          
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>


    <div class="row jusitify-content-center">
      <div class="col">
        <select class="form-select" onchange="window.location.href=this.value">
          <option value="<?php echo e(route('eleve.index')); ?>" <?php if (! ($slug)): ?>selected <?php endif; ?>>
            Toutes les classes
           </option>
           <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e(route('eleves.classe', $classe->slug)); ?>" <?php echo e($slug == $classe->slug ? 'selected' : ''); ?>>
          <?php echo e($classe->libelle); ?>

           </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
    </div>
    <td> 
      <button><a href="<?php echo e(route('eleve.create')); ?>" class="btn btn-primary" >ajouter un élève  </a></button>
    </td>  
     
    <td> 
      
    </td>  
    <div class="d-flex">
      <?php echo $eleves->links(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php if(session()->has('info')): ?>
<div class="lert alert-info alert-dismissible fade show js-alert" role="alert">
<strong>  <?php echo e(session("info")); ?> </strong>
</div>
<?php endif; ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gestionEcole\resources\views/index.blade.php ENDPATH**/ ?>