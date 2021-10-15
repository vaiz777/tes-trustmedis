	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	</script>

	<!-- Include Moment.js CDN -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
	</script>

	<!-- Include Bootstrap DateTimePicker CDN -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
	</script>
	<section class="content">
		<div class="box">
			<div class="box-header">
				<div class="row">
					<!-- <input type="text" style="display: none;" id="idPeg" name="idPeg"> -->
					<a class="btn btn-success">
						<i class="fa fa-arrow-left"></i> Kembali
					</a>
					<a class="btn btn-success" href="#modalAddJadwal" data-toggle="modal" id="addJadwal" style="display:none">
						<i class="fa fa-plus"></i> Masukkan Jadwal
					</a>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div>
					<div class="form-group">
						<label class="control-label">Dokter</label>
						<div class="col-sm-7">
							<select class="form-control select2" style="width: 100%;" onchange="showDiv(this)" id="selectDokter">
								<option selected="selected" value="0">Pilih Dokter</option>
								<?php foreach ($dokter as $keyDokter) { ?>
									<option value="<?= $keyDokter->pegawai_id ?>"><?= $keyDokter->pegawai_nama ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Poli</label>
						<div class="col-sm-7">
							<select class="form-control select2" style="width: 100%;">
								<option selected="selected" value="0">Pilih Poli</option>
								<?php foreach ($poli as $keyPoli) { ?>
									<option value="<?= $keyPoli->unit_id ?>"><?= $keyPoli->unit_nama ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

				</div>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Hari </th>
							<th>Jam Awal</th>
							<th>Jam Selesai</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
					</tfoot>
				</table>
			</div>
		</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>

		</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
	<div id="modalAddJadwal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah Jadwal</h4>
				</div>
				<form class="form-horizontal" method="post" id="formJadwal">
					<div class="modal-body">
						<input type="text" id="idPeg" style="display: none;" name="idPeg">
						<div class="form-group">
							<label class="control-label">Hari</label>
							<div class="col-sm-7">
								<select class="form-control select2" style="width: 100%;" name="jadHari">
									<option selected="selected">Pilih Hari</option>
									<option value="1">Minggu</option>
									<option value="2">Senin</option>
									<option value="3">Selasa</option>
									<option value="4">Rabu</option>
									<option value="5">Kamis</option>
									<option value="6">Jum'at</option>
									<option value="7">Sabtu</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Jam Mulai</label>
							<div class="col-sm-7">
								<input class="form-control" type="text" id="dateawal" name="jadAwal" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Jam Selesai</label>
							<div class="col-sm-7">
								<input class="form-control" type="text" id="dateakhir" name="jadAkhir" />
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-info" id="btnSubmit"> Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		// Below code sets format to the
		// datetimepicker having id as
		// datetime
		$('#dateawal, #dateakhir').datetimepicker({
			format: 'hh:mm a'
		});
	</script>
	<script>
		function showDiv(select) {
			if (select.value == 0) {
				document.getElementById('addJadwal').style.display = "none";
				document.getElementById("idPeg").value = 0;
			} else {
				document.getElementById('addJadwal').style.display = "inline";
				var getValueDokter = document.getElementById("selectDokter").value;
				document.getElementById("idPeg").value = getValueDokter;
			}
		}

		$('#btnSubmit').on('click', function(e) {
			e.preventDefault();
			var data = $('#formJadwal').serialize();
			var base_url = '<?php echo base_url(); ?>'
			$.ajax({
				url: base_url + 'Jadwal/store',
				type: 'POST',
				data: data,
				success: function(data) {
					//alert(data); // here what you want to do with response
					location.reload(true);
				}
			});
			return false;
		});
	</script>
