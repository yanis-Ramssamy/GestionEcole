
<?php $__env->startSection('titre'); ?>

<div class="d-flex justify-content-center">
  <h1>Les Professeurs</h1>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>

<div class="d-flex justify-content-center mb-4">
  <a  class="btn btn-info" href="<?php echo e(route('professeur.create')); ?>">Ajouter un professeur</a>
</div>


<div class="container">
    
    <div class="row">
        <?php $__currentLoopData = $profs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <h5 class="card-header"><?php echo e($prof->nom); ?>, <?php echo e($prof->prenom); ?> </h5>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($prof->matiere); ?></h5>
                    <p class="card-text">
                        <strong>Classes :</strong>
                        <ul>
                            <?php $__currentLoopData = $prof->classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($classe->libelle); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </p>
                    
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="d-flex">
  <?php echo $profs->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gestionEcole\resources\views/professeur.blade.php ENDPATH**/ ?>