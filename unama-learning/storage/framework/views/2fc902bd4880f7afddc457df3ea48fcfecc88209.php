<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Materi</div>

    <div class="card-body">
        <a href="<?php echo e(url('guru/materi/create?jenis=video')); ?>" class="btn btn-primary">Buat Materi Link video</a>
        <a href="<?php echo e(url('guru/materi/create?jenis=teks')); ?>" class="btn btn-primary m-2">Buat Materi Teks</a>
        <a href="<?php echo e(url('guru/materi/create?jenis=file')); ?>" class="btn btn-primary">Buat Materi File</a>
        <div class="table-responsive">
            <table class="table tabel-stripped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Isi</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->jenis); ?></td>
                            <td>
                                <?php if($item->jenis == "file"): ?>
                                    <a href="<?php echo e(\Storage::url($item->isi)); ?>">Lihat File : <?php echo e($item->judul); ?></a>
                                <?php else: ?>
                                    <?php echo $item->judul; ?>

                                    <div><?php echo $item->isi; ?></div>
                                <?php endif; ?>                                
                            </td>                            
                            <td><?php echo e($item->created_at); ?></td>
                            <td>
                                <a href="<?php echo e(url('guru/materi/'.$item->id.'/edit')); ?>" class="btn btn-info btn-sm">Edit</a>
                                <?php echo Form::open(['url' => 'guru/materi/'.$item->id,'method' => 'DELETE']); ?>

                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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

<?php echo $__env->make('guru.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\unama-learning\resources\views/guru/materi_index.blade.php ENDPATH**/ ?>