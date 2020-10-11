<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row d-flex justify-content-between">
					<h4 class="card-title">Data Table</h4>
				</div>
				<?php echo form_open('bidang/edit/' . $bidang['id'], array("class" => "form-horizontal")); ?>

				<div class="form-group">
					<label for="bidang" class="col-md-4 control-label">Bidang</label>
					<div class="col-md-8">
						<input type="text" name="bidang" value="<?php echo ($this->input->post('bidang') ? $this->input->post('bidang') : $bidang['bidang']); ?>" class="form-control" id="bidang" />
						<span class="text-danger"><?php echo form_error('bidang'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button type="submit" class="btn btn-success">Save</button>
					</div>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>