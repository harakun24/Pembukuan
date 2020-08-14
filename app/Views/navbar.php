<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3">
    <a class="navbar-brand" href="#">Pembukuan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-4">
            <li class="nav-item active">
                <a class="nav-link" href="#">Siswa <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Wali</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tracker</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Batch
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Siswa</a>
                    <a class="dropdown-item" href="#">Wali</a>
                    <a class="dropdown-item" href="#">Unduh data</a>
                </div>
            </li>
        </ul>
        <form class="col-md-8 col-sm-12 form-inline my-2 my-lg-0 d-flex" method="get" action="">
            <input name="keyword" class="form-control mr-sm-2" type="search" placeholder="Tulis sesuatu.." aria-label="Search" value="<?= (isset($keyword))?$keyword:'' ?>">
            <button class="btn btn-outline-light mx-0 px-4 my-sm-0" type="submit">Cari</button>
        </form>
    </div>
</nav>