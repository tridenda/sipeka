<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gaji</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('salaries/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title"><?=$page == 'edit' ? 'Ubah' : 'Tambah'?> Gaji</h3>
          <div class="float-right">
            <a href="<?=base_url('gaji')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <?php $this->view('messages'); ?>
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
        <form action="" style="width: 30rem;" method="post" enctype="multipart/form-data">
          <!-- Input salary_id hidden for edit table -->
          <input name="salary_id" type="hidden" value="<?=$this->input->post('salary_id') ?? $row->salary_id?>">
          <div class="card-body">
            <div class="form-group">
              <label for="user">Nama Karyawan</label>
              <?php echo form_dropdown('user', $user, $selected_user, ['class' => 'form-control']) ?>
              <small class="text-red font-italic"><?php echo form_error('user'); ?></small>
            </div>
            <div class="form-group">
              <label for="date">Tahun *</label>   
              <select name="date" class="form-control">
                <?php
                  $curyear = date('Y');
                  $future_year = $curyear + 2;
                  $range = $curyear - 2;
                  foreach (range($range, $future_year) as $value) :
                    // Activate this condition if there's input
                    // Get the data from flashdata
                    if( $this->input->post('date') || $row->date ) {
                      $curyear = $this->input->post('date') ?? $row->date;
                    }
                ?>
                  <option value="<?=$value?>" <?=$value == $curyear ? 'selected' : ''?>><?=$value?></option>
                <?php
                  endforeach;
                ?>
              </select>
              <small class="text-red font-italic"><?php echo form_error('date'); ?></small>
            </div>
            <div class="form-group">
              <label>Gaji Pokok Perbulan *</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input name="salary" type="text" class="form-control" placeholder="Isi dengan angka" value="<?=$this->input->post('salary') ?? $row->salary?>" autocomplete="off">
              </div>
              <small class="text-red font-italic"><?php echo form_error('salary'); ?></small>
            </div>
            <div class="form-group">
              <label>Uang Makan Perbulan</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input name="meal_allowance" type="text" class="form-control" placeholder="Isi dengan angka" value="<?=$this->input->post('meal_allowance') ?? $row->meal_allowance?>" autocomplete="off">
              </div>
              <small class="text-red font-italic"><?php echo form_error('meal_allowance'); ?></small>
            </div>
            <div class="form-group">
              <label>Uang Transfortasi Perbulan</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input name="transport_allowance" type="text" class="form-control" placeholder="Isi dengan angka" value="<?=$this->input->post('transport_allowance') ?? $row->transport_allowance?>" autocomplete="off">
              </div>
              <small class="text-red font-italic"><?php echo form_error('transport_allowance'); ?></small>
            </div>
            <div class="form-group">
              <label>Uang Lainnya Perbulan</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input name="other_allowance" type="text" class="form-control" placeholder="Isi dengan angka" value="<?=$this->input->post('other_allowance') ?? $row->other_allowance?>" autocomplete="off">
              </div>
              <small class="text-red font-italic"><?php echo form_error('other_allowance'); ?></small>
            </div>
            <div class="form-group">
              <label>Upah Lembur Perjam *</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input name="overtime_allowance" type="text" class="form-control" placeholder="Isi dengan angka" value="<?=$this->input->post('overtime_allowance') ?? $row->overtime_allowance?>" autocomplete="off">
              </div>
              <small class="text-red font-italic"><?php echo form_error('overtime_allowance'); ?></small>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Waktu Kerja Perhari *</label>
                  <div class="input-group">
                    <input name="worktime" type="text" class="form-control" placeholder="Isi dengan angka" value="<?=$this->input->post('worktime') ?? $row->worktime?>" autocomplete="off">
                    <div class="input-group-prepend">
                      <span class="input-group-text">jam</span>
                    </div>
                  </div>
                  <small class="text-red font-italic"><?php echo form_error('worktime'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Hak Cuti Pertahun *</label>
                  <div class="input-group">
                    <input name="annual_leave" type="text" class="form-control" placeholder="Isi dengan angka" value="<?=$this->input->post('annual_leave') ?? $row->annual_leave?>" autocomplete="off">
                    <div class="input-group-prepend">
                      <span class="input-group-text">hari</span>
                    </div>
                  </div>
                  <small class="text-red font-italic"><?php echo form_error('annual_leave'); ?></small>
                </div>
              </div>
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