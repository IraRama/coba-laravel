<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Selamat Datang, <?php echo e(\Auth::user()->name); ?></div>

    <div class="card-body">
        <center>
            <?php echo Form::open(['url' => url('siswa/kelas'), 'method' => 'POST']); ?>

            <div class="form-group">
                <label for="kode">Kode Kelas Online</label>
                <?php echo Form::text('kode', null, ['class' => 'form-control', 'autofocus']); ?>

            </div>
            <?php echo Form::submit('Gabung', ['class' => 'btn btn-primary']); ?>

            <?php echo Form::close(); ?>

        </center>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('siswa.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\belajar_laravel\unama-learning\resources\views/siswa/beranda.blade.php ENDPATH**/ ?>