<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengaturan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
            <li class="breadcrumb-item active">Pengaturan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Pengaturan</h3>
        </div> 
        <?php $this->view('messages'); ?>
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <input name="user_id" type="hidden" value="<?=$_SESSION['userid']?>">
            <div class="form-group">
              <label for="name">Nama *</label>
              <input name="name" type="text" class="form-control" id="name" value="<?=$this->functions->user_login()->name?>" autocomplete="off" autofocus>
              <small class="text-red font-italic"><?php echo form_error('name'); ?></small>
            </div>
            <div class="form-group">
              <label for="username">Nama pengguna *</label>
              <input type="text" class="form-control" placeholder="<?=$this->functions->user_login()->username?>" disabled>
            </div>
            <div class="form-group">
              <label for="password">
                Kata sandi <small>(Kosongkan bila tidak ingin diganti)</small>
              </label>
              <input name="password" type="password" class="form-control" id="password" placeholder="Kata sandi" value="<?=$this->input->post('passconf')?>" autocomplete="off">
              <small class="text-red font-italic"><?php echo form_error('password'); ?></small>
            </div>
            <div class="form-group">
              <label for="passconf">
                Konfirmasi kata sandi <small>(Kosongkan bila tidak ingin diganti)</small>
              </label>
              </label>
              <input name="passconf" type="password" class="form-control" id="passconf" placeholder="Konfirmasi kata sandi" autocomplete="off">
              <small class="text-red font-italic"><?php echo form_error('passconf'); ?></small>
            </div>
            <div class="form-group">
              <label for="address">Alamat</label>
              <textarea name="address" id="address" class="form-control" rows="3" placeholder="Alamat"><?=$this->functions->user_login()->address?></textarea>
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
                    <img src="<?=base_url('uploads/users/cashier/'.$image)?>" alt="" style="width: 15rem; height: 15rem">
                  </div>
                  <input name="image_form" type="hidden" value="<?=$image?>"?>
              <?php 
                }
              } ?>
              <input name="image" class="form-control form-control-lg pb-5" id="image" type="file">
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