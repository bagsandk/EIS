<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row d-flex justify-content-between">
					<h4 class="card-title">Data Table</h4>
				</div>
				<?php echo form_open('api/edit/' . $api['id'], array("class" => "form-horizontal")); ?>

				<div class="form-group">
					<label for="method" class="col-md-4 control-label">Method</label>
					<div class="col-md-8">
						<select name="method" class="form-control">
							<option value="">select</option>
							<?php
							$method_values = array(
								'GET' => 'GET',
								'POST' => 'POST',
								'PUT' => 'PUT',
								'PATCH' => 'PATCH',
								'DELETE' => 'DELETE',
							);

							foreach ($method_values as $value => $display_text) {
								$selected = ($value == $api['method']) ? ' selected="selected"' : "";

								echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('method'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="api_name" class="col-md-4 control-label">Api Name</label>
					<div class="col-md-8">
						<input type="text" name="api_name" value="<?php echo ($this->input->post('api_name') ? $this->input->post('api_name') : $api['api_name']); ?>" class="form-control" id="api_name" />
						<span class="text-danger"><?php echo form_error('api_name'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="url" class="col-md-4 control-label">Url</label>
					<div class="col-md-8">
						<input type="text" name="url" value="<?php echo ($this->input->post('url') ? $this->input->post('url') : $api['url']); ?>" class="form-control" id="url" />
						<span class="text-danger"><?php echo form_error('url'); ?></span>
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