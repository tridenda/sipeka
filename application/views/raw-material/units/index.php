<!-- Begin: Content -->
<div class="container-fluid mt-4">
  <div class="row">
    <!-- Begin: Main -->
    <main class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
      <h1 class="h2 text-secondary text-center border-bottom pb-3">Units</h1>
      <div class="table-responsive">
        <div class="d-flex justify-content-between mb-3">
          <form class="d-flex mr-auto">
            <input class="form-control form-control-sm" type="text" placeholder="Search material name" aria-label=".form-control-sm example">
            <button class="btn btn-outline-primary btn-sm mr-5" type="submit"><i class="fas fa-search"></i></button>
          </form>
          <a class="btn btn-outline-primary" href="add-unit.html"><i class="fas fa-plus"></i> Add Unit</a>
        </div>        
        <!-- Begin: Table Material -->
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Lorem</td>
              <td style="width: 11rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Lorem</td>
              <td style="width: 11rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Lorem</td>
              <td style="width: 11rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Lorem</td>
              <td style="width: 11rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Lorem</td>
              <td style="width: 11rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Lorem</td>
              <td style="width: 11rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
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
      <h2 class="fw-bold border-bottom pb-2 text-center text-secondary">Bahan Baku</h2>
      <!-- Begin: Sidebar Menu -->
      <div class="list-group mb-2">
        <a href="<?=site_url('raw_material/material_list')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Daftar Bahan</a>
        <div class="d-flex justify-content-center">
          <span class="w-50 mr-1"><a href="<?=site_url('raw_material/categories')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Kategori</a></span>
          <span class="w-50 ml-1"><a href="<?=site_url('raw_material/units')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1" title="Add unit material">Satuan</a></span>
        </div>
        <a href="<?=site_url('raw_material/suppliers')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Pemasok</a>
        <a href="<?=site_url('raw_material/stock_in')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stok Masuk</a>
        <a href="<?=site_url('raw_material/stock_out')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stok Keluar</a>
        <div class="d-flex justify-content-center">
          <span class="w-50 mr-1"><a href="<?=site_url('raw_material/stock_missing')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1">Stok Hilang</a></span>
          <span class="w-50 ml-1"><a href="<?=site_url('raw_material/stock_found')?>" class="list-group-item list-group-item-action list-group-item-secondary text-center mb-1" title="Add unit material">Stok Ditemukan</a></span>
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