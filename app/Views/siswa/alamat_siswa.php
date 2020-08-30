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
    <div class="col-sm-12 col-md-7 ml-0">
        <div class="card">
            <div class="card-body">
                <!-- <h1 class="text-center">Form isi data</h1> -->
                <h3 class="text-center mt-2">Data Tempat tinggal</h3>

                <form action="<?= route_to('siswa_alamat_save', $siswa['siswa_nis']); ?>" method="post" class="form p-4">
                    <?= csrf_field(); ?>

                    <!-- row -->


                    <div class="row d-flex justify-content-between">
                        <div class="col-12 mb-3">
                            <label for="alamat">Alamat <span class="text-danger" style="font-size:100%">*</span></label>
                            <textarea style="height:100%" maxlength="255" class="<?= $val->hasError('siswa_alamat') ? 'is-invalid' : ''; ?> form-control" placeholder="Ex: Ds. Ikan No. 496, Administrasi Jakarta Utara 34208, Jakarta" name="siswa_alamat" id="alamat" required><?= old('siswa_alamat') ? old('siswa_alamat') : $siswa['siswa_alamat']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $val->getError('siswa_alamat'); ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3 mt-4">
                            <label for="alamat_wali">Alamat Wali<span class="text-danger" style="font-size:100%">*</span></label>
                            <textarea style="height:100%" maxlength="255" class="<?= $val->hasError('siswa_alamat') ? 'is-invalid' : ''; ?> form-control" placeholder="Ex: Ds. Ikan No. 496, Administrasi Jakarta Utara 34208, Jakarta" name="siswa_alamat_wali" id="alamat_wali" required><?= old('siswa_alamat_wali') ? old('siswa_alamat_wali') : $siswa['siswa_alamat_wali']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $val->getError('siswa_alamat'); ?>
                            </div>
                        </div>
                        <div class="col-12 mt-4 d-flex align-items-center justify-content-end">
                            <label for="check" class="mr-2">Samakan alamat</label>
                            <input type="checkbox" id="check" style="transform:scale(1.5)">
                        </div>
                        <div class="col-12 mt-4 mb-3 d-flex justify-content-between flex-wrap">
                            <div class="col-sm-4 col-12">
                                <label for="notelp">Nomor Telepon</label>
                                <div class="col-12 d-flex justify-content-between">

                                    <label for="notelp" class="col-2 col-form-label">+62</label>
                                    <div class="col-10 ml-1">
                                        <input type="text" value="<?= old('siswa_telepon') ? old('siswa_telepon') : $siswa['siswa_telepon']; ?>" class="form-control <?= $val->hasError('siswa_telepon') ? 'is-invalid' : ''; ?>" placeholder="Ex: 821345xxx" name="siswa_telepon" id="notelp" required>
                                        <div class="invalid-feedback">
                                            <?= $val->getError('siswa_telepon'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-12">
                                <label for="siswa_tinggal">Status tinggal</label>
                                <!-- <input type="text" value="<?= old('siswa_nick'); ?>" class="form-control" placeholder="Ex: Andi" name="siswa_nick" id="nick"> -->
                                <?php
                                $tinggal = old('siswa_tinggal') ? old('siswa_tinggal') : $siswa['siswa_tinggal'];
                                ?>
                                <select name="siswa_tinggal" class="form-control" id="siswa_tinggal">
                                    <option value="Orang tua" <?= $tinggal == 'Orang tua' ? 'selected' : ''; ?>>Orang tua</option>
                                    <option value="Saudara" <?= $tinggal == 'Saudara' ? 'selected' : ''; ?>>Saudara</option>
                                    <option value="Asrama" <?= $tinggal == 'Asrama' ? 'selected' : ''; ?>>Asrama</option>
                                    <option value="Kost" <?= $tinggal == 'Kost' ? 'selected' : ''; ?>>Kost</option>
                                </select>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="col-sm-3 col-12">
                                <label for="jarak">Jarak</label>
                                <div class="col-12 d-flex justify-content-between">

                                    <div class="col-8">
                                        <input type="number" step="0.1" min="0" value="<?= old('siswa_jarak') ? old('siswa_jarak') : $siswa['siswa_jarak'] ? $siswa['siswa_jarak'] : 0; ?>" class="form-control <?= $val->hasError('siswa_jarak') ? 'is-invalid' : ''; ?>" name="siswa_jarak" id="jarak" required>
                                        <div class="invalid-feedback">
                                            <?= $val->getError('siswa_jarak'); ?>

                                        </div>
                                    </div>
                                    <label for="notelp" class="col-3 col-form-label">Km</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- row -->
                    <div class="col-12 d-flex justify-content-end">
                        <a href="<?= route_to('siswa_detail', $siswa['siswa_nis']); ?>" class="btn btn-outline-danger m-2">kembali</a>
                        <button type="submit" class="my-2 btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let checkbox = document.getElementById('check');
    checkbox.addEventListener('click', function() {
        let wali = '<?= $siswa['siswa_alamat_wali']; ?>';
        let siswa = document.getElementById('alamat');
        let siswa_wali = document.getElementById('alamat_wali');
        siswa_wali.value = this.checked ? siswa.value : wali;
    })
</script>
<?= $this->endSection() ?>