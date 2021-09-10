<?php

use App\Models\CalonOsis;
use App\Models\PemilihanOsisModel;

$this->calonOsis =  new CalonOsis();
$this->pemilihanOsis =  new PemilihanOsisModel();

$timestampMulai = strtotime($dataKegiatan['date_start']);
$timestampAkhir = strtotime($dataKegiatan['date_end']);
?>
<script>
    // Set the date we're counting down to
    <?php
    if ($timestampMulai > now()) {
    ?>
        var countDownDate = new Date("<?= $dataKegiatan['date_start']; ?>").getTime();
    <?php
    } else { ?>
        var countDownDate = new Date("<?= $dataKegiatan['date_end']; ?>").getTime();

    <?php } ?>
    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("sampaiDengan").innerHTML = "<b>" + days + "</b>hari <b>" + hours + "</b>jam <b>" +
            minutes + "</b>menit <b>" + seconds + "</b>detik ";

        // If the count down is finished, write some text
        if (distance < 0) {
            window.location.reload();
        }
    }, 1000);
</script>
<h6 class="mb-0 text-uppercase">Pemilihan Ketua Osis</h6>
<hr>
<div class="card">
    <div class="card-body">
        <h6 class="mb-0 text-uppercase">Pemilihan Ketua Osis Periode xxxx/xxxx</h6>
        <hr>
        Silahkan pilih calon kandidat ketua dan wakil ketua OSIS SMAN 1 Barambai tahun pelajaran xxxx/xxxx
    </div>
</div>
<?php
if ($timestampMulai > now()) {
?>
    <h6 class="mb-0 text-uppercase">Kegiatan Belum dimulai</h6>
    <p id="sampaiDengan"></p>
    <?php
    return;
}
if ($timestampAkhir < now()) {
    if ($user['kegiatan'] == 1) { ?>
        <div class="col"></div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
                <?php

                $Tertinggi = $this->pemilihanOsis->hasilPemilihanTertinggi();
                //dd($Tertinggi);
                $pilihan = $this->calonOsis->getByIDArray($Tertinggi[0]['pilihan_id']);
                $value = $pilihan;
                //dd($value);
                ?>
                <div class="col"></div>
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">
                            <h6 class="mb-0 text-uppercase">Pemilihan berakhir</h6>
                            <h6 class="mb-0 text-uppercase">Calon dengan suara terbanyak</h6>
                            <hr>
                            <div class="p-4 border radius-15">
                                <h6 class="mb-0 text-uppercase">Paslon Nomor <?= $value['nomor_id']; ?></h6>
                                <hr>
                                <img src="<?php echo base_url(); ?>/assets/images/calonosis/<?= $value['foto_id']; ?>" width="110" height="110" class="shadow" alt="">
                                <h5 class="mb-0 mt-5"><?= $value['nama']; ?></h5>
                                <p class="mb-3"><?= $value['kelas']; ?></p>
                                <h5 class="mb-0 mt-5">Dengan <?= $Tertinggi[0]['Total']; ?> Suara</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="card-body">
                <div class="chart-container1">
                    <canvas id="chart3"></canvas>
                </div>
            </div>
        </div>
        <div class="col"></div>

        <?php

        ?>
    <?php
    } else {
    ?>
        <div class="col"></div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
                <?php

                $Tertinggi = $this->pemilihanOsis->hasilPemilihanTertinggi();
                //dd($Tertinggi);
                $pilihan = $this->calonOsis->getByIDArray($Tertinggi[0]['pilihan_id']);
                $value = $pilihan;
                //dd($value);
                ?>
                <div class="col"></div>
                <div class="col">
                    <div class="card radius-15">
                        <div class="card-body text-center">
                            <h6 class="mb-0 text-uppercase">Pemilihan berakhir</h6>
                            <h6 class="mb-0 text-uppercase">Calon dengan suara terbanyak</h6>
                            <hr>
                            <div class="p-4 border radius-15">
                                <h6 class="mb-0 text-uppercase">Paslon Nomor <?= $value['nomor_id']; ?></h6>
                                <hr>
                                <img src="<?php echo base_url(); ?>/assets/images/calonosis/<?= $value['foto_id']; ?>" width="110" height="110" class="shadow" alt="">
                                <h5 class="mb-0 mt-5"><?= $value['nama']; ?></h5>
                                <p class="mb-3"><?= $value['kelas']; ?></p>
                                <h5 class="mb-0 mt-5">Dengan <?= $Tertinggi[0]['Total']; ?> Suara</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="card-body">
                <div class="chart-container1">
                    <canvas id="chart3"></canvas>
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
                        <div class="alert border-0 border-start border-2 border-primary">
                            <div class="d-flex align-items-center">
                                <div class="font-35"><i class="bx bx-bell"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-primary">Kegiatan Berakhir pada</h6>
                                    <div id="sampaiDengan"></div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="card radius-15">
                            <div class="card-body text-center">
                                <h6 class="mb-0 text-uppercase">Pilihan anda</h6>
                                <hr>
                                <div class="p-4 border radius-15">
                                    <h6 class="mb-0 text-uppercase">Paslon Nomor <?= $value['nomor_id']; ?></h6>
                                    <hr>
                                    <img src="<?php echo base_url(); ?>/assets/images/calonosis/<?= $value['foto_id']; ?>" width="110" height="110" class="shadow" alt="">

                                    <h5 class="mb-0 mt-5"><?= $value['nama']; ?></h5>
                                    <p class="mb-3"><?= $value['kelas']; ?></p>

                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-secondary radius-1" id="btn" data-bs-toggle="modal" data-bs-target="#VerticallycenteredModal<?= $value['nomor_id']; ?>">Visi dan Misi</a>
                                        <a href="#" OnClick="ganti(1);" class="btn btn-primary radius-15" id="btn">Ganti Pilihan</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="VerticallycenteredModal<?= $value['nomor_id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Visi Misi Pasangan Nomor <?= $value['nomor_id']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"><?= $value['visi_misi']; ?></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
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
            <div class="alert border-0 border-start border-2 border-primary">
                <div class="d-flex align-items-center">
                    <div class="font-35"><i class="bx bx-bell"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-primary">Kegiatan Berakhir pada</h6>
                        <div id="sampaiDengan"></div>
                    </div>
                </div>
            </div>
            <hr>
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
                                    <img src="<?php echo base_url(); ?>/assets/images/calonosis/<?= $value['foto_id']; ?>" width="110" height="110" class="shadow" alt="">

                                    <h5 class="mb-0 mt-5"><?= $value['nama']; ?></h5>
                                    <p class="mb-3"><?= $value['kelas']; ?></p>

                                    <br>
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-secondary radius-1" id="btn" data-bs-toggle="modal" data-bs-target="#VerticallycenteredModal<?= $value['nomor_id']; ?>">Visi dan Misi</a>
                                        <a OnClick="saveAsNewName(<?= $value['nomor_id']; ?>);" href="#" class="btn btn-primary radius-15" id="btn">Pilih</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="VerticallycenteredModal<?= $value['nomor_id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Visi Misi Pasangan Nomor <?= $value['nomor_id']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"><?= $value['visi_misi']; ?></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
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
                    url: "<?= $uri; ?>kegiatan/pemilihan-osis/pilih",
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
                    url: "<?= $uri; ?>kegiatan/pemilihan-osis/ganti",
                    type: "POST",
                    data: values,
                }).done(function(result) {
                    window.location.reload();
                });
            }
        </script>

        <script>
            $(function() {
                "use strict";
                new Chart(document.getElementById("chart3"), {
                    type: 'pie',
                    data: {
                        labels: [<?php

                                    foreach ($hasilPemilihan as $hasil) {
                                        $namaCalon =  $this->calonOsis->getByIDArray($hasil['pilihan_id']);
                                        $nama = $namaCalon['nama'];
                                        echo  "'$nama'" . ", ";
                                    }
                                    ?>],
                        datasets: [{
                            label: "Nama Calon",
                            backgroundColor: ["#0d6efd", "#212529", "#17a00e", "#f41127", "#ffc107"],
                            data: [<?php
                                    foreach ($hasilPemilihan as $hasil) {
                                        echo $hasil["Total"] . ",";
                                    }
                                    ?>]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: 'Hasil Pemilihan Calon Ketua OSIS'
                        }
                    }
                });

            });
        </script>
        <!--end row-->