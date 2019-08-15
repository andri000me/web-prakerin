<div style="overflow-x: hidden;">
    <?php

    if ($this->session->flashdata('absen') ==  TRUE) { ?>
        <?php
        $url = $_SERVER['REQUEST_URI'];
        header("Refresh: 1; URL=$url");
    }

    ?>
    <div class="mt-6"></div>
    <div class="kotak-satu">
        <!-- <div class="bunder-dua"></div> -->
    </div>
    <div class="kotak-dua">
        <!-- <div class="bunder"></div> -->
    </div>

    <h3 class="judul-absensi">Absensi</h3>
    <?php



    ?>
    <form id="absen">
        <?php
        foreach ($absensi as $a) :
            $id     = $a->id_siswa;
            $kue    = $this->db->query("SELECT * FROM tb_siswa WHERE id_siswa = '$id' ");
            $pecah  = $kue->row();
            $siswa  = $pecah->nama_siswa;
            $cekab  = $this->db->query("SELECT * FROM tb_absensi WHERE siswa = '$siswa' ");

            ?>

            <input type="hidden" value="<?= $a->nama_perusahaan ?>" id="perusahaan" name="perusahaan">
            <input type="hidden" value="<?= $a->alamat ?>" id="alamat" name="alamat">
            <input type="hidden" value="<?= $pecah->nama_siswa; ?>" id="siswa" name="siswa">
            <input type="hidden" value="<?= $pecah->jurusan; ?>" id="jurusan" name="jurusan">
        <?php endforeach; ?>
        <div id="my_camera" class="ml-3 mt-2"></div>

        <div class="row mt-2">
            <div class="col-1"></div>
            <div class="col-10 ml-2">
                <?php
                error_reporting(0);
                $aku = $pecah->nama_siswa;
                $cek = $this->db->query("SELECT tanggal FROM tb_absensi WHERE siswa = '$aku' ORDER BY tanggal DESC LIMIT 1 ");
                $oke = $cek->row();
                $hoo = $oke->tanggal;
                $now = date('Y-m-d');
                if ($hoo == $now) { ?>
                    <p class="btn" id="btn-sudah"><i class="ni ni-badge"></i> Sudah Absen</p>
                <?php } else if ($hoo = $now) { ?>
                    <button type="submit" class="btn btn-primary" id="absen-sa"><i class="ni ni-badge"></i> Absen</button>
                    <a href="<?php echo base_url('siswa') ?>" class="btn" style="display: none;" id="klik"><i class="ni ni-shop"></i> Klik Saya</a>
                <?php } else { ?>
                    <p class="btn" id="btn-sudah"><i class="ni ni-badge"></i> Sudah Absen</p>
                <?php } ?>
            </div>
        </div>
    </form>

    <div class="bunder-samping"></div>
    <div class="kotak-kepo" style="margin-bottom: 25%;">
        <h4 class="judul-p">Perhatian!</h4>
        <p class="isi-p">Pastikan foto anda terlihat jelas di tempat prakerin anda</p>
    </div>

</div>
<div class="fixed-bottom">
    <a href="<?php echo base_url('siswa') ?>" class="btn btn-primary" style="width: 90%; margin-bottom: -31%;  margin-left: 5%; background-color: darkblue;" id="kembali">Kembali</a>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 330,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');
</script>
<!-- Code to handle taking the snapshot and displaying it locally -->
<script type="text/javascript">
    $('#absen').on('submit', function(event) {
        event.preventDefault();
        var image = '';
        var perusahaan = $('#perusahaan').val();
        var alamat = $('#alamat').val();
        var siswa = $('#siswa').val();
        var jurusan = $('#jurusan').val();
        Webcam.snap(function(data_uri) {
            image = data_uri;
        });
        $.ajax({
                url: '<?php echo site_url("siswa/absen"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    perusahaan: perusahaan,
                    alamat: alamat,
                    siswa: siswa,
                    jurusan: jurusan,
                    image: image
                },
            })
            .done(function(data) {
                if (data > 0) {
                    Swal.fire({
                        type: "success",
                        title: "Selamat!",
                        text: "anda sudah absen hari ini",
                    });
                    $('#absensi')[0].reset();
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });


    });

    $(document).ready(function() {
        $('#absen-sa').click(function() {
            $('#absen-sa').css('display', 'none');
            // window.location.href = '../'; 
        });
    });
</script>