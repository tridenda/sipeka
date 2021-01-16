<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pemasok</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('materials/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Data pemasok</h3>
          <div class="float-right">
            <form action="" method="post">
              <button name="tutorial" type="submit" class="btn btn-secondary">
                <i class="fas fa-question-circle"></i> Tutorial
              </button>
              <a href="<?=base_url('pemasok/tambah')?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Pemasok
              </a>
            </form>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $supplier ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucwords($supplier->name) ?></td>
            <td><?= $supplier->phone ?></td>
            <td><?= $supplier->address ?></td>
            <td><?= $supplier->notes ?></td>
            <td style="width: 10rem;">
              <form action="<?=base_url('pemasok/hapus')?>" method="post">
                <a class="btn btn-sm btn-outline-primary" href="<?=base_url('suppliers/edit/'.$supplier->supplier_id)?>">
                  <i class="far fa-edit"></i> Ubah
                </a>
                <input name="supplier_id" type="hidden" value="<?=$supplier->supplier_id?>">
                <button onclick="return confirm('Anda akan menghapus data pemasok, yakin?');" class="btn btn-sm btn-outline-danger">
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