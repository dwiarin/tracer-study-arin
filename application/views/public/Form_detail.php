	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<table border="0" align="center">
							<tbody>
								<h2 align="center"> FORM DETAIL USER </h2>
								<tr>
									<td>ID User </td> <td> : <?=$detail['id_user']?></td>
								</tr>
								<tr>
									<td>Nama Lengkap </td> <td>  : <?=$detail['nama_lengkap']?></td>
								</tr>
								<tr>
									<td>Email </td> <td> : <?=$detail['email']?></td>
								</tr>
								<tr>
								<td>
								<?php foreach ($answer as $row) : ?>
									<p> 
										<strong>
											<?=$question[$row['question_id']]['the_question']?>
										</strong>
									</p>
									<p><?=$row['the_answer']; ?></p>
								<?php endforeach; ?>
								</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>