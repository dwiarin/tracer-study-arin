<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-12">
			<div class="card">
			<div class="card-body">
			<h3> DAFTAR DATA USER </h3>
			<table class="table table-hover datatablesGeneral">
				<thead>
					<tr>
						<th> ID</th>
						<th> Nama Lengkap </th>
						<th> Email </th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($list as $row): ?>
					<tr>
						<td><?=$row['id_user']?></td>
						<td><a href="<?=base_url("public/form/detail/".$row['id_user'])?>"> <?=$row['nama_lengkap']?></a></td>
						<td><?=$row['email']?></td>
					</tr>
				<?php endforeach; ?>


				</tbody>

			</table>
				</div>
			</div>
		</div>
	</div>
</div>