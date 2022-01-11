<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Kelas</div>

    <div class="card-body">
        <a href="<?php echo e(url('guru/kelas/create', [])); ?>" class="btn btn-primary">Buat Kelas</a>
        <div class="table-responsive">
            <table class="table tabel-stripped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Kode</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->nama); ?></td>
                            <td><?php echo e($item->deskripsi); ?></td>
                            <td><?php echo e($item->kode); ?></td>
                            <td><?php echo e($item->created_at); ?></td>
                            <td>
                                
                                <?php echo Form::open(['url' => 'guru/kelas/'.$item->id,'method' => 'DELETE', 'class' => 'form-inline']); ?>

                                <a href="<?php echo e(url('guru/kelas/'.$item->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                                <a href="<?php echo e(url('guru/kelas/'.$item->id.'/edit')); ?>" class="btn btn-info btn-sm ml-3 mr-3">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin')">Hapus</button>
                                <?php echo Form::close(); ?>

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

<?php echo $__env->make('guru.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\unama-learning\resources\views/guru/kelas_index.blade.php ENDPATH**/ ?>