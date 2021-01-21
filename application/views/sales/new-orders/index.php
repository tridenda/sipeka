<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pesanan baru</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('sales/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Data pesanan baru</h3>
          <div class="float-right">
            <div class="d-flex justify-content-center">
              <form action="" method="post">
                <button name="tutorial" type="submit" class="mr-1 btn btn-secondary">
                  <i class="fas fa-question-circle"></i> Tutorial
                </button>
              </form>
              <button data-toggle="modal" data-target="#neworder-modal" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Pesanan
              </button>
            </div>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="sales-table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Faktur</th>
            <th>Nama Pelanggan</th>
            <th>Total</th>
            <th>Catatan</th>
            <th>Aksi</th>
          </tr>
          </thead>
        </table>
        </div><!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Begin: Detail -->
<div class="modal fade" id="detail-modal">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          Rincian
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="detail-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Faktur</th>
              <td><span id="invoice"></span></td>
            </tr>
            <tr>
              <th>Tanggal</th>
              <td><span id="date"></span></td>
            </tr>
            <tr>
              <th>Nama Pelanggan</th>
              <td><span id="name"></span></td>
            </tr>
            <tr>
              <th>Total Tagihan</th>
              <td><span id="total_price"></span></td>
            </tr>
            <tr>
              <th>Potongan Harga</th>
              <td><span id="discount"></span></td>
            </tr>
            <tr>
              <th>Total Keseluruhan</th>
              <td><span id="final_price"></span></td>
            </tr>
            <tr>
              <th>Catatan</th>
              <td><span id="notes"></span></td>
            </tr>
            <tr>
              <th>Nama Pramuniaga</th>
              <td><span id="user_name"></span></td>
            </tr>
            <tr>
              <th>Status</th>
              <td><span id="status"></span></td>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End: Detail -->

<!-- Begin: New-order -->
<div class="modal fade" id="neworder-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          Tambah infomasi pelanggan
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="members-table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No HP</th>
            <th>ALamat</th>
            <th>Poin</th>
            <th>Aksi</th>
            <th>Aksi</th>
          </tr>
          </thead>
        </table>
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="phone">No HP</label>
              <input type="number" class="form-control" id="phone" placeholder="Contoh: 0851556633254">
            </div>
            <div class="form-group">
              <label for="name">Nama *</label>
              <input type="text" class="form-control" id="name" placeholder="Nama pelanggan">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button name="neworder" type="submit" class="btn btn-primary float-right">
              <i class="far fa-paper-plane"></i> Lanjutkan Pesanan
            </button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End: New-order -->

<script>
  // Begin: Members table
  $(function () {
    $("#members-table").DataTable({
      "autoWidth": false,
      "pageLength": 2,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?=base_url('Members/get_ajax')?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [2,4,6],
          "visible": false
        },
        {
          "targets": [7],
          "className": 'text-center',
          "width": '5rem',
          "orderable": false
        }
      ]      
    })
  })
  // End: Members table


  // Begin: Sales table
  $(function () {
    $("#sales-table").DataTable({
      "autoWidth": false,
      "pageLength": 10,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?=base_url('Sal_sales/get_ajax')?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [5],
          "className": 'text-center',
          "width": '18rem',
        },
        {
          "targets": [0,1,2,3,4,5],
          "orderable": false
        }
      ]      
    })
  })
  // End: Sales table

  // Begin: Modal detail
  $(document).ready(function() {
    $(document).on('click', '#select', function () {
      var invoice = $(this).data('invoice');
      var date = $(this).data('date');
      var name = $(this).data('name');
      var total_price = $(this).data('total_price');
      var discount = $(this).data('discount');
      var final_price = $(this).data('final_price');
      var notes = $(this).data('notes');
      var user_name = $(this).data('user_name');
      var status = $(this).data('status');
      
      $('#invoice').text(invoice);
      $('#date').text(date);
      $('#name').text(name);
      $('#total_price').text(total_price);
      $('#discount').text(discount);
      $('#final_price').text(final_price);
      $('#notes').text(notes);
      $('#user_name').text(user_name);
      $('#status').text(status);
      $('#material-modal').modal('hide');
    })
  })
  // End: Modal detail
</script>