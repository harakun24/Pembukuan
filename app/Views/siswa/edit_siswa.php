<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12 mt-0 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Pembukuan</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Siswa</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_detail',$siswa['siswa_nis']); ?>"><?= $siswa['siswa_nama']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Pribadi</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12 col-md-7 ml-0">
        <div class="card">
            <div class="card-body">
                <!-- <h1 class="text-center">Form isi data</h1> -->
                <h3 class="text-center mt-2">Data Pribadi</h3>

                <form action="<?= route_to('siswa_update'); ?>" method="post" class="form p-4">
                    <?= csrf_field(); ?>

                    <!-- row -->

                    <div class="row d-flex justify-content-between">
                        <div class="col--md-2 col-sm-3 col-12 mb-3">
                            <label for="nis">Nis</label>
                            <input type="text" value="<?= old('siswa_nis')?old('siswa_nis'):$siswa['siswa_nis']; ?>" class="<?= $val->hasError('siswa_nis')?'is-invalid':''; ?> form-control" placeholder="Ex: 0449" name="siswa_nis" id="nis" required>
                            <div class="invalid-feedback">
                                <?= $val->getError('siswa_nis'); ?>
                            </div>
                            <input type="hidden" name="siswa_id" value="<?= old('siswa_id')?old('siswa_id'):$siswa['siswa_id']; ?>">
                        </div>
                        <div class="col-sm-8 col-12 mb-3 d-flex justify-content-between">
                            <div class="col-7">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" value="<?= old('siswa_nama')?old('siswa_nama'):$siswa['siswa_nama']; ?>" class="form-control" placeholder="Ex: Andiansyah Putra" name="siswa_nama" id="nama" required>
                                <div class="invalid-feedback">
                                     
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="nick">Panggilan</label>
                                <input type="text" value="<?= old('siswa_nick')?old('siswa_nick'):$siswa['siswa_nick']; ?>" class="form-control" placeholder="Ex: Andi" name="siswa_nick" id="nick">
                                <div class="invalid-feedback">
                                     
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- row -->

                    <div class="row d-flex justify-content-between">

                        <div class="col-lg-10 col-md-9 col-8 mb-3 position-relative">
                            <label for="jk">Jenis kelamin</label>
                            <select class="form-control" name="siswa_jk" id="jk">
                                <?php 
                                    $jk=old('siswa_jk')?old('siswa_jk'):$siswa['siswa_jk'];
                                ?>
                                <option value="laki-laki" <?= $jk=='laki-laki'?'selected':''; ?>>laki-laki</option>
                                <option value="perempuan" <?= $jk=='perempuan'?'selected':''; ?>>perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                
                            </div>
                            <span class="position-absolute mr-4" style="right:0;top:50%"><i class="fa fa-angle-down"></i></span>
                        </div>
                        <div class="col-lg-2 col-md-3 col-4 mb-3">
                            <label for="order">Anak ke</label>
                            <input type="number" value="<?= old('siswa_order') ? old('siswa_order') : $siswa['siswa_order']; ?>" min='1' class="form-control" name="siswa_order" id="order">
                            <div class="invalid-feedback">
                                 
                            </div>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row d-flex justify-content-between">
                        <div class="col-6 mb-3">
                            <label for="place">Tempat lahir</label>
                            <input type="text" value="<?= old('siswa_tempat_lahir')?old('siswa_tempat_lahir'):$siswa['siswa_tempat_lahir']; ?>" class="form-control" placeholder="Ex: Bantul" name="siswa_tempat_lahir" id="place">
                            <div class="invalid-feedback">
                                 
                            </div>
                        </div>
                        <div class="col-sm-3 col-6 mb-3">
                            <label for="date">Tanggal lahir</label>
                            <input type="date" value="<?= old('siswa_tanggal_lahir')?old('siswa_tanggal_lahir'):$siswa['siswa_tanggal_lahir']; ?>" class="form-control" name="siswa_tanggal_lahir" id="date">
                            <div class="invalid-feedback">
                                 
                            </div>
                        </div>
                        <div class="col-sm-3 col-12 mb-3 position-relative">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="siswa_agama" id="agama">
                                <?php 
                                    $agama=old('siswa_agama')?old('siswa_agama'):$siswa['siswa_agama'];
                                ?>
                                <option value="Islam" <?= $agama=='Islam'?'selected':''; ?>>Islam</option>
                                <option value="Protestan" <?= $agama=='Protestan'?'selected':''; ?>>Protestan</option>
                                <option value="Katolik" <?= $agama=='Katolik'?'selected':''; ?>>Katolik</option>
                                <option value="Hindu" <?= $agama=='Hindu'?'selected':''; ?>>Hindu</option>
                                <option value="Budha" <?= $agama=='Budha'?'selected':''; ?>>Budha</option>
                                <option value="Konghuchu" <?= $agama=='Konghuchu'?'selected':''; ?>>Konghuchu</option>
                            </select>
                            <div class="invalid-feedback">
                                 
                            </div>
                            <span class="position-absolute mr-4" style="right:0;top:50%"><i class="fa fa-angle-down"></i></span>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row d-flex justify-content-between">

                        <div class="col-sm-8 col-6 mb-3">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <input type="text" value="<?= old('siswa_kewarganegaraan')?old('siswa_kewarganegaraan'):$siswa['siswa_kewarganegaraan']; ?>" class="form-control" placeholder="Ex: Indonesia" name="siswa_kewarganegaraan" id="kewarganegaraan">
                            <div class="invalid-feedback">
                                 
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 mb-3 position-relative">
                            <label for="status">Status anak</label>
                            <select class="form-control" name="siswa_status" id="status">
                                <?php 
                                    $status=old('siswa_status')?old('siswa_status'):$siswa['siswa_status'];
                                ?>
                                <option value="Lengkap" <?= ($status=='Lengkap'?'selected':''); ?>>Lengkap</option>
                                <option value="Yatim" <?= ($status=='Yatim'?'selected':''); ?>>Yatim</option>
                                <option value="Piatu  <?= ($status=='Piatu'?'selected':''); ?>">Piatu</option>
                                <option value="Yatim Piatu"  <?= ($status=='Yatim Piatu'?'selected':''); ?>>Yatim Piatu</option>
                            </select>
                            <div class="invalid-feedback">
                                 
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
                                <input type="number" value="<?= old('siswa_kandung') ? old('siswa_kandung') : $siswa['siswa_kandung']; ?>" class="form-control" name="siswa_kandung" id="kandung">
                                <div class="invalid-feedback">
                                     
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="tiri">Tiri</label>
                                <input type="number" value="<?= old('siswa_tiri') ? old('siswa_tiri') : $siswa['siswa_tiri']; ?>" class="form-control" name="siswa_tiri" id="tiri">
                                <div class="invalid-feedback">
                                     
                                </div>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="angkat">Angkat</label>
                                <input type="number" value="<?= old('siswa_angkat') ? old('siswa_angkat') : $siswa['siswa_angkat']; ?>" class="form-control" name="siswa_angkat" id="angkat">
                                <div class="invalid-feedback">
                                     
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 mb-3">
                            <label for="bahasa">Bahasa sehari-hari</label>
                            <input type="text" value="<?= old('siswa_bahasa')?old('siswa_bahasa'):$siswa['siswa_bahasa'] ?>" class="form-control" placeholder="Ex: Bahasa Indonesia" name="siswa_bahasa" id="bahasa">
                            <div class="invalid-feedback">
                                 
                            </div>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="col-12 d-flex justify-content-end">
                        <a onclick="closed()" class="btn btn-outline-danger m-2">kembali</a>
                        <button type="submit" class="my-2 btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/sweetalert2-all.js"></script>

<script>
    function closed() {
        Swal.fire({
                title: 'Peringatan',
                text: "Data yang sudah diubah tidak akan tersimpan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, lanjut'
            })
            .then((willDelete) => {
                if (willDelete.value) {
                    document.location.replace('<?= route_to('siswa_detail',$siswa['siswa_nis']); ?>');
                } else {}
            });
    }
</script>
<?= $this->endSection() ?>