<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row d-flex justify-content-between">
					<h4 class="card-title">Data Table</h4>
				</div>
				<?php echo form_open('bidang_access_api/edit/' . $bidang_access_api['id'], array("class" => "form-horizontal")); ?>

				<div class="form-group">
					<label for="bidang_id" class="col-md-4 control-label">Bidang</label>
					<div class="col-md-8">
						<select name="bidang_id" class="form-control">
							<option value="">Select bidang</option>
							<?php
							foreach ($all_bidangs as $bidang) {
								$selected = ($bidang['id'] == $bidang_access_api['bidang_id']) ? ' selected="selected"' : "";

								echo '<option value="' . $bidang['id'] . '" ' . $selected . '>' . $bidang['bidang'] . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('bidang_id'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="api_id" class="col-md-4 control-label">Api</label>
					<div class="col-md-8">
						<select name="api_id" class="form-control">
							<option value="">select api</option>
							<?php
							foreach ($all_apis as $api) {
								$selected = ($api['id'] == $bidang_access_api['api_id']) ? ' selected="selected"' : "";

								echo '<option value="' . $api['id'] . '" ' . $selected . '>' . $api['url'] . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('api_id'); ?></span>
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