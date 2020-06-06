<div class="container mt-3">

    <div class="row">
        <div class="col-lg6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Tamu
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/bukutamu/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari" name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Tamu</h3>
            <ul class="list-group">
                <?php foreach ($data['tamu'] as $tamu) : ?>
                    <li class="list-group-item ">
                        <?= $tamu['nama']; ?>
                        <a href="<?= BASEURL; ?>/bukutamu/hapus/<?= $tamu['id'] ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Anda yakin?');">Hapus</a>
                        <a href="<?= BASEURL; ?>/bukutamu/edit/<?= $tamu['id'] ?>" class="badge badge-success float-right ml-1 tampilModalEdit" data-toggle="modal" data-target="#formModal" data-id="<?= $tamu['id']; ?>">Edit</a>
                        <a href="<?= BASEURL; ?>/bukutamu/detail/<?= $tamu['id'] ?>" class="badge badge-primary float-right ml-1">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/bukutamu/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama disini">
                    </div>
                    <div class="form-group">
                        <label for="email">e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@contoh.com">
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Masukkan pesan disini"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>