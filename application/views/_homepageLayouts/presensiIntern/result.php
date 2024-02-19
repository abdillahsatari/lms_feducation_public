<div class="container mt-5 pt-4">
	<div class="row mt-5 pt-5">
		<div class="col-md-12 my-5 py-5 text-center">
			<h1 style="font-family: 'Courier New', Courier, monospace; font-weight: 400; font-size: 7em; color: #EE1C24;">
				<strong class="border-bottom mt-5"><?= $dataType == "clock-in" ? "SUCCESS" : "WELL DONE!";?></strong>
			</h1>
			<h3 style="font-family: 'Courier New', Courier, monospace;">
				<?= $dataType == "clock-in" ? "Have a Good Work" : "Thanks for the hard work. Have a good rest";?>
			</h3>
			<br>
			<a href="<?= base_url()?>" class="btn btn-danger btn-rounded">Back to Home</a>
		</div>
	</div>
</div>
