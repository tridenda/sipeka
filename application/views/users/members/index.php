<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('users/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Data pelanggan</h3>
          <div class="float-right">
            <?php if( $this->functions->user_login()->level == '1') : ?>
              <form action="" method="post">
                <button name="tutorial" type="submit" class="btn btn-secondary">
                  <i class="fas fa-question-circle"></i> Tutorial
                </button>
                  <a href="<?=base_url('pengguna/pelanggan/tambah')?>" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Tambah Pelanggan
                </a>
              </form>
            <?php endif; ?>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>No HP</th>
            <th>ALamat</th>
            <th>Poin</th>
            <?php if( $this->functions->user_login()->level == '1') : ?>
              <th>Aksi</th>
            <?php endif; ?>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $member ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucwords($member->name) ?></td>
            <td><?= $member->gender == 'male' ? "Laki-laki" : "Perempuan" ?></td>
            <td><?= $member->phone ?></td>
            <td><?= $member->address ?></td>
            <td><?= indo_currency($member->point) ?></td>
            <?php if( $this->functions->user_login()->level == '1') : ?>
              <td style="width: 10rem;">
                <form action="<?=base_url('pengguna/pelanggan/hapus')?>" method="post">
                  <a class="btn btn-sm btn-outline-primary" href="<?=base_url('pengguna/pelanggan/ubah/'.$member->member_id)?>">
                    <i class="far fa-edit"></i> Ubah
                  </a>
                  <input name="member_id" type="hidden" value="<?=$member->member_id?>">
                  <button onclick="return confirm('Anda akan menghapus data pengguna, yakin?');" class="btn btn-sm btn-outline-danger">
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