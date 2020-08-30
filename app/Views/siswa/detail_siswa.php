<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<style>
    .border-bottom {
        padding-top: 0.5em;
        padding-bottom: 0.5em;
        border: none !important;
    }

    .border-bottom:hover {
        background: #e9ebee;
    }
</style>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12 mt-0 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Pembukuan</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $siswa['siswa_nama']; ?></li>
            </ol>
        </nav>
    </div>
    <div class="col-12 d-flex align-items-start justify-content-center flex-wrap">
        <div class="col-lg-6 col-sm-12 px-3 d-flex justify-content-center flex-wrap">
            <div class="card col-12 mb-3">
                <div class="card-body position-relative">
                    <a href="<?= route_to('siswa_edit', $siswa['siswa_nis']); ?>" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:130%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>A. Data Pribadi</h4>
                    <ol style="line-height: 160%;">
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">NIS</h> &nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_nis']; ?>
                            </div>
                        </li>
                        <li>Nama
                            <ol style="list-style-type: lower-alpha;" class=" border-bottom">
                                <li>
                                    <div class="d-flex">
                                        <h class="col-5">Nama Lengkap</h>:&nbsp; <?= $siswa['siswa_nama']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-5">Nama Panggilan</h> <span>:&nbsp;</span> <?= $siswa['siswa_nick']; ?>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Jenis Kelamin</h> &nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_jk']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">TTL</h> &nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($siswa['siswa_tanggal_lahir'])); ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Agama</h> &nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_agama']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Kewarganegaraan</h> &nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_kewarganegaraan']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Anak ke</h> &nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_order']; ?>
                            </div>
                        </li>
                        <li>Jumlah saudara
                            <ol style="list-style-type: lower-alpha;" class=" border-bottom">
                                <li>
                                    <div class="d-flex">
                                        <h class="col-5">Kandung</h><span>:&nbsp;</span> <?= $siswa['siswa_kandung']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-5">Tiri</h><span>:&nbsp;</span> <?= $siswa['siswa_tiri']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-5">Angkat</h><span>:&nbsp;</span> <?= $siswa['siswa_angkat']; ?>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Bahasa sehari-hari</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_bahasa']; ?>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_pendidikan',$siswa['siswa_nis']); ?>" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:120%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>D. Data Pendidikan</h4>
                    <ol style="line-height: 160%;">
                        <li>
                            <h class="col-5">Pendidikan sebelumnya</h>
                            <ol style="list-style-type:lower-alpha">
                                <li>
                                    <div class="d-flex border-bottom">
                                        <h class="col-5">Lulusan dari</h>: <?= $siswa['siswa_dari']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex border-bottom">
                                        <h class="col-5">Tanggal dan Nomor STTB</h>: <?= $siswa['siswa_sebelum_tanggal'].','.$siswa['siswa_sebelum_sttb']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex border-bottom">
                                        <h class="col-5">Lama belajar</h>: <?= $siswa['siswa_sebelum_lama'].' tahun'; ?>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li>
                            <h class="col-5">Pindahan</h>
                            <ol style="list-style-type:lower-alpha">
                                <li>
                                    <div class="d-flex border-bottom">
                                        <h class="col-5">Dari Sekolah / Madrasah</h>: <?= $siswa['siswa_pindah_dari']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex border-bottom">
                                        <h class="col-5">Alasan</h>: &nbsp;<span><?= $siswa['siswa_pindah_alasan']; ?></span>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li>
                            <h class="col-5">Diterima di Madrasah ini</h>
                            <ol style="list-style-type:lower-alpha">
                                <li>
                                    <div class="d-flex border-bottom">
                                        <h class="col-5">Tingkat/Kelas</h>: <?= $siswa['siswa_kelas']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex border-bottom">
                                        <h class="col-5">Program Studi</h>: <?= $siswa['siswa_prodi']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex border-bottom">
                                        <h class="col-5">Tanggal</h>: <?= $siswa['siswa_tanggal_diterima']; ?>
                                    </div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="#" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:120%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>E. Data Orang Tua</h4>
                </div>
            </div>

        </div>
        <div class="col-lg-6 px-3 col-sm-12 d-flex justify-content-center flex-wrap">
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_alamat', $siswa['siswa_nis']); ?>" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:120%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>B. Tempat Tinggal</h4>
                    <ol style="line-height: 160%;">
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Alamat</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <span><?= $siswa['siswa_alamat']?$siswa['siswa_alamat']:'belum ada alamat'; ?></span> 
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Alamat Wali</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <span><?= $siswa['siswa_alamat']?$siswa['siswa_alamat_wali']:'belum ada alamat'; ?></span> 
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Nomor telepon</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> &nbsp;(+62) <?= $siswa['siswa_telepon']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Status tinggal</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_tinggal']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Jarak tempat tinggal</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> <?= $siswa['siswa_jarak']; ?> Km
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_penyakit', $siswa['siswa_nis']); ?>" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:120%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>C. Data Kesehatan</h4>
                    <ol style="line-height: 160%;">
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Golongan Darah</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>: &nbsp;</span> <?= $siswa['siswa_golongan_darah']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Penyakit</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span>
                                <ul>
                                    <?php if ($penyakit != null) : ?>

                                        <?php foreach ($penyakit as $p) : ?>
                                            <li><?= $p['penyakit_nama']; ?></li>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Kelainan Jasmani</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>: &nbsp;</span>  <?= $siswa['siswa_kelainan']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Tinggi</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>: &nbsp;</span>  <?= $siswa['siswa_tinggi']; ?> cm
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Berat</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>: &nbsp;</span>  <?= $siswa['siswa_berat']; ?> Kg
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="#" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:120%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>F. Data Kegemaran</h4>
                    <ol>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Kesenian</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> AB+
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Olah raga</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> AB+
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Organisasi</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> AB+
                            </div>
                        </li>
                        <li>
                            <div class="d-flex border-bottom">
                                <h class="col-5">Lain-lain</h>&nbsp;&nbsp;&nbsp;&nbsp;<span>:&nbsp;</span> AB+
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="#" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:120%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>G. Data Perkembangan</h4>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="#" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:120%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>H. Data Setelah Selesai</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/sweetalert2-all.js"></script>
<script>
    <?php if (session()->getFlashData('update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil diubah',
            showConfirmButton: false,
            timer: 950
        })   
        <?php elseif(session()->getFlashData('insert')): ?> 
            Swal.fire({
            icon: 'success',
            title: 'Berhasil menambah <?= session()->getFlashData('data'); ?>',
            showConfirmButton: false,
            timer: 950
        })   
    <?php endif ?>
</script>
<?= $this->endSection() ?>