<section class="content">
  <div class="box">
    <div class="box-header">
      <a href="#modalAddPegawai" class="btn btn-success" data-toggle="modal">
        <i class="fa fa-align-left"></i> Tambah Data
      </a>      
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nomor Pegawai</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Nomor SIP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
    
    if(isset($data)){
    foreach($data as $row){
    ?>
    <tr>
       
        <td><?=$row->pegawai_nomor ?></td>
        <td><?=$row->pegawai_nama ?></td>
        <td>
					<?=$row->pegawai_jenis_kelamin ?>
				</td>
        <td><?=$row->pegawai_sip ?></td>
        <td>
					<a href="#modalEditPegawai<?php echo $row->pegawai_id?>" class="btn btn-primary" data-toggle="modal">
        		<i class="fa fa-pencil"></i> Edit
      		</a>
          <a class="btn btn-danger" href="<?php echo site_url('Pegawai/delete/'.$row->pegawai_id);?>"
               onclick="return confirm('Anda yakin?')"> <i class="fa fa-trash"></i> Hapus
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
  
 <div id="modalAddPegawai" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Produk</h4>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Pegawai/addId')?>">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label">Nomor Pegawai</label>
                  <div class="col-sm-7">
                    <input type="text" name="pegNomor" class="form-control" placeholder="Nomor Pegawai" value="<?php echo $nomor_pegawai; ?>" readonly>
                  </div>
								
                </div>

               <div class="form-group">
                  <label class="control-label">Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="pegNama" name="pegNama">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">   
                   <select class="form-control" name="pegGender">
										 <option value="L">Laki-laki</option>
										 <option value="P">Perempuan</option>
									 </select>
                  </div>
                </div>
								 <div class="form-group">
                  <label class="control-label">Nomor SIP</label>
                  <div class="col-sm-7">   
                   <input type="text" class="form-control pull-right" id="pegSIP" name="pegSIP">
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
if (isset($data)){
    foreach($data as $row){
        ?>
        <div id="modalEditPegawai<?php echo $row->pegawai_id?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data Pegawai</h3>
            </div>
              <form class="form-horizontal" method="post" action="<?php echo site_url('Pegawai/edit')?>">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">ID Pegawai</label>
                        <div class="col-sm-7">
                          <input class="form-control" name="editPegId" type="text" value="<?php echo $row->pegawai_id;?>" readonly>
                        </div>
                    </div>

                <div class="form-group">
                  <label class="control-label">Pegawai Nama</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control pull-right" id="editPegNama" name="editPegNama"value="<?php echo $row->pegawai_nama?>">
                  </div>
                </div>
               <div class="form-group">
                  <label class="control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="editPegGender">
										<?php if($row->pegawai_jenis_kelamin == "L"){?>
										 <option value="<?php echo $row->pegawai_jenis_kelamin?>" selected>Laki-laki</option>
										 <option value="P">Perempuan</option>
										<?php } else if($row->pegawai_jenis_kelamin == "P") { ?>
										<option value="L">Laki-laki</option>
										<option value="<?php echo $row->pegawai_jenis_kelamin ?>" selected>Perempuan</option>
										<?php } ?>
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="control-label">Pegawai Nomor</label>
                  <div class="col-sm-7">   
                  <input type="text" class="form-control pull-right" id="editPegNomor" name="editPegNomor" value="<?php echo $row->pegawai_nomor;?>" readonly>
                  </div>
                </div>

								<div class="form-group">
                  <label class="control-label">Pegawai SIP</label>
                  <div class="col-sm-7">   
                  <input type="text" class="form-control pull-right" id="editPegSIP" name="editPegSIP" value="<?php echo $row->pegawai_sip;?>">
                  </div>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
               </form>
            </div>
        </div>
        </div>
    <?php }
}?>
