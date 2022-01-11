<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Kelas</div>

    <div class="card-body">
                
        <?php echo Form::model($model, ['url' => $url,'method' => $method]); ?>

        <?php echo Form::hidden('kelas_id', $kelas_id, []); ?>


        <div class="form-group">
            <label for="email">Masukan Email Peserta</label>
            <?php echo Form::email('email', null, ["class" => 'form-control']); ?>

            <span class="text-helper"><?php echo e($errors->first('email')); ?></span>
        </div>                

        <div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="<?php echo e(url('guru/kelas/'.$kelas_id)); ?>" class="btn btn-secondary">Kembali</a>
        </div>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('guru.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\unama-learning\resources\views/guru/kelas_peserta.blade.php ENDPATH**/ ?>