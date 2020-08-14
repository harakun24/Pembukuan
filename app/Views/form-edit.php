<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="col-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= route_to('bio'); ?>">Bio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $bio['id']; ?></li>
        </ol>
    </nav>
</div>
<form action="<?= route_to('updatebio'); ?>" method="post" class="form col-md-6 p-4">
    <?= csrf_field(); ?>
    <input type="hidden" name="_method" value="PATCH" />
    <input type="hidden" name="id" value="<?= $bio['id']; ?>">
    <h1>Form isi data</h1>
    <div class="col-12 mb-3">
        <label for="nama">Nama</label>
        <input type="text" value="<?= $bio['nama']; ?>" class="form-control" placeholder="nama" name="nama" id="nama" required>
        <div class="invalid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-12 mb-3">
        <label for="email">Email</label>
        <input type="email" value="<?= $bio['email']; ?>" class="form-control  <?= $val->hasError('email') ? 'is-invalid' : ''; ?>" placeholder="email" name="email" id="email" required>
        <div class="invalid-feedback">
            <?= $val->getError('email'); ?>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="m-2 btn btn-primary">Tambah</button>
        <a href="/bio/show" class="btn btn-outline-danger m-2">kembali</a>
    </div>
</form>
<script>
</script>
<?= $this->endSection() ?>