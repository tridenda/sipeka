<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cuti</h1>
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
          <h3 class="card-title">Tambah cuti</h3>
          <div class="float-right">
            <a href="<?=base_url('pengisian_cuti')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <?php $this->view('messages'); ?>
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post">
          <div class="card-header">
          <!-- Input salary_id hidden for edit table -->
          <input name="notes" type="hidden" value="cuti">
          <div class="card-body">
            <div class="form-group">
              <label for="user">Nama Karyawan *</label>
              <?php $disabled = $page=='edit' ? 'disabled' : '';?>
              <?php 
                if( $disabled == 'disabled' ) {
              ?>
                <input name="user" type="hidden" value="<?=$this->input->post('user_id') ?? $row->user_id?>">
                <input name="date" type="hidden" class="form-control" id="date" value="<?=$this->input->post('date') ?? substr($row->date, -19, 10)?>" >
              <?php                  
                }
              ?>
              <?php echo form_dropdown('user', $user, $selected_user, ['class' => 'form-control', $disabled => ''])?>
              <small class="text-red font-italic"><?php echo form_error('user'); ?></small>
            </div>
            <div class="form-group">
              <label for="date">Tanggal *</label>
              <input name="date" type="date" class="form-control" id="date" value="<?=$this->input->post('date') ?? substr($row->date, -19, 10)?>" <?= $page == 'edit' ? 'disabled' : ''?>>
              <small class="text-red font-italic"><?php echo form_error('date'); ?></small>
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