<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid border-bottom">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pramuniaga</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-right">
              <a href="" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah Pramuniaga
              </a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nama Pengguna</th>
                    <th>Alamat</th>
                    <th>Tingkat</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1 ?>
                  <?php foreach( $row as $user ) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->address ?></td>
                    <td><?= $user->level == 1 ? "Admin" : "Pramuniaga" ?></td>
                    <td><?= $user->image ?></td>
                    <td style="width: 10rem;">
                      <form action="<?=site_url('users/delete')?>" method="post">
                        <a class="btn btn-sm btn-outline-primary" href="<?=site_url('users/edit')?>/<?=$user->user_id?>">
                          <i class="far fa-edit"></i> Ubah
                        </a>
                        <input name="user_id" type="hidden" value="<?=$user->user_id?>">
                        <button onclick="return confirm('Anda akan menghapus data pengguna, yakin?');" class="btn btn-sm btn-outline-danger">
                          <i class="far fa-trash-alt"></i> Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>