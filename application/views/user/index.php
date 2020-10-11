<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row d-flex justify-content-between px-4">
					<h4 class="card-title">Data Table</h4>
					<a href="<?= site_url('user/add'); ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"><i class="mdi mdi-library-plus"></i></a>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered zero-configuration">
						<thead>
							<tr>
								<th>#</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Bidang</th>
								<th>Active</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($users as $u) : ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $u['role']; ?></td>
									<td><?= $u['name']; ?></td>
									<td><?= $u['email']; ?></td>
									<td>
										<?php foreach ($bidang as $b) {
											if ($u['id'] == $b['user_id']) {
												echo '# ' . $b['bidang'] . '<br>';
											}
										} ?></td>
									<td><?= $u['is_active'] == 1 ? 'Active' : 'Inactive'; ?></td>
									<td>
										<a href="<?= site_url('user/edit/' . $u['id']); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" class="btn btn-info btn-xs"><i class="mdi mdi-lead-pencil"></i></a>
										<a href="<?= site_url('user/remove/' . $u['id']); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove" class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>