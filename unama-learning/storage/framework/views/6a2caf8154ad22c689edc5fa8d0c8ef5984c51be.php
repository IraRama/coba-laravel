<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Materi</div>

    <div class="card-body">  
            <h2>Nama Kelas : <?php echo e($kelasSiswa->kelas->nama); ?></h2>
            <table class="table tabel-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Isi</th>
                        <th>Tanggal Pemberian Tugas</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->materi->jenis); ?></td>
                            <td>
                                <a href="<?php echo e(url('siswa/kelas/materi/detail/'.$item->materi_id)); ?>">Lihat Materi : <?php echo e($item->materi->judul); ?></a>

                                
                            </td>                            
                            <td><?php echo e($item->materi->created_at); ?></td>                            
                        </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4">Data Tidak ada</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('siswa.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\belajar_laravel\unama-learning\resources\views/siswa/kelas_materi.blade.php ENDPATH**/ ?>