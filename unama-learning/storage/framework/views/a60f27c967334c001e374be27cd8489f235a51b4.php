<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Dashboard</div>

    <div class="card-body">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        You are logged in!
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('guru.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\belajar_laravel\unama-learning\resources\views/guru/beranda.blade.php ENDPATH**/ ?>