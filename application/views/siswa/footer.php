<?php

$session = $this->session->userdata('user');
$select = $this->db->query("SELECT * FROM tb_siswa INNER JOIN tb_jurusan ON tb_siswa.jurusan = tb_jurusan.nama_singkat WHERE user = '$session' ");
$fetch = $select->row();

?>

<!-- NAVBAR BOTTOM -->

<nav class="navbar fixed-bottom navbar-light" id="menu-bawah">
	<div class="col">
		<a class="navbar-brand" href="<?= base_url('siswa') ?>"><i class="fa fa-home" id="icon-home"></i> </a>
	</div>
	<?php

	$oo 	= $fetch->id_siswa;
	$cek 	= $this->db->query("SELECT * FROM tb_notif WHERE id_siswa = '$oo' ");
	$joo	= $cek->row();
	$num	= $cek->num_rows();
	if ($cek->num_rows() > 0) {
		?>
		<div class="col mr--3">
			<a class="navbar-brand" href="<?= base_url('siswa/notif/') . $fetch->id_siswa ?>"><i class="fa fa-bell" id="icon-home"></i> <span class="not"><?= $num ?></span></a>
		</div>
	<?php } else { ?>
		<div class="col ">
			<a class="navbar-brand" href="<?= base_url('siswa/notif/') . $fetch->id_siswa ?>"><i class="fa fa-bell" id="icon-home"></i> </a>
		</div>
	<?php } ?>
	<div class="col">
		<a class="navbar-brand" href="<?= base_url('siswa/absensi/') . $fetch->id_siswa ?>"><i class="ni ni-calendar-grid-58" id="icon-home"></i> </a>
	</div>
	<div class="col text-right">
		<a class="navbar-brand" href="<?= base_url('login/logout') ?>"><i class="ni ni-user-run" id="icon-home"></i> </a>
	</div>
</nav>

</div>

<script src="<?php echo base_url('assets/js/plugins/script.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<!--   Optional JS   -->
<script src="<?php echo base_url('assets/js/plugins/chart.js/dist/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/chart.js/dist/Chart.extension.js') ?>"></script>
<!--   Argon JS   -->
<script src="<?php echo base_url('assets/js/argon-dashboard.min.js?v=1.1.0') ?>"></script>
<script src="<?php echo base_url('assets/js/particles.js') ?>"></script>


<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
	window.TrackJS &&
		TrackJS.install({
			token: "ee6fab19c5a04ac1a32a645abde4613a",
			application: "argon-dashboard-free"
		});
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>

</html>