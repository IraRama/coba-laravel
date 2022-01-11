<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Kelas Anda</div>

    <div class="card-body">        
        <div class="table-responsive">
            <table class="table tabel-stripped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>                        
                        <th>Tanggal Gabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->kelas->nama); ?></td>
                            <td><?php echo e($item->kelas->deskripsi); ?></td>                            
                            <td><?php echo e($item->created_at); ?></td>
                            <td>
                               <a href="<?php echo e(url('siswa/kelas/'.$item->kelas_id, [])); ?>" class="btn btn-primary">
                                    Lihat Materi (<?php echo e($item->kelasMateri->count()); ?>)
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5">Data Tidak ada</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('siswa.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\unama-learning\resources\views/siswa/kelas_index.blade.php ENDPATH**/ ?>