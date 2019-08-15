<?php

if ($this->session->flashdata('tamdesk') ==  TRUE) : ?>
<script>
	Swal.fire({
		type: "success",
		title: "Selamat!"

	});
</script>
<?php endif;

echo $session = $this->session->userdata('user');
$select = $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_jurusan ON tb_siswa.jurusan = tb_jurusan.nama_singkat WHERE user = '$session' ");
$fetch = $select->row();
foreach ($siswa as $o) :

	?>
<div style="overflow-x:hidden">
	<h1 class="text-center" id="judul-pro"><?= substr($o->nama_siswa, 0, 10) ?></h1>
	<p class="text-jurusan"><i class="ni ni-hat-3"></i> <?= $fetch->nama_panjang; ?></p>

	<div style="overflow-y: hidden;">
		<div class="" id="back-bawah">

			<div class="justify-content-center" id="foto">
				<img src="<?= base_url('assets/uploads/profile-siswa/') . $o->foto ?>" alt="Foto Profile" id="profile">
				<p class="text-center" id="tag-pro"> <?= $o->kelas; ?> |
					<?php
						$ouy = $fetch->jk;
						if ($ouy = "L") {
							?>
					LAKI-LAKI

					<?php } else { ?>
					PEREMPUAN
					<?php } ?>
					|

					<?= $fetch->nama_singkat ?> </p>
				<div class="row">
					<div class="col-3"></div>
					<div class="col-7 justify-content-center">
						<?php
							if ($fetch->diskripsi != "") {
								?>
						<a href="" class="btn btn-icon btn-3 btn-primary" id="but" data-toggle="modal" data-target="#modal-notification2">
							<span class="btn-inner--icon"><i class="ni ni-badge"></i></span>
							<span class="btn-inner--text" style="font-family: 'exo' ">DISKRIPSI</span>
						</a>
						<?php } else { ?>
						<a href="" class="btn btn-icon btn-3 btn-primary" id="but" data-toggle="modal" data-target="#exampleModal">
							<span class="btn-inner--icon"><i class="ni ni-badge"></i></span>
							<span class="btn-inner--text" style="font-family: 'exo' ">DISKRIPSI</span>
						</a>
						<?php } ?>
						<?php
							if ($fetch->diskripsi != "") {
								?>
						<a href="" class="btn btn-icon btn-3 btn-primary" id="but" data-toggle="modal" data-target="#exampleModal2">
							<span class="btn-inner--icon"><i class="ni ni-settings-gear-65"></i></span>
							<span class="btn-inner--text" style="font-family: 'exo'">SETTING</span>
						</a>
						<?php
							} else { ?>
						<a href="" class="btn btn-icon btn-3 btn-primary" id="but" data-toggle="modal" data-target="#modal-notification3">
							<span class="btn-inner--icon"><i class="ni ni-settings-gear-65"></i></span>
							<span class="btn-inner--text" style="font-family: 'exo'">SETTING</span>
						</a>
						<?php }
							?>
					</div>
				</div>


				<p class="diskripsi-saya mt-3"><?= substr($o->diskripsi, 0, 150) ?></p>


			</div>
		</div>
	</div>
</div>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="POST" action="<?= base_url('siswa/desk') ?>">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Masukan Diskripsi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" value="<?= $fetch->id_siswa; ?>" name="id">
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukan diskripsi tentang diri anda disini" name="diskripsi"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- Modal Notifikasi -->
<div class="modal fade" id="modal-notification2" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
	<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
		<div class="modal-content bg-gradient-danger">

			<div class="modal-header">
				<h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="py-3 text-center">
					<i class="ni ni-bell-55 ni-3x"></i>
					<h4 class="heading mt-4"></h4>
					<p>Kamu tidak dapat menambah diskripsi lagi, jika ingin merubahnya silahkan klik tombol setting</p>
				</div>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, saya paham</button>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="modal-notification3" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
	<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
		<div class="modal-content bg-gradient-danger">

			<div class="modal-header">
				<h6 class="modal-title" id="modal-title-notification">Pemberitahuan</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="py-3 text-center">
					<i class="ni ni-bell-55 ni-3x"></i>
					<h4 class="heading mt-4">Tidak dapat mengakses menu setting!</h4>
					<p>Kamu belum memesukan diskripsi tentang kamu, silahkan masukan diskripsi tentang kamu terlebih dahulu</p>
				</div>

			</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Oke, saya paham</button>
			</div>

		</div>
	</div>
</div>

<!-- MODAL SETTING -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="POST" action="<?= base_url('siswa/desk') ?>">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ubah Diskripsi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<input type="hidden" value="<?= $fetch->id_siswa; ?>" name="id">
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="diskripsi"><?= $o->diskripsi ?></textarea>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Ubah</button>
				</div>
			</div>
		</div>
	</form>
</div>

<?php endforeach; ?>