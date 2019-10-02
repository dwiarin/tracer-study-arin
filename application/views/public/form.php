<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card">
				<div class="card-body">
					<form action="<?=base_url("public/form/proses")?>" method="post">
						<h2> FORM </h2>
						<div class="form-group">
							<label> Nama Lengkap </label>
							<input type="text" class="form-control" name="nama_lengkap" required>
						</div>
						<div class="form-group">
							<label> Email </label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-block" value="Proses">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>