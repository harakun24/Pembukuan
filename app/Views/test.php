<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<style>
    .swal-footer {
        display: flex;
        justify-content: center;
    }
</style>
<div class="row d-flex justify-content-center position-relative">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Bio</li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-8 col-sm-12 mb-3 p-3">
        <div class="col-8 d-flex">
            <a href="<?= route_to('addbio'); ?>" class=" col-md-2 col-sm-3 btn btn-primary d-flex justify-content-center align-items-center m-2"> <i class="fa fa-plus"></i> &nbsp;Tambah</a>
            <a href="<?= route_to('addbio'); ?>" class=" col-md-2 col-sm-3 btn btn-outline-primary d-flex justify-content-center align-items-center m-2"> <i class="fa fa-file-download"></i> &nbsp;Unduh</a>
        </div>

        <table class="table" id="myTable">
            <thead>
                <th>No. </th>
                <th>Nama</th>
                <th class="d-none d-md-table-cell">Email</th>
                <th class="col-3" style="min-width:142px"> Aksi</th>
            </thead>
            <?php $i = 1 + (5 * ($current - 1));
            foreach ($bio as $b) : ?>

                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $b['nama']; ?></td>
                    <td class="d-none d-md-table-cell"><?= $b['email']; ?></td>
                    <td class="d-flex justify-content-center">
                        <a href="<?= route_to('editbio', $b['id']); ?>" class="m-2 btn btn-sm btn-outline-success">edit <i class="fa fa-pen"></i></a>
                        <form class="d-none" action="<?= route_to('hapusbio', $b['id']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" id="bt-<?= $b['id']; ?>" class="m-2 btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
                        </form>
                        <button type="submit" onclick="hapus(<?= $b['id']; ?>)" class="m-2 btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <?= $pager->links('table', 'user_pager'); ?>
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