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
                <li class="breadcrumb-item"><button class="btn btn-sm btn-outline-success">unduh &nbsp;<i class="fa fa-cloud-download-alt"></i></button></li>
            </ol>

        </nav>
    </div>
    <div class="col-12 d-flex align-items-start justify-content-center flex-wrap">
        <div class="col-lg-6 col-sm-12 px-3 d-flex justify-content-center flex-wrap">
            <div class="card col-12 mb-3">
                <div class="card-body position-relative">
                    <a href="<?= route_to('siswa_edit', $siswa['siswa_nis']); ?>" class="position-absolute btn btn-sm btn-outline-success" style="right:4%;top:15px;cursor:pointer;">
                        atur <i class="fa fa-pen"></i>
                    </a>
                    <h4>A. Data Pribadi</h4>
                    <table class="table table-bordered table-hover mt-4">
                        <tr>
                            <th>NIS</th>
                            <td><?= $siswa['siswa_nis']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $siswa['siswa_nama']; ?></td>
                        </tr>
                        <tr>
                            <th>Panggilan</th>
                            <td><?= $siswa['siswa_nick']; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis kelamin</th>
                            <td><?= $siswa['siswa_jk']; ?></td>
                        </tr>
                        <tr>
                            <th>Tempat/tanggal lahir</th>
                            <td><?= $siswa['siswa_tempat_lahir'] . ', ' . $siswa['siswa_tanggal_lahir']; ?></td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td><?= $siswa['siswa_agama']; ?></td>
                        </tr>
                        <tr>
                            <th>Kewarganegaraan</th>
                            <td><?= $siswa['siswa_kewarganegaraan']; ?></td>
                        </tr>
                        <tr>
                            <th>Anak ke</th>
                            <td><?= $siswa['siswa_order']; ?></td>
                        </tr>
                        <tr>
                            <th>Saudara kandung</th>
                            <td><?= $siswa['siswa_kandung']; ?></td>
                        </tr>
                        <tr>
                            <th>Saudara tiri</th>
                            <td><?= $siswa['siswa_tiri']; ?></td>
                        </tr>
                        <tr>
                            <th>Saudara angkat</th>
                            <td><?= $siswa['siswa_angkat']; ?></td>
                        </tr>
                        <tr>
                            <th>Bahsa sehari-hari</th>
                            <td><?= $siswa['siswa_bahasa']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_pendidikan', $siswa['siswa_nis']); ?>" class="position-absolute btn btn-sm btn-outline-success" style="right:4%;top:15px;cursor:pointer;">
                        atur <i class="fa fa-pen"></i>
                    </a>
                    <h4>D. Data Pendidikan</h4>

                    <ol style="line-height: 160%;">
                        <li>
                            <h class="col-5">Pendidikan sebelumnya</h>
                            <table class="table table-bordered table-hover mt-2">
                                <tr>
                                    <th>Lulusan dari</th>
                                    <td><?= $siswa['siswa_dari']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal dan no STTB</th>
                                    <td><?= $siswa['siswa_sebelum_tanggal'] . ',' . $siswa['siswa_sebelum_sttb']; ?></td>
                                </tr>
                                <tr>
                                    <th>Lama belajar</th>
                                    <td><?= $siswa['siswa_sebelum_lama'] . ' tahun'; ?></td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <h class="col-5">Pindahan</h>
                            <table class="table table-bordered table-hover mt-2">
                                <tr>
                                    <th>Sekolah / Madrasah</th>
                                    <td><?= $siswa['siswa_pindah_dari']; ?></td>
                                </tr>
                                <tr>
                                    <th>Alasan</th>
                                    <td><?= $siswa['siswa_pindah_alasan']; ?></td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            <h class="col-5">Diterima di Madrasah ini</h>
                            <table class="table table-bordered table-hover mt-2">
                                <tr>
                                    <th>Tingkat / Kelas</th>
                                    <td><?= $siswa['siswa_kelas']; ?></td>
                                </tr>
                                <tr>
                                    <th>Program studi</th>
                                    <td><?= $siswa['siswa_prodi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal diterima</th>
                                    <td><?= $siswa['siswa_tanggal_diterima']; ?></td>
                                </tr>
                            </table>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_orangtua', $siswa['siswa_nis']); ?>" class="position-absolute btn btn-sm btn-outline-success" style="right:4%;top:15px;cursor:pointer;">
                        atur <i class="fa fa-pen"></i>
                    </a>
                    <h4 class="mb-4">E. Data Orang Tua</h4>
                    <?php foreach ($orangtua as $o) : ?>
                        <ol>
                            <li>

                                <?= $o['orangtua_role']; ?>
                                <table class="table table-bordered table-hover mt-2">
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $o['orangtua_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat/tanggal lahir</th>
                                        <td><?= $o['orangtua_tempat_lahir'] . ',' . $o['orangtua_tanggal_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td><?= $o['orangtua_agama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kewarganegaraan</th>
                                        <td><?= $o['orangtua_kewarganegaraan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pendidikan</th>
                                        <td><?= $o['orangtua_pendidikan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaaan</th>
                                        <td><?= $o['orangtua_pekerjaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Penghasilan</th>
                                        <td><?= $o['orangtua_penghasilan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td><?= $o['orangtua_telepon']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><?= $o['orangtua_status']; ?></td>
                                    </tr>
                                </table>
                            </li>
                        </ol>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
        <div class="col-lg-6 px-3 col-sm-12 d-flex justify-content-center flex-wrap">
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_alamat', $siswa['siswa_nis']); ?>" class="position-absolute btn btn-sm btn-outline-success" style="right:4%;top:15px;cursor:pointer;">
                        atur <i class="fa fa-pen"></i>
                    </a>
                    <h4>B. Tempat Tinggal</h4>
                    <table class="table table-bordered table-hover mt-4">
                        <tr>
                            <th>Alamat</th>
                            <td><?= $siswa['siswa_alamat']; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat wali</th>
                            <td><?= $siswa['siswa_alamat_wali']; ?></td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td><?= $siswa['siswa_telepon']; ?></td>
                        </tr>
                        <tr>
                            <th>Status tinggal</th>
                            <td><?= $siswa['siswa_tinggal']; ?></td>
                        </tr>
                        <tr>
                            <th>Jarak</th>
                            <td><?= $siswa['siswa_jarak'] . ' Km'; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_penyakit', $siswa['siswa_nis']); ?>" class="position-absolute btn btn-sm btn-outline-success" style="right:4%;top:15px;cursor:pointer;">
                        atur <i class="fa fa-pen"></i>
                    </a>
                    <h4>C. Data Kesehatan</h4>
                    <table class="table table-bordered table-hover mt-4">
                        <tr>
                            <th>Golongan darah</th>
                            <td><?= $siswa['siswa_golongan_darah']; ?></td>
                        </tr>
                        <tr>
                            <th>Penyakit</th>
                            <td>
                                <?php if ($penyakit != null) : ?>
                                    <?php foreach ($penyakit as $p) : ?>
                                        <?= $p['penyakit_nama'] . ', '; ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Kelainan jasmani</th>
                            <td><?= $siswa['siswa_kelainan']; ?></td>
                        </tr>
                        <tr>
                            <th>Tinggi badan</th>
                            <td><?= $siswa['siswa_tinggi'] . ' cm'; ?></td>
                        </tr>
                        <tr>
                            <th>Berat badan</th>
                            <td><?= $siswa['siswa_berat'] . ' Kg'; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_kegemaran', $siswa['siswa_nis']); ?>" class="position-absolute btn btn-sm btn-outline-success" style="right:4%;top:15px;cursor:pointer;">
                        atur <i class="fa fa-pen"></i>
                    </a>
                    <h4>F. Data Kegemaran</h4>
                    <table class="table table-bordered table-hover mt-4">
                        <tr>
                            <th>Kesenian</th>
                            <td>
                                <?php foreach ($kesenian as $k) : ?>
                                    <?= $k['kegemaran_nama'] . ', '; ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Olahraga</th>
                            <td>
                                <?php foreach ($olahraga as $k) : ?>
                                    <?= $k['kegemaran_nama'] . ', '; ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Organisasi</th>
                            <td>
                                <?php foreach ($organisasi as $k) : ?>
                                    <?= $k['kegemaran_nama'] . ', '; ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Lain_lain</th>
                            <td>
                                <?php foreach ($lain_lain as $k) : ?>
                                    <?= $k['kegemaran_nama'] . ', '; ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_perkembangan', $siswa['siswa_nis']); ?>" class="position-absolute btn btn-sm btn-outline-success" style="right:4%;top:15px;cursor:pointer;">
                        atur <i class="fa fa-pen"></i>
                    </a>
                    <h4 class="mb-3">G. Data Perkembangan</h4>
                    <ol>
                        <li>Beasiswa <br>
                            <table class="table table-bordered text-center table-hover mt-4">
                                <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Kelas</th>
                                        <th>Dari</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($beasiswa as $k) : ?>
                                        <tr>
                                            <td class="col-2"><?= $k['beasiswa_tahun']; ?></td>
                                            <td class="col-2"><?= $k['beasiswa_kelas']; ?></td>
                                            <td><?= $k['beasiswa_dari']; ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </li>
                        <li>
                            Meninggalkan Madrasah <br>
                            <table class="table table-bordered table-hover mt-4">
                                <tr>
                                    <th>Tanggal meninggalkan</th>
                                    <td>
                                        <?= $siswa['siswa_tanggal_meninggalkan']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alasan Meninggalkan</th>
                                    <td>
                                        <?= $siswa['siswa_alasan_meninggalkan']; ?>
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>
                            Akhir Pendidikan <br>
                            <table class="table table-bordered table-hover mt-4">
                                <tr>
                                    <th>Tamat belajar</th>
                                    <td>
                                       tahun <?= $siswa['siswa_tamat_tahun']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>STTB Nomor</th>
                                    <td>
                                        <?= $siswa['siswa_tamat_sttb']; ?>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card col-12 mb-3">
                <div class="card-body">
                    <a href="<?= route_to('siswa_tracker',$siswa['siswa_nis']); ?>" class="position-absolute btn btn-sm btn-outline-success" style="right:4%;top:15px;cursor:pointer;">
                        atur <i class="fa fa-pen"></i>
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
    <?php elseif (session()->getFlashData('insert')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil menambah <?= session()->getFlashData('data'); ?>',
            showConfirmButton: false,
            timer: 950
        })
    <?php endif ?>
</script>
<?= $this->endSection() ?>