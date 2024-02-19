<div class="container mt-5 pt-4">
	<div class="row mt-5 pt-5">
		<div class="col-md-12 my-5 py-5 text-center">

			<?php if ($register_status == "Success"):?>
				<h1 style="font-family: 'Courier New', Courier, monospace; font-weight: 400; font-size: 7em; color: #EE1C24;"><strong class="border-bottom mt-5">PENDAFTARAN BERHASIL!</strong></h1>
				<h3 style="font-family: 'Courier New', Courier, monospace;">
					Terima kasih telah melakukan pendaftaran
					<br>
					Silahkan beralih ke email anda untuk melanjutkan proses pendaftaran.
				</h3>
				<a href="<?= base_url('courses')?>" class="btn btn-danger btn-rounded mb-5 mt-5">Lihat Kelas Lain</a>
			<?php else:?>
				<h1 style="font-family: 'Courier New', Courier, monospace; font-weight: 400; font-size: 7em; color: #EE1C24;"><strong class="border-bottom mt-5">PENDAFTARAN GAGAL!</strong></h1>
				<h3 style="font-family: 'Courier New', Courier, monospace;">
					Pendaftaran kelas anda tidak dapat dilanjutkan saat ini
					<br>
					Silahkan hubungi admin untuk melakukan pendaftaran.
				</h3>
				<a href="https://api.whatsapp.com/send?phone=+6289505030221&text=Hello%20Feducation%20Id,%20saya%20ingin%20melakukan%20pendaftaran%20melalui%20web%20Feducation.id%20namun%20tidak%20dapat%20dilanjutkan.%20Mohon%20diarahkan." class="btn btn-danger btn-rounded mb-5 mt-5">Hubungi admin</a>
			<?php endif;?>

		</div>
	</div>
</div>
