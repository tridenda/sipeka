<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gaji</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('pengguna')?>">Pengguna</a></li>
            <li class="breadcrumb-item active">Gaji</li>
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
          <h3 class="card-title">Data gaji</h3>
          <div class="float-right">
            <a href="<?=base_url('gaji/tambah')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Gaji
            </a>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pramuniaga</th>
            <th>Gaji</th>
            <th>Upah Lembur</th>
            <th>Jam Kerja Perhari</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $salary ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <?php $date = substr($salary->created, -20, 10);?>
            <td><?= indo_date($date, TRUE, TRUE) ?></td>
            <td><?= ucwords($salary->user_name) ?></td>
            <td><?= indo_currency($salary->salary) ?></td>
            <td><?= indo_currency($salary->overtime_rupiah) ?></td>
            <td><?= $salary->worktime_hour." jam" ?></td>
            <td style="width: 10rem;">
              <form action="<?=base_url('gaji/hapus')?>" method="post">
                <a class="btn btn-sm btn-outline-primary" href="<?=base_url('gaji/ubah/'.$salary->salary_id)?>">
                  <i class="far fa-edit"></i> Ubah
                </a>
                <input name="salary_id" type="hidden" value="<?=$salary->salary_id?>">
                <button onclick="return confirm('Anda akan menghapus data pengguna, yakin?');" class="btn btn-sm btn-outline-danger">
                  <i class="far fa-trash-alt"></i> Hapus
                </button>
              </form>
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