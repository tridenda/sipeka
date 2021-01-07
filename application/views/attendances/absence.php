

<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Absensi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('pengguna')?>">Pengguna</a></li>
            <li class="breadcrumb-item active">Absensi</li>
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
          <h3 class="card-title">Data Absensi</h3>
          <div class="float-right">
            <a href="<?=base_url('pengguna/tambah')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Pramuniaga
            </a>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Pendapatan</th>
            <th>Keterangan</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $salary ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= indo_date($salary->created) ?></td>
            <td><?= indo_currency($salary->salary) ?></td>
            <?php 
              if( $salary->status == 'done' ) {
                $salary->status = "Sudah dibayar";
              }
            ?>
            <td><?= $salary->status == NULL ? 'Belum dibayar' : $salary->status ?></td>
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