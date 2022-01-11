<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Buat Materi Jenis <?php echo e(request()->jenis); ?></div>

    <div class="card-body">
        <?php echo Form::model($model, ['url' => $url,'method' => $method, 'files' => true]); ?>

        <div class="form-group">
            <?php echo Form::hidden('jenis', request()->jenis, []); ?>

            <label for="judul">Judul</label>
            <?php echo Form::text('judul', null, ['class' => 'form-control', 'autofocus']); ?>

            <span class="text-helper"><?php echo e($errors->first('judul')); ?></span>
        </div>

        <?php if(request('jenis') == 'file'): ?>
        <div class="form-group">
            <label for="isi">Upload File Materi</label>
            <?php echo Form::file('isi', ['class' => 'form-control']); ?>

        </div>
        <?php endif; ?>

        <?php if(request('jenis')  == 'teks' || request('jenis') == 'video'): ?>
        <div class="form-group">
            <label for="isi">Isi</label>
            <?php echo Form::textarea('isi', null, ['class' => 'form-control', 'rows' => 3]); ?>

            <span class="text-helper"><?php echo e($errors->first('isi')); ?></span>
        </div>
        <?php endif; ?>

        <div>
            <button type="submit" class="btn btn-primary"><?php echo e($namaTombol); ?></button>
        </div>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('guru.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\belajar_laravel\unama-learning\resources\views/guru/materi_form.blade.php ENDPATH**/ ?>