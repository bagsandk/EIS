<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row d-flex justify-content-between">
					<h4 class="card-title">Data Table</h4>
				</div>
				<?php echo form_open('user_access_menu/add', array("class" => "form-horizontal")); ?>

				<div class="form-group">
					<label for="role_id" class="col-md-4 control-label">User Role</label>
					<div class="col-md-8">
						<select name="role_id" class="form-control">
							<option value="">Select role</option>
							<?php
							foreach ($all_user_roles as $user_role) {
								$selected = ($user_role['id'] == $this->input->post('role_id')) ? ' selected="selected"' : "";

								echo '<option value="' . $user_role['id'] . '" ' . $selected . '>' . $user_role['role'] . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('role_id'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="menu_id" class="col-md-4 control-label">User Menu</label>
					<div class="col-md-8">
						<select name="menu_id" class="form-control">
							<option value="">Select menu</option>
							<?php
							foreach ($all_user_menus as $user_menu) {
								$selected = ($user_menu['id'] == $this->input->post('menu_id')) ? ' selected="selected"' : "";

								echo '<option value="' . $user_menu['id'] . '" ' . $selected . '>' . $user_menu['title'] . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('menu_id'); ?></span>
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