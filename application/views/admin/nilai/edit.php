<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/ubahNilai') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai Siswa</h5>

                </div>

                <div class="modal-body">
                    <?php foreach ($edit as $d) : ?>
                    <!-- Hidden data -->
                    <input type="hidden" value="<?= $d->id_siswa ?>" name="id">
                    <div class="row">
                        <div class="col">Nama</div>
                        <div class="col">:</div>
                        <div class="col"><?= $d->nama_siswa;  ?></div>
                    </div>
                    <div class="row">
                        <div class="col">Nama Instansi</div>
                        <div class="col">:</div>
                        <div class="col text-uppercase"><?= $d->nama_perusahaan;  ?></div>
                    </div>
                    <div class="row">
                        <div class="col">Alamat Instansi</div>
                        <div class="col">:</div>
                        <div class="col"><?= $d->alamat;  ?></div>
                    </div>
                    <div class="row">
                        <div class="col">Kelas</div>
                        <div class="col">:</div>
                        <div class="col"><?= $d->kelas;  ?></div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" value="<?= $d->kerajinan ?> " name="kera">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" value="<?= $d->prestasi ?> " name="prestasi">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" value="<?= $d->disiplin ?> " name="disiplin">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" value="<?= $d->kerjasama ?> " name="kerjasama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" value="<?= $d->inisiatif ?> " name="inisiatif">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" value="<?= $d->tanggung_jawab ?> " name="tanggung">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-alternative" id="exampleFormControlInput1" value="<?= $d->ujian_prakerin ?> " name="ujian">
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>


                <div class="modal-footer">
                    <a href="<?= base_url('admin/nilaiSiswa') ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#exampleModal").modal("show");
    });
</script>