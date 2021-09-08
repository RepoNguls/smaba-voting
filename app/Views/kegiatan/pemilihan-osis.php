<h6 class="mb-0 text-uppercase">Pemilihan Ketua Osis</h6>
<hr>
<div class="card">
    <div class="card-body">
        <h6 class="mb-0 text-uppercase">Pemilihan Ketua Osis Periode xxxx/xxxx</h6>
        <hr>
        Selamat datang <?= $user['nama']; ?>
        <br><br>
        Silahkan pilih calon kandidat ketua dan wakil ketua OSIS SMAN 1 Barambai tahun pelajaran xxxx/xxxx
    </div>
</div>
<?php
$timestampMulai = strtotime($dataKegiatan['date_start']);
$timestampAkhir = strtotime($dataKegiatan['date_end']);

if ($timestampMulai > now() or $timestampAkhir < now()) {
    if ($user['kegiatan'] == 1) { ?>
        <div class="col"></div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
                <?php
                $pilihanUser = $pilihan;
                foreach ($pilihanUser as $value) { ?>
                    <div class="col"></div>
                    <div class="col">
                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <h6 class="mb-0 text-uppercase">Pemilihan berakhir</h6>
                                <h6 class="mb-0 text-uppercase">Pilihan anda</h6>
                                <hr>
                                <div class="p-4 border radius-15">
                                    <h6 class="mb-0 text-uppercase">Paslon Nomor <?= $value['nomor_id']; ?></h6>
                                    <hr>
                                    <img src="<?php echo base_url(); ?>/assets/images/avatars/avatar-1.png" width="110" height="110" class="shadow" alt="">

                                    <h5 class="mb-0 mt-5"><?= $value['nama']; ?></h5>
                                    <p class="mb-3"><?= $value['kelas']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col"></div>
        <?php
                }
        ?>

        </div>
        </div>
    <?php
    } else {
    ?>
        <div class="col"></div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
                <div class="col"></div>
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">
                            <h6 class="mb-0 text-uppercase">Pemilihan berakhir</h6>
                            <h6 class="mb-0 text-uppercase">Pilihan anda</h6>
                            <hr>
                            <div class="p-4 border radius-15">
                                <h6 class="mb-0 text-uppercase">Golput</h6>
                                <hr>
                                <img src="<?php echo base_url(); ?>/assets/images/avatars/avatar-1.png" width="110" height="110" class="shadow" alt="">

                                <h5 class="mb-0 mt-5">Tidak ada</h5>
                                <p class="mb-3">Tidak ada</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        <?php
    }
} else {
        ?>
        <?php
        if ($user['kegiatan'] == 1) { ?>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
                    <?php
                    $pilihanUser = $pilihan;
                    foreach ($pilihanUser as $value) { ?>
                        <div class="col"></div>
                        <div class="col">

                            <div class="card radius-15">
                                <div class="card-body text-center">
                                    <h6 class="mb-0 text-uppercase">Pilihan anda</h6>
                                    <hr>
                                    <div class="p-4 border radius-15">
                                        <h6 class="mb-0 text-uppercase">Paslon Nomor <?= $value['nomor_id']; ?></h6>
                                        <hr>
                                        <img src="<?php echo base_url(); ?>/assets/images/avatars/avatar-1.png" width="110" height="110" class="shadow" alt="">

                                        <h5 class="mb-0 mt-5"><?= $value['nama']; ?></h5>
                                        <p class="mb-3"><?= $value['kelas']; ?></p>

                                        <div class="d-grid"> <a href="#" OnClick="ganti(1);" class="btn btn-outline-primary radius-15" id="btn">Ganti Pilihan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        <?php
        } else {
        ?>


            <div class="card-body">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <?php
                    $list = $calon;
                    foreach ($list as $value) { ?>
                        <div class="col">
                            <div class="card radius-15">
                                <div class="card-body text-center">
                                    <div class="p-4 border radius-15">
                                        <h6 class="mb-0 text-uppercase">Paslon Nomor <?= $value['nomor_id']; ?></h6>
                                        <hr>
                                        <img src="<?php echo base_url(); ?>/assets/images/avatars/avatar-1.png" width="110" height="110" class="shadow" alt="">

                                        <h5 class="mb-0 mt-5"><?= $value['nama']; ?></h5>
                                        <p class="mb-3"><?= $value['kelas']; ?></p>

                                        <div class="d-grid"> <a OnClick="saveAsNewName(<?= $value['nomor_id']; ?>);" href="#" class="btn btn-outline-primary radius-15" id="btn">Pilih</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><?php
                            }
                        }
                    }
                                ?>

                </div>
            </div>
        </div>

        <script>
            function saveAsNewName(el) {
                var values = {
                    'pilihan': el
                };
                $.ajax({
                    url: "<?php echo base_url(); ?>/kegiatan/pemilihan-osis/pilih",
                    type: "POST",
                    data: values,
                }).done(function(result) {
                    window.location.reload();
                });
            }
        </script>

        <script>
            function ganti(el) {
                var values = {
                    'pilihan': el
                };
                $.ajax({
                    url: "<?php echo base_url(); ?>/kegiatan/pemilihan-osis/ganti",
                    type: "POST",
                    data: values,
                }).done(function(result) {
                    window.location.reload();
                });
            }
        </script>
        <!--end row-->