<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Buat Kelas Belajar</div>

    <div class="card-body">
        <?php echo Form::model($model, ['url' => $url,'method' => $method]); ?>

        <div class="form-group">
            <label for="nama">Nama Kelas</label>
            <?php echo Form::text('nama', null, ['class' => 'form-control', 'autofocus']); ?>

            <span class="text-helper"><?php echo e($errors->first('nama')); ?></span>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Kelas</label>
            <?php echo Form::textarea('deskripsi', null, ['class' => 'form-control', 'rows' => 3]); ?>

            <span class="text-helper"><?php echo e($errors->first('deskripsi')); ?></span>
        </div>

        <div class="form-group">
            <label for="kode">Kode Kelas</label>
            <?php echo Form::text('kode', $model->kode ?? \Str::random(5), ['class' => 'form-control', 'max' => 5]); ?>

            <span class="text-helper"><?php echo e($errors->first('kode')); ?></span>
        </div>

        <div>
            <button type="submit" class="btn btn-primary"><?php echo e($namaTombol); ?></button>
        </div>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('guru.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\unama-learning\resources\views/guru/kelas_form.blade.php ENDPATH**/ ?>