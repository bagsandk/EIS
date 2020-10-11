<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row d-flex justify-content-between">
					<h4 class="card-title">Data Table</h4>
				</div>
				<?php echo form_open('user_bidang/edit/' . $user_bidang['id'], array("class" => "form-horizontal")); ?>

				<div class="form-group">
					<label for="user_id" class="col-md-4 control-label">User</label>
					<div class="col-md-8">
						<select name="user_id" class="form-control">
							<option value="">Select user</option>
							<?php
							foreach ($all_users as $user) {
								$selected = ($user['id'] == $user_bidang['user_id']) ? ' selected="selected"' : "";

								echo '<option value="' . $user['id'] . '" ' . $selected . '>' . $user['name'] . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('user_id'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="bidang_id" class="col-md-4 control-label">Bidang</label>
					<div class="col-md-8">
						<select name="bidang_id" class="form-control">
							<option value="">Select bidang</option>
							<?php
							foreach ($all_bidangs as $bidang) {
								$selected = ($bidang['id'] == $user_bidang['bidang_id']) ? ' selected="selected"' : "";

								echo '<option value="' . $bidang['id'] . '" ' . $selected . '>' . $bidang['bidang'] . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('bidang_id'); ?></span>
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