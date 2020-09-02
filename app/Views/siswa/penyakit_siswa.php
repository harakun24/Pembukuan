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
                <li class="breadcrumb-item active" aria-current="page">Kesehatan</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 d-flex align-items-start justify-content-center align-items-center flex-wrap flex-column">
        <h1>Keterangan kesehatan</h1>
        <form action="<?= route_to('siswa_penyakit_save', $siswa['siswa_nis']); ?>" class="mt-2 col-12 col-sm-6 d-flex flex-wrap justify-content-center" method="post">
            <?= csrf_field(); ?>
            <div class="row">
                <div class=" col-12 mb-3 d-flex flex-wrap">
                    <label>Penyakit </label> <a onclick="tambah()" class="ml-2 btn btn-success btn-sm p-1 px-2" style="font-size: 60%;"><i class="fa fa-plus"></i></a>
                    <div class="row mt-2 p-2 d-flex flex-column">
                        <?php if ($penyakit != null) : ?>

                            <?php
                            $i = 1;
                            ?>
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Penyakit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($penyakit as $p) : ?>

                                        <tr>
                                            <td class="col-2"><?= $i++; ?></td>
                                            <td><?= $p['penyakit_nama']; ?></td>
                                            <td class="col-lg-2 col-sm-3">
                                                <a class="btn btn-sm btn-success" onclick="edit(<?= $p['id'] . ',\'' . $p['penyakit_nama'] . '\''; ?>)" style="font-size: 60%;"><i class="fa fa-pen"></i></a>
                                                <a class="btn btn-sm btn-danger" onclick="hapus(<?= $p['id']; ?>)" style="font-size: 60%;"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endif ?>
                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-4 col-sm-12 col-12 mb-3">
                    <label for="golda">Golongan darah </label>
                    <select name="siswa_golongan_darah" id="golda" class="form-control">
                        <?php
                        $goldar = $siswa['siswa_golongan_darah'];
                        ?>
                        <option value="">-- pilih --</option>
                        <option value="O" <?= $goldar == "O" ? 'selected' : ''; ?>>O</option>
                        <option value="A" <?= $goldar == "A" ? 'selected' : ''; ?>>A</option>
                        <option value="B" <?= $goldar == "B" ? 'selected' : ''; ?>>B</option>
                        <option value="AB" <?= $goldar == "AB" ? 'selected' : ''; ?>>AB</option>
                    </select>

                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-3">
                    <label for="kelainan">Kelaian Jasmani </label>
                    <textarea class=" form-control" placeholder="Tidak harus diisi" name="siswa_kelainan" id="kelainan"><?= $siswa['siswa_kelainan']; ?></textarea>
                </div>

            </div>
            <div class="row  d-flex justify-content-end align-items-end">

                <div class="col-md-2 col-sm-5 col-12 mb-3">
                    <label for="tinggi">Tinggi </label>
                    <input type="number" min="0" value="<?= $siswa['siswa_tinggi'] ? $siswa['siswa_tinggi'] : 0 ?>" class=" form-control" placeholder="Ex: 175" name="siswa_tinggi" id="tinggi">

                </div>
                <div class="col-md-2 col-sm-5 col-12 mb-3">
                    <label for="berat">Berat </label>
                    <input type="number" min="0" value="<?= $siswa['siswa_berat'] ? $siswa['siswa_berat'] : 0 ?>" class="form-control" placeholder="Ex: 62" name="siswa_berat" id="berat">
                </div>

            </div>
            <div class="col-12 d-flex justify-content-end">
                <a href="<?= route_to('siswa_detail', $siswa['siswa_nis']); ?>" class="btn btn-outline-danger m-2">kembali</a>
                <button type="submit" class="my-2 btn btn-primary">Simpan</button>
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

        var inputValue;
        Swal.fire({
            title: 'Nama penyakit',
            input: 'text',
            inputValue: inputValue,
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Isian tidak boleh kosong'
                }
                let penyakit = {
                    penyakit_nama: value
                }
                fetch('<?= route_to('penyakit_save', $siswa['siswa_nis']); ?>', {
                        method: 'POST',
                        header: {
                            'Content-type': 'application/json'
                        },
                        body: JSON.stringify(penyakit)
                    }).then(res => res.json())
                    .then(res => {
                        if (res.status == 200)
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil ditambah',
                                showConfirmButton: false,
                                timer: 950
                            }).then(() => {
                                document.location.reload();
                            })
                    })
            }
        })
    }

    function edit(id, val) {

        Swal.fire({
            title: 'Nama penyakit',
            input: 'text',
            inputValue: val,
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    i = document.querySelector('.swal2-input');
                    i.value = val;
                    return 'Isian tidak boleh kosong'
                }
                let penyakit = {
                    penyakit_nama: value
                }
                fetch('/penyakit/perbarui/' + id, {
                        method: 'POST',
                        header: {
                            'Content-type': 'application/json'
                        },
                        body: JSON.stringify(penyakit)
                    }).then(res => res.json())
                    .then(res => {
                        if (res.status == 200)
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil diubah',
                                showConfirmButton: false,
                                timer: 950
                            }).then(() => {
                                document.location.reload();
                            })
                    })
            }
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
                fetch('/penyakit/hapus/' + id)
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