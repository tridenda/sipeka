<!-- Begin: Content -->
<div class="container-fluid mt-4">
  <div class="row">
    <!-- Begin: Main -->
    <main class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
      <h1 class="h2 text-secondary text-center border-bottom pb-3">Add Material</h1>
      <div class="table-responsive d-flex justify-content-center mt-4">       
        <!-- Begin: Form Add Material -->
        <form class="row g-2 needs-validation w-50" novalidate>
          <div class="position-relative">
            <label for="validationTooltip01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationTooltip01" value="Mark" required>
            <div class="valid-tooltip">
              Looks good!
            </div>
          </div>
          <div class="position-relative">
            <label for="validationTooltip04" class="form-label">Supplier</label>
            <select class="form-select" id="validationTooltip04" required>
              <option selected disabled value="">Choose...</option>
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
            <div class="invalid-tooltip">
              Please select a valid state.
            </div>
          </div>
          <div class="position-relative">
            <label for="validationTooltip04" class="form-label">Category</label>
            <select class="form-select" id="validationTooltip04" required>
              <option selected disabled value="">Choose...</option>
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
            <div class="invalid-tooltip">
              Please select a valid state.
            </div>
          </div>
          <div class="col-md-5 position-relative">
            <label for="validationTooltip03" class="form-label">Price</label>
            <div class="input-group mb-3">
              <span class="input-group-text">Rp</span>
              <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>                
            <div class="invalid-tooltip">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-4 position-relative">
            <label for="validationTooltip04" class="form-label">Unit</label>
            <select class="form-select" id="validationTooltip04" required>
              <option selected disabled value="">Choose...</option>
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
            <div class="invalid-tooltip">
              Please select a valid state.
            </div>
          </div>
          <div class="col-md-3 position-relative">
            <label for="validationTooltip05" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="validationTooltip05" value="0" disabled>
            <div class="invalid-tooltip">
              Please provide a valid zip.
            </div>
          </div>
          <div class="col-12 text-right mt-4">
            <a class="btn btn-secondary" href="index.html">Cancel</a>
            <input class="btn btn-primary input" type="submit" value="Submit">
          </div>
        </form>
        <!-- End: Form Add Material --> 
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