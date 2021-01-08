
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
          <h3 class="card-title">Data lembur</h3>
          <div class="float-right">
            <a href="<?=base_url('pengisian_lembur/tambah')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Lembur
            </a>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tangal</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $overtime ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <?php $date = substr($overtime->created, -20, 10);?>
            <td><?= indo_date($date, TRUE, TRUE)." — ".substr($overtime->created, -8, 8) ?></td>
            <td><?= $overtime->user_name ?></td>
            <td><?= $overtime->overtime_hour ?> jam</td>
            <td><?= $overtime->notes ?></td>
            <td>
              <a class="btn btn-sm btn-outline-primary" href="http://192.168.1.2/kedaibutin-app/kategori/ubah/1">
                <i class="far fa-edit"></i> Ubah
              </a>
            </td>
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