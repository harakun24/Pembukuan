<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12 mt-0 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Pembukuan</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Siswa</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_detail', $siswa['siswa_nis']); ?>"><?= $siswa['siswa_nama']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Pendidikan</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12 col-md-7 ml-0">
        <div class="card">
            <div class="card-body">
                <!-- <h1 class="text-center">Form isi data</h1> -->
                <h3 class="text-center mt-2">Data Pendidikan</h3>

                <form action="<?= route_to('siswa_pendidikan_save', $siswa['siswa_nis']); ?>" method="post" class="form p-4">
                    <?= csrf_field(); ?>

                    <!-- row -->

                    <div class="row d-flex justify-content-between">
                        <h4 class="mb-2">Pendidikan sebelumnya</h4>
                        <div class="col-md-3 col-sm-8 col-12 my-2">
                            <label for="dari">Lulusan dari</label>
                            <input type="text" value="<?= $siswa['siswa_dari']; ?>" class="form-control" name="siswa_dari" id="dari">

                        </div>
                        <div class="col-md-3 col-sm-4 col-12 my-2">
                            <label for="sebelum_tanggal">Tanggal</label>
                            <input type="date" value="<?= $siswa['siswa_sebelum_tanggal']; ?>" class="form-control" name="siswa_sebelum_tanggal" id="sebelum_tanggal">

                        </div>
                        <div class="col-md-3 col-sm-4 col-12 my-2">
                            <label for="sttb">No. STTB</label>
                            <input type="text" class="form-control" value="<?= $siswa['siswa_sebelum_sttb']; ?>" name="siswa_sebelum_sttb" id="sttb">

                        </div>
                        <div class="col-md-3 col-sm-4 col-12 my-2">
                            <label for="sebelum_lama">Lama belajar (Tahun)</label>
                            <input type="number" min="1" class="form-control" value="<?= $siswa['siswa_sebelum_lama']; ?>" name="siswa_sebelum_lama" id="sebelum_lama">

                        </div>
                    </div>
                    <!-- row -->

                    <div class="row mt-4 d-flex justify-content-between">
                        <h4 class="mb-1 mt-2">Diterima di Madrasah ini</h4>
                        <div class="col-sm-4 col-12 my-2">
                            <label for="kelas">Tingkat / Kelas</label>
                            <input type="text" value="<?= $siswa['siswa_kelas']; ?>" class="form-control" name="siswa_kelas" id="kelas">

                        </div>
                        <div class="col-sm-4 col-12 my-2">
                            <label for="prodi">Rumpun / Prodi</label>
                            <input type="text" value="<?= $siswa['siswa_prodi']; ?>" class="form-control" name="siswa_prodi" id="prodi">

                        </div>
                        <div class="col-sm-4 col-12 my-2">
                            <label for="tanggal_diterima">Tanggal</label>
                            <input type="date" value="<?= $siswa['siswa_tanggal_diterima']; ?>" class="form-control" name="siswa_tanggal_diterima" id="tanggal_diterima">

                        </div>
                    </div>
                    <!-- row -->

                    <div class="row mt-4 d-flex justify-content-between">
                        <h4 class="mb-1">Pindahan</h4>
                        <div class="col-sm-6 col-12 my-2">
                            <label for="pindah_dari">Dari sekolah</label>
                            <input type="text" value="<?= $siswa['siswa_pindah_dari']; ?>" class="form-control" name="siswa_pindah_dari" id="pindah_dari">

                        </div>
                        <div class="col-sm-6 col-12 my-2">
                            <label for="pindah_alasan">Alasan</label>
                            <textarea name="siswa_pindah_alasan" value="<?= $siswa['siswa_pindah_alasan']; ?>" id="pindah_alasan" rows="3" class="form-control"></textarea>

                        </div>
                    </div>

                    <!-- row -->
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="<?= route_to('siswa_detail', $siswa['siswa_nis']); ?>" class="btn btn-outline-danger m-2">kembali</a>
                            <button type="submit" class="my-2 btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?= $this->endSection() ?>