<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12 mt-0 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Pembukuan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Siswa</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12 col-md-10 d-flex align-items-center justify-content-center">
        <div class="card col-12">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h1>Tabel siswa</h1>
                    <a href="<?= route_to('siswa_add'); ?>" class="btn btn-primary m-3 btn-sm"><i class="fa fa-plus"></i> Tambah </a>
                </div>
                <table class="table table-bordered table-hover text-center">
                    <thead class="text-center">
                        <tr>
                            <th class="d-none d-md-table-cell">No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th class="d-none d-lg-table-cell">Panggilan</th>
                            <th class="d-none d-md-table-cell">Jenis kelamin</th>
                            <th class="d-none d-sm-table-cell">Kelas</th>
                            <th class="d-none d-md-table-cell">Prodi</th>
                            <th class="d-none d-lg-table-cell">Mulai masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($siswa as $s) : ?>

                            <tr>
                                <td class="d-none d-md-table-cell"><?= $i++; ?></td>
                                <td><?= $s['siswa_nis']; ?></td>
                                <td><?= $s['siswa_nama']; ?></td>
                                <td class="d-none d-lg-table-cell"><?= $s['siswa_nick']; ?></td>
                                <td class="d-none d-md-table-cell"><?= $s['siswa_jk']; ?></td>
                                <td class="d-none d-sm-table-cell"><?= $s['siswa_kelas']; ?></td>
                                <td class="d-none d-md-table-cell"><?= $s['siswa_prodi']; ?></td>
                                <td class="d-none d-lg-table-cell"><?= $s['siswa_tgl_diterima']; ?></td>
                                <td class="text-center">
                                    <a href="<?= route_to('siswa_edit',$s['siswa_nis']); ?>" class="btn btn-outline-success btn-sm mx-2">detail <i class="fa fa-external-link-alt d-none d-md-inline"></i></a>
                                    <button class="btn btn-danger btn-sm mx-2"><span class="d-none d-lg-inline">Hapus</span><i class="fa fa-trash-alt d-md-inline d-lg-none"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <?= $pager->links('table', 'user_pager'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?= $this->endSection() ?>