<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Detail Materi</div>

    <div class="card-body">
        Judul : <?php echo e(strtoupper($model->judul)); ?>

        <br/>
        Nama Materi : 
        <?php if($model->materi->jenis == "file"): ?>
            <a href="<?php echo e(\Storage::url($model->materi->isi)); ?>"><?php echo e(strtoupper($model->materi->judul)); ?></a>
        <?php else: ?>            
            <div><?php echo $model->materi->isi; ?></div>
        <?php endif; ?>
        <div>
        <a href="<?php echo e(url('guru/kelas/'. $model->kelas_id, [])); ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('guru.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\unama-learning\resources\views/guru/kelas_materi_detail.blade.php ENDPATH**/ ?>