<!-- Begin: Content -->
<div class="container-fluid mt-4">
  <div class="row">
    <!-- Begin: Main -->
    <main class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
      <h1 class="h2 text-secondary border-bottom pb-3 text-center">Pemasok</h1>
      <div class="table-responsive">
        <div class="d-flex justify-content-between mb-3">
          <form class="d-flex mr-auto">
            <input class="form-control form-control-sm" type="text" placeholder="Search material name" aria-label=".form-control-sm example">
            <button class="btn btn-outline-primary btn-sm mr-5" type="submit"><i class="fas fa-search"></i></button>
          </form>
          <a class="btn btn-outline-primary" href="<?=site_url('raw_material/add_supplier')?>"><i class="fas fa-plus"></i> Tambah Pemasok</a>
        </div>        
        <!-- Begin: Table Material -->
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Nomor Telepon</th>
              <th>Alamat</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1 ?>
          <?php foreach( $row as $supplier ) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $supplier->name ?></td>
              <td><?= $supplier->phone ?></td>
              <td><?= $supplier->address ?></td>
              <td><?= $supplier->notes ?></td>
              <td style="width: 10rem;">
                <form action="<?=site_url('raw_material/delete_supplier')?>" method="post">
                  <a class="btn btn-sm btn-outline-primary" href="<?=site_url('users/edit')?>/<?=$supplier->supplier_id?>">
                    <i class="far fa-edit"></i> Ubah
                  </a>
                  <input name="supplier_id" type="hidden" value="<?=$supplier->supplier_id?>">
                  <button onclick="return confirm('Semua barang dari <?= $supplier->name ?> akan ikut terhapus, yakin?');" class="btn btn-sm btn-outline-danger">
                    <i class="far fa-trash-alt"></i> Hapus
                  </button>
                </form>              
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <!-- End: Table Material -->
        <div class="d-flex justify-content-between mb-3">
          <strong class="text-secondary">Showing 1 to 6 of 6 entries</strong>
          <nav aria-label="...">
            <ul class="pagination pagination-sm">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div> 
      </div>
    </main>
    <!-- End: Main -->
    <!-- Begin: Sidebar -->
    <div class="col-md-3 col-lg-3 d-md-block sidebar collapse border-left border-5">
      <h2 class="fw-bold border-bottom pb-2 text-center text-secondary">Raw Material</h2>
      <!-- Begin: Sidebar Menu -->
      <div class="list-group mb-2">
        <a href="<?=site_url('raw_material/material_list')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Material List</a>
        <div class="d-flex justify-content-center">
          <span class="w-50 mr-1"><a href="<?=site_url('raw_material/categories')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Categories</a></span>
          <span class="w-50 ml-1"><a href="<?=site_url('raw_material/units')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1" title="Add unit material">Units</a></span>
        </div>
        <a href="<?=site_url('raw_material/suppliers')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Suppliers</a>
        <a href="<?=site_url('raw_material/stock_in')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stock-in</a>
        <a href="<?=site_url('raw_material/stock_out')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stock-out</a>
        <div class="d-flex justify-content-center">
          <span class="w-50 mr-1"><a href="<?=site_url('raw_material/stock_missing')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stock Missing</a></span>
          <span class="w-50 ml-1"><a href="<?=site_url('raw_material/stock_found')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1" title="Add unit material">Stock Found</a></span>
        </div>
      </div>
      <!-- End: Sidebar menu -->

      <!-- Begin: History Activity -->
      <ul class="list-group mb-3">
        <li class="list-group-item text-center text-secondary">
          <strong>History Activity</strong>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0 text-muted">Administator</h6>
            </div>
            <small class="text-muted">10:00 ~ 02/09/20</small>
          </div>
          <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0 text-muted">Administator</h6>
            </div>
            <small class="text-muted">10:00 ~ 02/09/20</small>
          </div>
          <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0 text-muted">Administator</h6>
            </div>
            <small class="text-muted">10:00 ~ 02/09/20</small>
          </div>
          <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0 text-muted">Administator</h6>
            </div>
            <small class="text-muted">10:00 ~ 02/09/20</small>
          </div>
          <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0 text-muted">Administator</h6>
            </div>
            <small class="text-muted">10:00 ~ 02/09/20</small>
          </div>
          <small class="text-muted">lorem ipsum dolor sit amet amit.....</small>
        </li>
        <li class="list-group-item text-center">
          <a href="" class="link-success">See more</a>
        </li>
      </ul>
      <!-- End: History Activity -->
    </div>
    <!-- End: Sidebar -->
  </div>
</div>
<!-- End: Content -->