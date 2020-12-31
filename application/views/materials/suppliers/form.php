<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pemasok</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('materials/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title"><?=$page == 'edit' ? 'Ubah' : 'Tambah'?> pemasok</h3>
          <div class="float-right">
            <a href="<?=base_url('pemasok')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <input name="supplier_id" type="hidden" value="<?=$this->input->post('supplier_id') ?? $row->supplier_id?>">
            <div class="form-group">
              <label for="name">Nama *</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Nama" value="<?=$this->input->post('name') ?? $row->name?>">
              <small class="text-red font-italic"><?php echo form_error('name'); ?></small>
            </div>
            <div class="form-group">
              <label for="phone">Nomor telepon</label>
              <input name="phone" type="text" class="form-control" id="phone" placeholder="Contoh: 085177661596" value="<?=$this->input->post('phone') ?? $row->phone?>">
              <small class="text-red font-italic"><?php echo form_error('phone'); ?></small>
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <textarea name="address" id="address" class="form-control" rows="3" placeholder="Alamat"><?=$this->input->post('address') ?? $row->address?></textarea>
            </div>
            <div class="form-group">
              <label for="notes">Keterangan</label>
              <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Keterangan"><?=$this->input->post('notes') ?? $row->address?></textarea>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button name="<?=$page?>" type="submit" class="btn btn-primary float-right ml-2"><i class="fas fa-paper-plane"></i> Simpan</button>
            <button type="reset" class="btn btn-secondary float-right ml-2">Reset</button>
          </div>
        </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>