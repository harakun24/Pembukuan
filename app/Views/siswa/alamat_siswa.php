<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12 mt-0 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Pembukuan</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Siswa</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_detail', $siswa['siswa_nis']); ?>"><?= $siswa['siswa_nama']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Tempat tinggal</li>
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
                <h3 class="text-center mt-2">Data Tempat tinggal</h3>

                <form action="<?= route_to('siswa_save'); ?>" method="post" class="form p-4">
                    <?= csrf_field(); ?>

                    <!-- row -->


                    <div class="row d-flex justify-content-between">
                        <div class="col-12 mb-3">
                            <label for="alamat">Alamat <span class="text-danger" style="font-size:100%">*</span></label>
                            <textarea style="height:100%" value="<?= old('siswa_alamat'); ?>" class="<?= $val->hasError('siswa_alamat') ? 'is-invalid' : ''; ?> form-control" placeholder="Ex: 0449" name="siswa_alamat" id="alamat" required></textarea>
                            <div class="invalid-feedback">
                                <?= $val->getError('siswa_nis'); ?>
                            </div>
                        </div>
                        <div class="col-12 mt-4 mb-3 d-flex justify-content-between flex-wrap">
                            <div class="col-sm-4 col-12">
                                <label for="notelp">Nomor Telepon</label>
                               <div class="col-12 d-flex justify-content-start">

                                   <label for="notelp" class="col-2 col-form-label">+62</label>
                                   <div class="col-10">
                                       <input type="text" value="<?= old('siswa_telepon'); ?>" class="form-control is-invalid" placeholder="Ex: 821345xxx" name="siswa_telepon" id="notelp" required>
                                       <div class="invalid-feedback">
                                           ssdsdsds
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-12">
                                <label for="siswa_tinggal">Status tinggal</label>
                                <!-- <input type="text" value="<?= old('siswa_nick'); ?>" class="form-control" placeholder="Ex: Andi" name="siswa_nick" id="nick"> -->
                                <select name="siswa_tinggal" class="form-control" id="siswa_tinggal">
                                    <option value="Orang tua">Orang tua</option>
                                    <option value="Saudara">Saudara</option>
                                    <option value="Asrama">Asrama</option>
                                    <option value="Kost">Kost</option>
                                </select>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="col-sm-3 col-12">
                                <label for="notelp">Jarak</label>
                               <div class="col-12 d-flex justify-content-between">

                                   <div class="col-8">
                                       <input type="number" step="0.1" min="0" value="<?= old('siswa_jarak')?old('siswa_jarak'):0; ?>" class="form-control is-invalid" name="siswa_telepon" id="notelp" required>
                                       <div class="invalid-feedback">
                                           ssdsdsds
                                        </div>
                                    </div>
                                    <label for="notelp" class="col-3 col-form-label">Km</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- row -->
                    <div class="col-12 d-flex justify-content-end">
                        <a href="<?= route_to('siswa_list'); ?>" class="btn btn-outline-danger m-2">kembali</a>
                        <button type="submit" class="my-2 btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/typed.js"></script>
<script>
    var typed = new Typed('.typed', {
        strings: ["Keterangan Tempat tinggal"],
        typeSpeed: 80,
        showCursor: false
    });
</script>
<?= $this->endSection() ?>