<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary text-white">Daftar Kelas</div>

    <div class="card-body">
        <h2>Info Kelas</h2>        
        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td><?php echo e($model->nama); ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td> <?php echo e($model->deskripsi); ?></td>
                    </tr>
                    <tr>
                        <td>Kode Kelas</td>
                        <td><?php echo e($model->kode); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="<?php echo e(url('guru/kelas-materi/form?id='.$model->id, [])); ?>" class="btn btn-primary ">Tambah Materi</a>
        <a href="<?php echo e(url('guru/kelas-peserta/form?id='.$model->id, [])); ?>" class="btn btn-secondary">Tambah Peserta</a>
        <h2 class="mt-2">Materi Belajar </h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    
                    <th>Tanggal Buat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $model->kelasMateri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo $item->judul.'<br/>'.$item->materi->judul; ?></td>
                        <td><?php echo e($item->materi->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(url('guru/kelas-materi/detail', $item->id)); ?>" class="btn btn-info">Lihat</a>
                            <a href="<?php echo e(url('guru/kelas-materi/delete', $item->id)); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4">Belum Ada Materi</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <h2 class="mt-2">Daftar Peserta Kelas</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $model->kelasSiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemSiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td> <?php echo e($loop->iteration); ?> </td>
                        <td> <?php echo e($itemSiswa->user->name); ?> </td>
                        <td> <?php echo e($itemSiswa->user->email); ?> </td>
                        <td> <?php echo e($itemSiswa->user->created_at); ?> </td>
                        <td><a href="<?php echo e(url('guru/kelas-peserta/delete', $itemSiswa->id)); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin')">Hapus</a></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5">Data tidak ada</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <h2 class="mt-2">Daftar Peserta Kelas</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Siswa</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $model->kelasAktifitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemAktifitas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td> <?php echo e($loop->iteration); ?> </td>
                        <td> <?php echo e($itemAktifitas->user->name); ?> </td>
                        <td> <?php echo e($itemAktifitas->deskripsi); ?> </td>
                        <td> <?php echo e($itemAktifitas->created_at->format('d-m-Y H:i')); ?> </td>
                        <td><a href="<?php echo e(url('guru/kelas-peserta/delete', $itemSiswa->id)); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin')">Hapus</a></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5">Data tidak ada</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('guru.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\belajar_laravel\unama-learning\resources\views/guru/kelas_detail.blade.php ENDPATH**/ ?>