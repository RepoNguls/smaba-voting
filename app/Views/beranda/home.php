<h6 class="mb-0 text-uppercase">Beranda</h6>
<hr>
<div class="card">
    <div class="card-body">
        <h6 class="mb-0 text-uppercase">Selamat Datang</h6>
        <hr>
        Selamat datang <?= $user['nama']; ?>, <?= $user['kelas']; ?>
        <hr>
        <div class="d-grid gap-2">
            <a href="<?php echo base_url(); ?>/user/kegiatan/pemilihan-osis" class="btn btn-dark radius-10" id="btn">Halaman Pemilihan OSIS</a>
        </div>
    </div>
</div>



<!--end row-->