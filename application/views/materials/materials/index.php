<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Bahan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Bahan Baku</a></li>
            <li class="breadcrumb-item active">Daftar Bahan</li>
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
          <h3 class="card-title">Data pramuniaga</h3>
          <div class="float-right">
            <a href="<?=base_url('materials/add')?>" class="btn btn-primary">
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
            <th>Kodebar</th>
            <th>Nama</th>
            <th>Pemasok</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1 ?>
          <?php foreach( $row as $material ) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $material->barcode ?></td>
            <td><?= ucwords($material->name) ?></td>
            <td><?= $material->supplier_name ?></td>
            <td><?= $material->category_name ?></td>
            <td><?= $material->price ?></td>
            <td><?= $material->unit_name ?></td>
            <td><?= $material->quantity ?></td>
            <td>
              <?php if( $material->image != null ) : ?>
              <img src="<?=base_url('uploads/materials/materials/'.$material->image)?>" alt="" style="width: 5rem; height: 5rem">
              <?php endif; ?>
            </td>
            <td style="width: 10rem;">
              <form action="<?=base_url('materials/delete')?>" method="post">
                <a class="btn btn-sm btn-outline-primary" href="<?=base_url('materials/edit')?>/<?=$material->material_id?>">
                  <i class="far fa-edit"></i> Ubah
                </a>
                <input name="material_id" type="hidden" value="<?=$material->material_id?>">
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