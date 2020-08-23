<?= $this->extend('template') ?>
<?= $this->section('content') ?>
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
                            <div class="d-flex">
                                <h class="col-6">NIS</h> &nbsp;&nbsp;&nbsp;&nbsp;: <?= $siswa['siswa_nis']; ?>
                            </div>
                        </li>
                        <li>Nama
                            <ol style="list-style-type: lower-alpha;">
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Nama Lengkap</h> : <?= $siswa['siswa_nama']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Nama Panggilan</h> : <?= $siswa['siswa_nick']; ?>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Jenis Kelamin</h> &nbsp;&nbsp;&nbsp;&nbsp;: <?= $siswa['siswa_jk']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">TTL</h> &nbsp;&nbsp;&nbsp;&nbsp;: <?= $siswa['siswa_tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($siswa['siswa_tanggal_lahir'])); ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Agama</h> &nbsp;&nbsp;&nbsp;&nbsp;: <?= $siswa['siswa_agama']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Kewarganegaraan</h> &nbsp;&nbsp;&nbsp;&nbsp;: <?= $siswa['siswa_kewarganegaraan']; ?>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Anak ke</h> &nbsp;&nbsp;&nbsp;&nbsp;: <?= $siswa['siswa_order']; ?>
                            </div>
                        </li>
                        <li>Jumlah saudara
                            <ol style="list-style-type: lower-alpha;">
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Kandung</h>: <?= $siswa['siswa_kandung']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Tiri</h>: <?= $siswa['siswa_tiri']; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Angkat</h>: <?= $siswa['siswa_angkat']; ?>
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Bahasa sehari-hari</h>&nbsp;&nbsp;&nbsp;&nbsp;: <?= $siswa['siswa_bahasa']; ?>
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
                    <h4>D. Data Pendidikan</h4>
                    <ol style="line-height: 160%;">
                        <li>
                            <h class="col-6">Pendidikan sebelumnya</h>
                            <ol style="list-style-type:lower-alpha">
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Lulusan dari</h>: AB+
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Tanggal dan Nomor STTB</h>: AB+
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Lama belajar</h>: AB+
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li>
                            <h class="col-6">Pindahan</h>
                            <ol style="list-style-type:lower-alpha">
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Dari Sekolah / Madrasah</h>: AB+
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Alasan</h>: AB+
                                    </div>
                                </li>
                            </ol>
                        </li>
                        <li>
                            <h class="col-6">Diterima di Madrasah ini</h>
                            <ol style="list-style-type:lower-alpha">
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Tingkat/Kelas</h>: AB+
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Program Studi</h>: AB+
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <h class="col-6">Tanggal</h>: AB+
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
                    <a href="<?= route_to('siswa_alamat',$siswa['siswa_nis']); ?>" class="position-absolute" style="right:4%;top:8px;cursor:pointer;font-size:120%">
                        <i class="fa fa-cog text-secondary"></i>
                    </a>
                    <h4>B. Tempat Tinggal</h4>
                    <ol style="line-height: 160%;">
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Alamat</h>&nbsp;&nbsp;&nbsp;&nbsp;: Protestan
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Nomor telepon</h>&nbsp;&nbsp;&nbsp;&nbsp;: Protestan
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Status tinggal</h>&nbsp;&nbsp;&nbsp;&nbsp;: Protestan
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Jarak tempat tinggal</h>&nbsp;&nbsp;&nbsp;&nbsp;: Protestan
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
                    <h4>C. Data Kesehatan</h4>
                    <ol style="line-height: 160%;">
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Golongan Darah</h>&nbsp;&nbsp;&nbsp;&nbsp;: AB+
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Penyakit</h>&nbsp;&nbsp;&nbsp;&nbsp;:
                                <ul>
                                    <li>tes</li>
                                    <li>s</li>
                                    <li>aa</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Kelainan Jasmani</h>&nbsp;&nbsp;&nbsp;&nbsp;: Letter O
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Tinggi</h>&nbsp;&nbsp;&nbsp;&nbsp;: 175 cm
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Berat</h>&nbsp;&nbsp;&nbsp;&nbsp;: 90 Kg
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
                            <div class="d-flex">
                                <h class="col-6">Kesenian</h>&nbsp;&nbsp;&nbsp;&nbsp;: AB+
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Olah raga</h>&nbsp;&nbsp;&nbsp;&nbsp;: AB+
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Organisasi</h>&nbsp;&nbsp;&nbsp;&nbsp;: AB+
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h class="col-6">Lain-lain</h>&nbsp;&nbsp;&nbsp;&nbsp;: AB+
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

<script>
</script>
<?= $this->endSection() ?>