<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12 mt-0 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= route_to('siswa_list'); ?>">Pembukuan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Siswa</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12 col-md-10 d-flex align-items-center justify-content-center">
        <div class="card col-12">
            <div class="card-body">
                <div class="d-flex align-items-center flex-wrap">
                    <div class="col-md-6 col-12 d-flex align-items-end">

                        <h1>Tabel siswa</h1>
                        <a href="<?= route_to('siswa_add'); ?>" class="btn btn-primary my-2 mx-3 btn-sm"><i class="fa fa-plus"></i> Tambah </a>
                    </div>
                    <div class="col-md-6 col-12 p-2 d-flex justify-content-end">

                        <form class="col-md-8 col-sm-12 form-inline my-2 my-lg-0 d-flex" method="get" action="" >
                            <input name="keyword" class="form-control mr-sm-2" type="search" <?= $keyword!=''?'autofocus':''; ?> placeholder="Tulis sesuatu.." aria-label="Search" value="<?= (isset($keyword)) ? $keyword : '' ?>" onfocus="this.setSelectionRange(this.value.length,this.value.length);">
                            <button id="searchbtn" class="btn btn-outline-primary mx-0 px-4 my-sm-0" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered table-hover text-center">
                    <thead class="text-center">
                        <tr>
                            <th class="d-none d-md-table-cell">No</th>
                            <th class="d-none d-sm-table-cell">Nis</th>
                            <th>Nama</th>
                            <th class="d-none d-lg-table-cell">Jenis kelamin</th>
                            <th class="d-none d-sm-table-cell">Kelas</th>
                            <th class="d-none d-md-table-cell">Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (5 * ($current - 1));
                        if ($siswa) :
                            foreach ($siswa as $s) : ?>

                                <tr>
                                    <td class="d-none d-md-table-cell"><?= $i++; ?></td>
                                    <td class="d-none d-sm-table-cell"><?= $s['siswa_nis']; ?></td>
                                    <td><?= $s['siswa_nama']; ?></td>
                                    <td class="d-none d-lg-table-cell"><?= $s['siswa_jk']; ?></td>
                                    <td class="d-none d-sm-table-cell"><?= $s['siswa_kelas']; ?></td>
                                    <td class="d-none d-md-table-cell"><?= $s['siswa_prodi']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= route_to('siswa_edit', $s['siswa_nis']); ?>" class="btn btn-outline-success btn-sm mx-2"><span class="d-none d-md-inline">detail</span> <i class="fa fa-external-link-alt d-md-none d-inline"></i></a>
                                        <button class="btn btn-danger btn-sm mx-2"><i class="fa fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else :
                            ?>
                            <tr>
                                <td colspan="7">Data Kosong</td>
                            </tr>
                        <?php
                        endif;
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <?= $pager->links('table', 'user_pager'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/sweetalert.min.js"></script>

<script>
    <?php if (session()->getFlashData('insert')) : ?>

        swal({
            text: "Berhasil menambah <?= session()->getFlashData('data'); ?> ",
            icon: "success",
        });
    <?php elseif (session()->getFlashData('update')) : ?>
        swal({
            text: "Data berhasil dirubah",
            icon: "success",
        });
    <?php elseif (session()->getFlashData('delete')) : ?>

        swal({
            text: "Data berhasil dihapus",
            icon: "success",
        });
    <?php else : ?>

    <?php endif ?>

    function hapus(id) {
        swal({
                title: "Peringatan",
                text: "Data yang anda pilih akan dihapus",
                icon: "warning",
                buttons: ['batal', 'lanjut'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    let bt = document.getElementById('bt-' + id);
                    bt.click();
                } else {}
            });
    }
</script>
<?= $this->endSection() ?>