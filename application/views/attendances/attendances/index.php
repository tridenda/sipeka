
<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kehadiran</h1>
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
          <h3 class="card-title">Data kehadiran</h3>
          <div class="float-right">
                    
          <form action="" method="post">
            <div class="input-group date" id="timepicker" data-target-input="nearest">
            <input name="user_id" type="hidden" value="<?= $this->session->userdata('userid') ?>">
            <input name="salary_id" type="hidden" value="<?=isset($salary->salary_id) == TRUE ? $salary->salary_id : ''?>">
            <input name="notes" type="hidden" value="hadir">
            
            <?php
              if( !isset($salary->salary_id) ) {
                echo "<span class=\"text-muted font-italic\">Belum dapat mengisi kehadiran, hubungi Admin untuk mengisikan data gaji.</span>";
              } else if( $is_attend->num_rows() > 0 ) {
                echo "<span class=\"text-muted font-italic\">Anda sudah mengisi kehadiran hari ini.</span>";
              } else {
                echo "<button name=\"add\" type=\"submit\" class=\"ml-1 btn btn-primary input-group-append\">Isi Kehadiran</button>";
              }
            ?>
            </div>
          </form>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tangal</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $attendance ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <?php $date = substr($attendance->created, -20, 10);?>
            <td><?= indo_date($date, TRUE, TRUE)." — ".substr($attendance->created, -8, 8) ?></td>
            <td><?= $attendance->notes ?></td>
          </tr>
          <?php endforeach; ?>
          </tfoot>
        </table>
        </div><!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>