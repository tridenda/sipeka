<!-- Begin: Content -->
<div class="container-fluid mt-4">
  <div class="row">
    <!-- Begin: Main -->
    <main class="col-md-9 ml-sm-auto col-lg-9 px-md-4">
      <h1 class="h2 text-secondary text-center border-bottom pb-3">Stock-out</h1>      
      <!-- Begin: Form Stock-in -->
      <div class="d-flex justify-content-between bg-light">
        <div class="col-4 p-4 border">
          <form>
            <div class="d-flex justify-content-between mb-2 input-group-sm">
              <div class="col-auto">
                <label for="inputDate6" class="col-form-label">Date</label>
              </div>
              <div class="col-auto w-75 input-group-sm">
                <input type="Date" id="inputDate6" class="form-control" aria-describedby="DateHelpInline">
              </div>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <div class="col-auto">
                <label for="inputDate6" class="col-form-label">User</label>
              </div>
              <div class="col-auto w-75 input-group-sm">
                <input type="text" id="inputDate6" class="form-control" aria-describedby="DateHelpInline" value="Administator" disabled>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="col-auto">
                <label for="inputDate6" class="col-form-label">Invoice</label>
              </div>
              <div class="col-auto w-75 input-group-sm">
                <input type="text" id="inputDate6" class="form-control" aria-describedby="DateHelpInline" value="KB020919970001" disabled>
              </div>
            </div>
          </form>
        </div>
        <div class="col-4 p-3 border">
          <form>
            <div class="d-flex justify-content-between mb-2 input-group-sm">
              <div class="col-auto">
                <label for="inputDate6" class="col-form-label">Date</label>
              </div>
              <div class="col-auto w-75 input-group input-group-sm mb-3">
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                <button class="btn btn-outline-primary btn-sm">
                  <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
                </button>
              </div>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <div class="col-auto">
                <label for="inputDate6" class="col-form-label">Quantity</label>
              </div>
              <div class="col-auto w-75 input-group-sm">
                <input type="number" id="inputDate6" class="form-control" aria-describedby="DateHelpInline" value="1">
              </div>
            </div>
            <div class="d-flex flex-row-reverse">
              <button class="btn btn-outline-primary btn-sm">Add to list</button>
            </div>
          </form>
        </div>
        <div class="col-4 p-3 border">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 8rem"></textarea>
            <label for="floatingTextarea2">Notes</label>
          </div>
        </div>
      </div>
      <div class="bg-light border p-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Barcode</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Unit</th>
              <th scope="col">Quantity</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>AM001</td>
              <td>White Board Marker</td>
              <td>Rp 50.000</td>
              <td>Box</td>
              <td>1</td>
              <td style="width: 12rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>AM001</td>
              <td>White Board Marker</td>
              <td>Rp 50.000</td>
              <td>Box</td>
              <td>1</td>
              <td style="width: 12rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>AM001</td>
              <td>White Board Marker</td>
              <td>Rp 50.000</td>
              <td>Box</td>
              <td>1</td>
              <td style="width: 12rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>AM001</td>
              <td>White Board Marker</td>
              <td>Rp 50.000</td>
              <td>Box</td>
              <td>1</td>
              <td style="width: 12rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>AM001</td>
              <td>White Board Marker</td>
              <td>Rp 50.000</td>
              <td>Box</td>
              <td>1</td>
              <td style="width: 12rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>AM001</td>
              <td>White Board Marker</td>
              <td>Rp 50.000</td>
              <td>Box</td>
              <td>1</td>
              <td style="width: 12rem;">
                <a class="btn btn-sm btn-outline-primary" href="#"><i class="far fa-edit"></i> Change</a>
                <a class="btn btn-sm btn-outline-danger" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><i class="far fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="d-flex flex-row-reverse bg-light border p-4">
        <input type="submit" class="btn btn-primary btn-sm ml-4" value="Submit">
        <input type="submit" class="btn btn-warning btn-sm ml-4" value="Reset">
        <input type="submit" class="btn btn-secondary btn-sm" value="Cancel">            
      </div>
      <!-- End: Form Stock-in -->
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