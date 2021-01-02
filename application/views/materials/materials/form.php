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
          <h3 class="card-title"><?=$page == 'edit' ? 'Ubah' : 'Tambah'?> bahan</h3>
          <div class="float-right">
            <a href="<?=base_url('daftar_bahan')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post" enctype="multipart/form-data">
          <input name="material_id" type="hidden" value="<?=$this->input->post('material_id') ?? $row->material_id?>">
          <div class="form-group">
            <label for="barcode">Kodebar *</label>
            <input name="barcode" type="text" class="form-control" id="barcode" placeholder="Contoh: A0001, AB0231, atau ZHS00001" value="<?=$this->input->post('barcode') ?? $row->barcode?>">
            <small class="text-red font-italic"><?php echo form_error('barcode'); ?></small>
          </div>
          <div class="form-group">
            <label for="name">Nama *</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Nama bahan" value="<?=$this->input->post('name') ?? $row->name?>">
            <small class="text-red font-italic"><?php echo form_error('name'); ?></small>
          </div>
          <div class="form-group">
            <label for="category">Kategori</label>
            <?php echo form_dropdown('category', $category, $selected_category, ['class' => 'form-control']) ?>
          </div>
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label>Harga *</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                  </div>
                  <input name="price" type="text" class="form-control" placeholder="Contoh: 25000" value="<?=$this->input->post('price') ?? $row->price?>">
                </div>
                <small class="text-red font-italic"><?php echo form_error('price'); ?></small>
              </div>
            </div>
            <div class="col-sm-5">
              <!-- select -->
              <div class="form-group">
                <label for="unit">Satuan *</label>
                <?php echo form_dropdown('unit', $unit, $selected_unit, ['class' => 'form-control']) ?>
                <small class="text-red font-italic"><?php echo form_error('unit'); ?></small>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Jumlah</label>
                <?php if( $page == 'edit') { ?>
                  <input name="quantity" type="hidden" value="<?=$this->input->post('quantity') ?? $row->quantity?>">
                  <input name="" type="number" class="form-control" placeholder="<?=$this->input->post('quantity') ?? $row->quantity?>">
                <?php
                } else { ?>
                  <input name="quantity" type="number" class="form-control" placeholder="0" disabled="">
                <?php
                }?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="image" class="form-label">
              Gambar
              <small>(Kosongkan bila tidak <?=$page == 'edit' ? 'ingin diganti' : 'diperlukan'?>)</small>
            </label>
            <?php 
            if( $page == 'edit' ) {
              $image = $this->input->post('image_form') ? $this->input->post('image_form') : $row->image;
              if( $image != null ) { ?>
                <div class="text-center mb-1">
                  <img src="<?=base_url('uploads/materials/materials/'.$image)?>" alt="" style="width: 15rem; height: 15rem">
                </div>
                <input name="image_form" type="hidden" value="<?=$image?>"?>
            <?php 
              }
            } ?>
            <input name="image" class="form-control form-control-lg pb-5" id="image" type="file"">
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