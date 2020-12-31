<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Bahan</h1>
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
          <h3 class="card-title"> bahan</h3>
          <div class="float-right">
            <a href="<?=base_url('daftar_bahan')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post" enctype="multipart/form-data">
          <input name="material_id" type="hidden" value="">
          <div class="form-group">
            <label for="date">Tanggal *</label>
            <input name="date" type="date" class="form-control" id="date" value="">
            <small class="text-red font-italic"><?php echo form_error('date'); ?></small>
          </div>
          <div class="form-group">
            <label for="barcode">Kode bar</label>
            <div id="barcode" class="input-group input-group-sm">
              <input type="text" class="form-control">
              <span class="input-group-append">
                <button type="button" class="btn btn-secondary btn-flat"><i class="fas fa-search"></i></button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="material_id">Nama bahan *</label>
            <input type="text" id="material_id" class="form-control" placeholder="Enter ..." disabled="">
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label>Satuan barang</label>
                <input name="" type="number" class="form-control" placeholder="-" disabled="">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label>Jumlah awal</label>
                <input name="" type="number" class="form-control" placeholder="-" disabled="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
          </div>
          <div class="form-group">
            <label for="supplier">Pemasok</label>
            <select id="supplier" class="form-control">
              <option>option 1</option>
              <option>option 2</option>
              <option>option 3</option>
              <option>option 4</option>
              <option>option 5</option>
            </select>
            <?php // echo form_dropdown('category', $category, $selected_category, ['class' => 'form-control']) ?>
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" placeholder="Enter ...">
          </div>
          <div class="card-footer">
            <button name="" type="submit" class="btn btn-primary float-right ml-2"><i class="fas fa-paper-plane"></i> Simpan</button>
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