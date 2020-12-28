<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kategori</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('materials')?>">Bahan Baku</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
          <h3 class="card-title">Data kategori</h3>
          <div class="float-right">
            <a href="<?=base_url('categories/add')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Kategori
            </a>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $category ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucwords($category->name) ?></td>
            <td style="width: 10rem;">
              <form action="<?=base_url('categories/delete')?>" method="post">
                <a class="btn btn-sm btn-outline-primary" href="<?=base_url('categories/edit/'.$category->category_id)?>">
                  <i class="far fa-edit"></i> Ubah
                </a>
                <input name="category_id" type="hidden" value="<?=$category->category_id?>">
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