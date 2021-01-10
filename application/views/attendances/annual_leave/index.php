
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
          <h3 class="card-title">Data cuti <small>(<?=date('Y')?>)</small></h3>
          <div class="float-right">
          <?php if( $this->functions->user_login()->level == '1') : ?>
            <a href="<?=base_url('pengisian_cuti/tambah')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Cuti
            </a>
          <?php endif; ?>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Status</th>
            <?php if( $this->functions->user_login()->level == '1') : ?>
              <th>Aksi</th>
            <?php endif; ?>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $overtime ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <?php $date = substr($overtime->date, -20, 10);?>
            <td><?= indo_date($date, TRUE, TRUE)." — ".substr($overtime->date, -8, 8) ?></td>
            <td><?= $overtime->user_name ?></td>
            <td><?= $overtime->notes ?></td>
            <?php if( $this->functions->user_login()->level == '1') : ?>
              <td class="text-center" style="width: 10rem">
                <form action="<?=base_url('pengisian_cuti/hapus')?>" method="post">
                  <a class="btn btn-sm btn-outline-primary" href="<?=base_url('pengisian_cuti/ubah/'.$overtime->attendance_id)?>">
                    <i class="far fa-edit"></i> Ubah
                  </a>
                  <input name="attendance_id" type="hidden" value="<?=$overtime->attendance_id?>">
                  <input name="date" type="hidden" value="<?=$overtime->date?>">
                  <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Menghapus berarti merubah status menjadi hadir, yakin?');">
                    <i class="far fa-trash-alt"></i> Hapus
                  </button>
                </form>
              </td>
            <?php endif; ?>
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