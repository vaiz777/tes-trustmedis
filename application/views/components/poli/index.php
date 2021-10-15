<section class="content">
	<div class="box">
		<div class="box-header">
			<a href="#modalAddUnit" class="btn btn-success" data-toggle="modal">
				<i class="fa fa-align-left"></i> Tambah Data
			</a>
		</div><!-- /.box-header -->
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Unit Kode</th>
						<th>Unit Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					if (isset($data)) {
						foreach ($data as $row) {
					?>
							<tr>

								<td><?= $row->unit_kode ?></td>
								<td><?= $row->unit_nama ?></td>
								<td>
									<a href="#modalEditUnit<?php echo $row->unit_id ?>" class="btn btn-primary" data-toggle="modal">
										<i class="fa fa-pencil"></i> Edit
									</a>
									<a class="btn btn-danger" href="<?php echo site_url('Poli/delete/' . $row->unit_id); ?>" onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus
									</a>
								</td>
							</tr>

					<?php }
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div><!-- /.box-body -->
	</div><!-- /.box -->

</section><!-- /.content -->

<div id="modalAddUnit" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Data Poli</h4>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo site_url('Poli/add') ?>">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">Unit Kode</label>
						<div class="col-sm-7">
							<input type="text" name="polKode" class="form-control" placeholder="Unit Kode">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Unit Nama</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="polNama" name="polNama" placeholder="Unit Nama">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!----------------------------------------->
<?php
if (isset($data)) {
	foreach ($data as $row) {
?>
		<div id="modalEditUnit<?php echo $row->unit_id ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Data Poli</h4>
					</div>
					<form class="form-horizontal" method="post" action="<?php echo site_url('Poli/edit') ?>">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label">ID Unit</label>
								<div class="col-sm-7">
									<input class="form-control" name="editPolId" type="text" value="<?php echo $row->unit_id; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Unit Kode</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="editPolKode" value="<?php echo $row->unit_kode ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Unit Nama</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="editPolNama" value="<?php echo $row->unit_nama ?>">
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-info">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
<?php }
} ?>
