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
                <li class="breadcrumb-item active" aria-current="page">Kegemaran</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 d-flex align-items-start justify-content-center align-items-center flex-wrap flex-column">
        <h1>Data Kegemaran</h1>
        <div class="col-12 mb-4 mt-2">
            <button class="btn btn-success" onclick="tambah()">Tambah</button>
        </div>
        <div class="col-12 d-flex flex-wrap p-2">
            <div class="col-md-6 col-12 p-2">
                <h4>Kesenian</h4>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if ($kesenian != null) : ?>
                            <?php
                            $i = 1;
                            ?>
                            <?php foreach ($kesenian as $o) : ?>

                                <tr>
                                    <td class="col-2"><?= $i++; ?></td>
                                    <td><?= $o['kegemaran_nama']; ?></td>
                                    <td class="col-lg-2 col-sm-3">
                                        <a class="btn btn-sm btn-success" onclick="edit(<?= $o['kegemaran_id']; ?>)" style="font-size: 60%;"><i class="fa fa-pen"></i></a>
                                        <a class="btn btn-sm btn-danger" onclick="hapus(<?= $o['kegemaran_id']; ?>)" style="font-size: 60%;"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">Data kosong</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-12 p-2">
                <h4>Olahraga</h4>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if ($olahraga != null) : ?>
                            <?php
                            $i = 1;
                            ?>
                            <?php foreach ($olahraga as $o) : ?>

                                <tr>
                                    <td class="col-2"><?= $i++; ?></td>
                                    <td><?= $o['kegemaran_nama']; ?></td>
                                    <td class="col-lg-2 col-sm-3">
                                        <a class="btn btn-sm btn-success" onclick="edit(<?= $o['kegemaran_id']; ?>)" style="font-size: 60%;"><i class="fa fa-pen"></i></a>
                                        <a class="btn btn-sm btn-danger" onclick="hapus(<?= $o['kegemaran_id']; ?>)" style="font-size: 60%;"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">Data kosong</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-12 p-2">
                <h4>Kemasyarakatan/organisasi</h4>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if ($organisasi != null) : ?>
                            <?php
                            $i = 1;
                            ?>
                            <?php foreach ($organisasi as $o) : ?>

                                <tr>
                                    <td class="col-2"><?= $i++; ?></td>
                                    <td><?= $o['kegemaran_nama']; ?></td>
                                    <td class="col-lg-2 col-sm-3">
                                        <a class="btn btn-sm btn-success" onclick="edit(<?= $o['kegemaran_id']; ?>)" style="font-size: 60%;"><i class="fa fa-pen"></i></a>
                                        <a class="btn btn-sm btn-danger" onclick="hapus(<?= $o['kegemaran_id']; ?>)" style="font-size: 60%;"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">Data kosong</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-12 p-2">
                <h4>Lain-lain</h4>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if ($lain_lain != null) : ?>
                            <?php
                            $i = 1;
                            ?>
                            <?php foreach ($lain_lain as $o) : ?>

                                <tr>
                                    <td class="col-2"><?= $i++; ?></td>
                                    <td><?= $o['kegemaran_nama']; ?></td>
                                    <td class="col-lg-2 col-sm-3">
                                        <a class="btn btn-sm btn-success" onclick="edit(<?= $o['kegemaran_id']; ?>)" style="font-size: 60%;"><i class="fa fa-pen"></i></a>
                                        <a class="btn btn-sm btn-danger" onclick="hapus(<?= $o['kegemaran_id']; ?>)" style="font-size: 60%;"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">Data kosong</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
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
        <form class="col-12" action="<?= route_to('kegemaran_save', $siswa['siswa_nis']); ?>" method="post">
            <?php csrf_field(); ?>
            <div class="col-12">
                <div class="form-group col-12">
                    <select name="kegemaran_role" class="form-control m-2 " id="role">
                        <option value="kesenian">Kesenian</option>
                        <option value="olahraga">Olahraga</option>
                        <option value="organisasi">Kemasyarakatan/organisasi</option>
                        <option value="lain-lain">Lain-lain</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label for="nama" class="mx-2">Nama</label>
                    <input type="text" name="kegemaran_nama" required placeholder="Tulis sesuatu" class="m-2 form-control" id="nama" row="15">
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
        fetch('/kegemaran/' + id)
            .then(res => res.json())
            .then(res => {
                console.log(res);
                let view = `
                <form class="col-12" action="<?= route_to('kegemaran_update', $siswa['siswa_nis']); ?>" method="post">
            <?php csrf_field(); ?>
            <div class="col-12">
            <input type="hidden" name="kegemaran_id" value="${id}" />
            <input type="hidden" name="kegemaran_siswa" value="<?= $siswa['siswa_nis']; ?>" />
                <div class="form-group col-12">
                    <label for="nama" class="mx-2">Nama</label>
                    <input type="text" value="${res.response.kegemaran_nama}" name="kegemaran_nama" required placeholder="Tulis sesuatu" class="m-2 form-control" id="nama" row="15">
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
                fetch('/kegemaran/hapus/' + id)
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