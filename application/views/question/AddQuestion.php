<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card">
				<div class="card-body">
					<form action="<?=base_url("question/QuestionAdd/add")?>" method="post">
						<h2> FORM </h2>
                        <!-- Nama komponen input harus sama dengan nama kolom di tabelnya -->
						<div class="form-group">
							<label> Tipe Pertanyaan </label>
							<select name="type" class="form-control">
                            <option value="text">Text</option>
                            <option value="paragraph">Paragraph</option>
                            <option value="select">Select</option>

                            </select>
						</div>
						<div class="form-group">
							<label> Pertanyaan</label>
							<input type="text" name="the_question" class="form-control" required>
						</div>
                        <div class="form-group">
							<label> Pilihan </label>
							<textarea name="options" rows="3" class="form-control "></textarea>
						</div>
                        <div class="form-group">
							<label>Status</label>
							<input type="radio" name="status" value="active">Aktif
                            <input type="radio" name="status" value="archive">Arsip
						</div>
                        <div class="form-group">
							<label> Ordering</label>
							<input type="text" name="ordering" class="form-control" required>
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