<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Produk</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('products/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title"><?=$page == 'edit' ? 'Ubah' : 'Tambah'?> produk</h3>
          <div class="float-right">
            <a href="<?=base_url('produk/daftar_produk')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali 
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post">
          <input name="product_id" type="hidden" value="<?=$this->input->post('product_id') ?? $row->product_id?>">
          <div class="form-group">
            <label for="barcode">Kodebar *</label>
            <input name="barcode" type="hidden" value="<?=$this->input->post('barcode') ?? $row->barcode?>">
            <input name="" type="text" class="form-control" id="barcode" placeholder="<?=$this->input->post('barcode') ?? $row->barcode?>" disabled>
            <small class="text-red font-italic"><?php echo form_error('barcode'); ?></small>
          </div>
          <div class="form-group">
            <label for="name">Nama *</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Nama bahan" value="<?=$this->input->post('name') ?? $row->name?>" autocomplete="off" autofocus>
            <small class="text-red font-italic"><?php echo form_error('name'); ?></small>
          </div>
          <div class="form-group">
            <label for="category">Kategori *</label>
            <?php echo form_dropdown('category', $category, $selected_category, ['class' => 'form-control']) ?>
            <small class="text-red font-italic"><?php echo form_error('category'); ?></small>
          </div>
          <div class="form-group">
            <label for="price">Harga *</label>
            <input name="price" type="number" class="form-control" id="price" placeholder="Harga produk dalam rupiah" value="<?=$this->input->post('price') ?? $row->price?>" autocomplete="off" autofocus>
            <small class="text-red font-italic"><?php echo form_error('price'); ?></small>
          </div>
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