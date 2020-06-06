<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['tamu']['nama']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['tamu']['email']; ?></h6>
            <p class="card-text"><?= $data['tamu']['pesan']; ?></p>
            <a href="<?= BASEURL; ?>/bukutamu" class="card-link">Kembali</a>
            <!-- <a href="#" class="card-link">Another link</a> -->
        </div>
    </div>
</div>