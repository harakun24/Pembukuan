<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<style>
    .penyakit:hover {
        background: #e9ebee;
    }
</style>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12 mt-0 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Pembukuan</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Siswa</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_detail', $siswa['siswa_nis']); ?>"><?= $siswa['siswa_nama']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Tracker</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 d-flex align-items-start justify-content-center align-items-center flex-wrap flex-column">
        <h1>Setelah selesai pendidikan</h1>
        <form action="<?= route_to('siswa_tracker_save', $siswa['siswa_nis']); ?>" class="mt-2 col-12 col-sm-6 d-flex flex-wrap justify-content-center" method="post">
            <?= csrf_field(); ?>
            <div class="row">
                <div class=" col-12 mb-3 d-flex flex-wrap">
                    <label>Bekerja </label> <a onclick="tambah()" class="ml-2 btn btn-success btn-sm p-1 px-2" style="font-size: 60%;"><i class="fa fa-plus"></i></a>
                    <div class="row mt-2 p-2 d-flex flex-column">
                        <?php if ($tracker != null) : ?>

                            <?php
                            $i = 1;
                            ?>
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Penghasilan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($tracker as $b) : ?>

                                        <tr>
                                            <td class="col-lg-2 col-sm-3"><?= $b['tracker_tanggal']; ?></td>
                                            <td><?= $b['tracker_nama']; ?></td>
                                            <td><?= $b['tracker_gaji']; ?></td>
                                            <td class="col-lg-2 col-sm-3">
                                                <a class="btn btn-sm btn-success" onclick="edit(<?= $b['tracker_id']; ?>)" style="font-size: 60%;"><i class="fa fa-pen"></i></a>
                                                <a class="btn btn-sm btn-danger" onclick="hapus(<?= $b['tracker_id']; ?>)" style="font-size: 60%;"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endif ?>
                    </div>

                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-12 my-2">
                    <label for="lanjut">Melanjutkan di</label>
                    <textarea class="form-control" name="siswa_melanjutkan" id="lanjut"><?= $siswa['siswa_melanjutkan']; ?></textarea>
                </div>
            </div>

            <!-- row -->
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-end">
                    <a href="<?= route_to('siswa_detail', $siswa['siswa_nis']); ?>" class="btn btn-outline-danger m-2">kembali</a>
                    <button type="submit" class="my-2 btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="/assets/js/sweetalert2-all.js"></script>
<script>
    <?php if (session()->getFlashData('insert')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil menambah',
            showConfirmButton: false,
            timer: 950
        })
    <?php elseif (session()->getFlashData('update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil diubah',
            showConfirmButton: false,
            timer: 950
        })
    <?php endif ?>

    function tambah() {
        let view = `
        <form class="col-12" action="<?= route_to('tracker_save', $siswa['siswa_nis']); ?>" method="post">
                        <?php csrf_field(); ?>
                        <div class="col-12">
                            <div class="form-group col-12">
                                <label for="tanggal" class="mx-2">Tahun</label>
                                <input type="date" name="tracker_tanggal" required placeholder="Tulis sesuatu" class="m-2 form-control" id="tanggal">
                            </div>
                            <div class="form-group col-12">
                                <label for="nama" class="mx-2">Nama</label>
                                <input type="text" name="tracker_nama" required placeholder="Tulis sesuatu" class="m-2 form-control" id="nama">
                            </div>
                            <div class="form-group col-12">
                                <label for="gaji" class="mx-2">Penghasilan</label>
                                <input name="tracker_gaji" type="number" step="50000" min="0" required placeholder="Tulis sesuatu" class="m-2 form-control" id="gaji" />
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="my-2 btn btn-primary">Simpan</button>
                        </div>
                    </form>
        `;
        Swal.fire({
            title: 'Tambah data',
            showConfirmButton: false,
            html: view,

        })
    }

    function edit(id) {
        fetch('/tracker/' + id)
            .then(res => res.json())
            .then(res => {
                let view = `
        <form class="col-12" action="/tracker/perbarui/` + id + `" method="post">
                        <?php csrf_field(); ?>
                        <div class="col-12">
                            <div class="form-group col-12">
                                <label for="tanggal" class="mx-2">Tahun</label>
                                <input type="hidden" name="tracker_siswa" value="<?= $siswa['siswa_nis']; ?>" />
                                <input type="date" value="${res.response.tracker_tanggal}" name="tracker_tanggal" required placeholder="Tulis sesuatu" class="m-2 form-control" id="tanggal">
                            </div>
                            <div class="form-group col-12">
                                <label for="nama" class="mx-2">Nama</label>
                                <input type="text" value="${res.response.tracker_nama}" name="tracker_nama" required placeholder="Tulis sesuatu" class="m-2 form-control" id="nama">
                            </div>
                            <div class="form-group col-12">
                                <label for="gaji" class="mx-2">Penghasilan</label>
                                <input name="tracker_gaji" value="${res.response.tracker_gaji}" type="number" step="50000" min="0" required placeholder="Tulis sesuatu" class="m-2 form-control" id="gaji" />
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="my-2 btn btn-primary">Simpan</button>
                        </div>
                    </form>
        `;
                Swal.fire({
                    title: 'Tambah data',
                    showConfirmButton: false,
                    html: view,

                })
            })
    }

    function hapus(id) {


        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dipilih akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, lanjut'
        }).then((result) => {
            if (result.value) {
                fetch('/tracker/hapus/' + id)
                    .then(res => res.json())
                    .then(res => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil dihapus',
                            showConfirmButton: false,
                            timer: 950
                        }).then(() => {
                            document.location.reload();
                        })
                    })
            }
        })
    }
</script>
<?= $this->endSection() ?>