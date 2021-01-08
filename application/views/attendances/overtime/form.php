<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lembur</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('attendances/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Tambah lembur</h3>
          <div class="float-right">
            <a href="<?=base_url('pengisian_lembur')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <?php $this->view('messages'); ?>
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post" enctype="multipart/form-data">
          <!-- Input salary_id hidden for edit table -->
          <input name="notes" type="hidden" value="lembur">
          <div class="card-body">
            <div class="form-group">
              <label for="user">Nama Karyawan *</label>
              <?php echo form_dropdown('user', $user, $selected_user, ['class' => 'form-control']) ?>
              <small class="text-red font-italic"><?php echo form_error('user'); ?></small>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="created">Tanggal *</label>
                  <input name="created" type="date" class="form-control" id="created" value="<?=date('Y-m-d')?>">
                  <small class="text-red font-italic"><?php echo form_error('created'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Jumlah *</label>
                  <div class="input-group">
                    <input name="overtime_hour" type="text" class="form-control" placeholder="Isi dengan angka" value="" autocomplete="off">
                    <div class="input-group-prepend">
                      <span class="input-group-text">jam</span>
                    </div>
                  </div>
                  <small class="text-red font-italic"><?php echo form_error('overtime_hour'); ?></small>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button name="submit" type="submit" class="btn btn-primary float-right ml-2"><i class="fas fa-paper-plane"></i> Simpan</button>
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