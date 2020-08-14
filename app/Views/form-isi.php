<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="row d-flex justify-content-start">
    <div class="col-12 mt-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= route_to('bio'); ?>">Bio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
        </nav>
    </div>
    <div class="col-sm-12 col-md-5">
        <div class="bd-callout bd-callout-primary ">
            <h4>Keterangan setelah selesai pendidikan</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis distinctio molestias tempore vero accusamus ad, laboriosam dolores consequuntur, modi necessitatibus quibusdam ducimus laborum. Rem, iste!</p>
        </div>
    </div>
    <div class="container my-3 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <!-- <h1 class="text-center">Form isi data</h1> -->
                <h3 class="text-center">Setelah Selesai Pendidikan</h3>

                <form action="<?= route_to('savebio'); ?>" method="post" class="form p-4">
                    <?= csrf_field(); ?>
                    <div class="col-12 mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" value="<?= old('nama'); ?>" class="form-control" placeholder="nama" name="nama" id="nama">
                        <div class="invalid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="email">Email</label>
                        <input type="email" value="<?= old('email'); ?>" class="form-control  <?= $val->hasError('email') ? 'is-invalid' : ''; ?>" placeholder="email" name="email" id="email" required>
                        <div class="invalid-feedback">
                            <?= $val->getError('email'); ?>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="m-2 btn btn-primary">Simpan</button>
                        <a href="show" class="btn btn-outline-danger m-2">kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
</script>
<?= $this->endSection() ?>