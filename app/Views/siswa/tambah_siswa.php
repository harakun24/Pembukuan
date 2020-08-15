<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12 mt-0 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Pembukuan</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12 col-md-4 d-flex align-items-center justify-content-center">
        <div class="bd-callout bd-callout-primary col-12">
            <h4><span class="typed"></span> &nbsp;</h4>
            <p>Berisi biodata profil siswa. Pengisian data tidak harus lengkap, selama mencantumkan nomor induk siswa (nis), nama serta tempat dan tanggal lahir.</p>
        </div>
    </div>
    <div class="col-sm-12 col-md-7 ml-0">
        <div class="card">
            <div class="card-body">
                <!-- <h1 class="text-center">Form isi data</h1> -->
                <h3 class="text-center mt-2">Data Pribadi</h3>

                <form action="<?= route_to('siswa_save'); ?>" method="post" class="form p-4">
                    <?= csrf_field(); ?>

                    <!-- row -->


                    <div class="row d-flex justify-content-between">
                        <div class="col-xs-12 col-sm-2 mb-3">
                            <label for="nis">Nis</label>
                            <input type="text" value="<?= old('nama'); ?>" class="form-control" placeholder="Ex: 0449" name="siswa_nis" id="nis" required>
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-12 mb-3 d-flex justify-content-between">
                            <div class="col-7">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" value="<?= old('nama'); ?>" class="form-control" placeholder="Ex: Andiansyah Putra" name="siswa_nama" id="nama" required>
                                <div class="invalid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="nick">Panggilan</label>
                                <input type="text" value="<?= old('nama'); ?>" class="form-control" placeholder="Ex: Andi" name="siswa_nick" id="nick">
                                <div class="invalid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- row -->

                    <div class="row d-flex justify-content-between">

                        <div class="col-sm-10 col-6 mb-3 position-relative">
                            <label for="jk">Jenis kelamin</label>
                            <select class="form-control" name="siswa_jk" id="jk">
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                <!-- <?= $val->getError('email'); ?> -->
                                Wrong!
                            </div>
                            <span class="position-absolute mr-4" style="right:0;top:50%"><i class="fa fa-angle-down"></i></span>
                        </div>
                        <div class="col-sm-2 col-6 mb-3">
                            <label for="order">Anak</label>
                            <input type="number" value="<?= old('nama') ? old('nama') : 1; ?>" min='1' class="form-control" name="siswa_order" id="order">
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row d-flex justify-content-between">
                        <div class="col-6 mb-3">
                            <label for="place">Tempat lahir</label>
                            <input type="text" value="<?= old('nama'); ?>" class="form-control" placeholder="Ex: Bantul" name="siswa_tempat_lahir" id="place" required>
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-sm-3 col-6 mb-3">
                            <label for="date">Tanggal</label>
                            <input type="date" value="<?= old('nama'); ?>" class="form-control" name="siswa_tanggal_lahir" id="date">
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-sm-3 col-12 mb-3 position-relative">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="siswa_agama" id="agama">
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghuchu">Konghuchu</option>
                            </select>
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                            <span class="position-absolute mr-4" style="right:0;top:50%"><i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row d-flex justify-content-between">

                        <div class="col-sm-8 col-6 mb-3">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <input type="text" value="<?= old('nama'); ?>" class="form-control" placeholder="Ex: Indonesia" name="siswa_kewarganegaraan" id="kewarganegaraan">
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 mb-3 position-relative">
                            <label for="status">Status anak</label>
                            <select class="form-control" name="siswa_status" id="status">
                                <option value="Lengkap">Lengkap</option>
                                <option value="Yatim">Yatim</option>
                                <option value="Piatu">Piatu</option>
                                <option value="Yatim Piatu">Yatim Piatu</option>
                            </select>
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                            <span class="position-absolute mr-4" style="right:0;top:50%"><i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row d-flex justify-content-between align-items-end">
                        <div class="col-sm-6 col-12 d-flex justify-content-around flex-wrap">
                            <p class=" text-center col-12">Jumlah saudara: </p>

                            <div class="col-3 mb-3">
                                <label for="kandung">Kandung</label>
                                <input type="number" min='0' value="<?= old('nama') ? old('nama') : 0; ?>" class="form-control" name="siswa_kandung" id="kandung">
                                <div class="invalid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="tiri">Tiri</label>
                                <input type="number" min='0' value="<?= old('nama') ? old('nama') : 0; ?>" class="form-control" name="siswa_tiri" id="tiri">
                                <div class="invalid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="angkat">Angkat</label>
                                <input type="number" min='0' value="<?= old('nama') ? old('nama') : 0; ?>" class="form-control" name="siswa_angkat" id="angkat">
                                <div class="invalid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 mb-3">
                            <label for="bahasa">Bahasa sehari-hari</label>
                            <input type="text" value="<?= old('nama') ?>" class="form-control" placeholder="Ex: Bahasa Indonesia" name="siswa_bahasa" id="bahasa">
                            <div class="invalid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="col-12 d-flex justify-content-end">
                        <a href="<?= route_to('siswa_list'); ?>" class="btn btn-outline-danger m-2">kembali</a>
                        <button type="submit" class="my-2 ml-2 btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/typed.js"></script>
<script>
    var typed = new Typed('.typed', {
        strings: ["Keterangan Pribadi"],
        typeSpeed: 80,
        showCursor: false
    });
</script>
<?= $this->endSection() ?>