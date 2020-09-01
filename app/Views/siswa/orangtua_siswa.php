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
                <li class="breadcrumb-item active" aria-current="page">Orang tua</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 d-flex align-items-start justify-content-center align-items-center flex-wrap flex-column">
        <h1>Data Orang tua</h1>
        <div class="col-12 mb-4 mt-2">
            <button class="btn btn-success" onclick="tambah()">Tambah</button>
        </div>

        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Peran</th>
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php if ($orangtua != null) : ?>

                    <?php foreach ($orangtua as $o) : ?>

                        <tr>
                            <td><?= $o['orangtua_role']; ?></td>
                            <td><?= $o['orangtua_nama']; ?></td>
                            <td><?= $o['orangtua_pekerjaan']; ?></td>
                            <td><?= $o['orangtua_telepon']; ?></td>
                            <td><?= $o['orangtua_status']; ?></td>
                            <td class="col-lg-2 col-sm-3">
                                <a class="btn btn-sm btn-success" onclick="edit(<?= $o['orangtua_id']; ?>)" style="font-size: 60%;"><i class="fa fa-pen"></i></a>
                                <a class="btn btn-sm btn-danger" onclick="hapus(<?= $o['orangtua_id']; ?>)" style="font-size: 60%;"><i class="fa fa-trash-alt"></i></a>
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
        <form class="col-12" action="<?= route_to('orangtua_save', $siswa['siswa_nis']); ?>" method="post">
            <?php csrf_field(); ?>
            <div class="col-12 d-flex justify-content-between">
                <div class="form-group col-5">
                    <label for="role">Sebagai</label>
                    <select name="orangtua_role" class="form-control m-2 " id="role">
                    <?php if ($ayah == null) : ?> 
                        <option value="Ayah">Ayah</option>
                    <?php endif ?> 
                    <?php if ($ibu == null) : ?> 
                        <option value="Ibu">Ibu</option>
                    <?php endif ?> 
                        <option value="Wali">Wali</option>
                    </select>
                </div>
                <div class="form-group col-5">
                    <label for="nama">Nama</label>
                    <input type="text" name="orangtua_nama" required class=" m-2 form-control" id="nama">
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-between">
                <div class="form-group col-5">
                    <label for="tempat">Tempat lahir</label>
                    <input type="text" name="orangtua_tempat_lahir" class=" m-2 form-control" id="tempat">
                </div>
                <div class="form-group col-5">
                    <label for="tanggal">Tanggal lahir</label>
                    <input type="date" name="orangtua_tanggal_lahir" class=" m-2 form-control" id="tanggal">
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-between">
                <div class="form-group col-5">
                    <label for="agama">Agama</label>
                    <select name="orangtua_agama" class="form-control m-2 " id="agama" required>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group col-5">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" name="orangtua_kewarganegaraan" class=" m-2 form-control" id="kewarganegaraan">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" name="orangtua_pendidikan" class=" m-2 form-control" id="pendidikan">
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-between">
                <div class="form-group col-5">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="orangtua_pekerjaan" class=" m-2 form-control" id="pekerjaan">
                </div>
                <div class="form-group col-5">
                    <label for="penghasilan">Penghasilan</label>
                    <input type="number" step="50000" min="0" name="orangtua_penghasilan" class=" m-2 form-control" id="penghasilan">
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-between">
                <div class="form-group col-5">
                    <label for="telepon">Nomor telepon</label>
                    <input type="text" name="orangtua_telepon" class=" m-2 form-control" id="telepon">
                </div>
                <div class="form-group col-5">
                    <label for="status">Status</label>
                    <select name="orangtua_status" class="form-control m-2 " id="status">
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                    </select>
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
        fetch('/orangtua/' + id)
            .then(res => res.json())
            .then(res => {
                console.log(res);
                let view = `
        <form class="col-12" action="/orangtua/perbarui/` + id + `" method="post">
            <?php csrf_field(); ?>
            <div class="col-12 d-flex justify-content-between">
                <div class="form-group col-5">
                    <label for="role">Sebagai</label>
                    <select name="orangtua_role" class="form-control m-2 " id="role">
                    <option value="${res.response.orangtua_role}">${res.response.orangtua_role}</option>
                    </select>
                </div>
                <div class="form-group col-5">
                    <label for="nama">Nama</label>
                    <input value="${res.response.orangtua_nama}" type="text" name="orangtua_nama" required class=" m-2 form-control" id="nama">
                    <input value="<?= $siswa['siswa_nis']; ?>" type="hidden" name="orangtua_siswa">
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-between">
                <div class="form-group col-5">
                    <label for="tempat">Tempat lahir</label>
                    <input type="text" value="${res.response.orangtua_tempat_lahir}" name="orangtua_tempat_lahir" class=" m-2 form-control" id="tempat">
                </div>
                <div class="form-group col-5">
                    <label for="tanggal">Tanggal lahir</label>
                    <input type="date" value="${res.response.orangtua_tanggal_lahir}" name="orangtua_tanggal_lahir" class=" m-2 form-control" id="tanggal">
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-between">
                <div class="form-group col-5">
                    <label for="agama">Agama</label>
                    <select name="orangtua_agama" class="form-control m-2 " id="agama" required>
                        <option value="Islam"` + (res.response.orangtua_agama == 'Islam' ? `selected` : ``) + `>Islam</option>
                        <option value="Protestan"` + (res.response.orangtua_agama == 'Protestan' ? `selected` : ``) + `>Protestan</option>
                        <option value="Katolik"` + (res.response.orangtua_agama == 'Katolik' ? `selected` : ``) + `>Katolik</option>
                        <option value="Hindu"` + (res.response.orangtua_agama == 'Hindu' ? `selected` : ``) + `>Hindu</option>
                        <option value="Budha"` + (res.response.orangtua_agama == 'Budha' ? `selected` : ``) + `>Budha</option>
                        <option value="Konghucu"` + (res.response.orangtua_agama == 'Konghucu' ? `selected` : ``) + `>Konghucu</option>
                    </select>
                </div>
                <div class="form-group col-5">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" value="${res.response.orangtua_kewarganegaraan}" name="orangtua_kewarganegaraan" class=" m-2 form-control" id="kewarganegaraan">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" value="${res.response.orangtua_pendidikan}" name="orangtua_pendidikan" class=" m-2 form-control" id="pendidikan">
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-between">
                <div class="form-group col-5">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" value="${res.response.orangtua_pekerjaan}" name="orangtua_pekerjaan" class=" m-2 form-control" id="pekerjaan">
                </div>
                <div class="form-group col-5">
                    <label for="penghasilan">Penghasilan</label>
                    <input type="number" value="${res.response.orangtua_penghasilam}" step="50000" min="0" name="orangtua_penghasilan" class=" m-2 form-control" id="penghasilan">
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-between">
                <div class="form-group col-5">
                    <label for="telepon">Nomor telepon</label>
                    <input type="text" value="${res.response.orangtua_telepon}" name="orangtua_telepon" class=" m-2 form-control" id="telepon">
                </div>
                <div class="form-group col-5">
                    <label for="status">Status</label>
                    <select name="orangtua_status" class="form-control m-2 " id="status">
                        <option value="Hidup"` + (res.response.orangtua_status == 'Hidup' ? `selected` : ``) + `>Hidup</option>
                        <option value="Meninggal"` + (res.response.orangtua_status == 'Meninggal' ? `selected` : ``) + `>Meninggal</option>
                    </select>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="my-2 btn btn-primary">Simpan</button>
            </div>
        </form>
        `;
                console.log(view);
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
                fetch('/orangtua/hapus/' + id)
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