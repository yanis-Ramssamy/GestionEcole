

<?php $__env->startSection('contenu'); ?>
<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            <img src="../photos2024_SLAM/<?php echo e($eleve->image); ?>"><?php echo e($eleve->prenom); ?> <?php echo e($eleve->nom); ?>

        </p>
    </header>
 <div class="card-content">
    <div class="content">
<p> Date de naissance :
    <?php echo e($eleve->dateNaiss); ?> 
</p>
   </div>
<div class="content">
    <p> Email:
        <?php echo e($eleve->email); ?> 
    </p>
</div>
   </div>
   <div class="d-flex justify-content-center mt-4">
        <a class="btn btn-info" href="<?php echo e(url()->previous()); ?>" >Retour</a>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gestionEcole\resources\views/show.blade.php ENDPATH**/ ?>