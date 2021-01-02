<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Bahan</h1>
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
          <h3 class="card-title">Data Persediaan Masuk</h3>
          <div class="float-right">
            <a href="<?=base_url('persediaan/masuk/tambah')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Persediaan Masuk
            </a>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="stock-table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Masuk</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Pemasok</th>
            <th>Waktu Pencatatan</th>
            <th>Nama Pencatat</th>
            <th>Kodebar</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody></tbody>
          <tfoot></tfoot>
        </table>
        </div><!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="detail-modal">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Rincian</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="material-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Tanggal Masuk</th>
              <td><span id="date"></span></td>
            </tr>
            <tr>
              <th>Nama Barang</th>
              <td><span id="material_name"></span></td>
            </tr>
            <tr>
              <th>Jumlah</th>
              <td><span id="quantity"></span></td>
            </tr>
            <tr>
              <th>Keterangan</th>
              <td><span id="notes"></span></td>
            </tr>
            <tr>
              <th>Nama Pemasok</th>
              <td><span id="supplier_name"></span></td>
            </tr>
            <tr>
              <th>Waktu Pencatatan</th>
              <td><span id="created"></span></td>
            </tr>
            <tr>
              <th>Nama Pengguna</th>
              <td><span id="user_name"></span></td>
            </tr>
            <tr>
              <th>Kodebar</th>
              <td><span id="material_barcode"></span></td>
            </tr>
          </thead>
          <tbody>
            <table>
            <tr>
              <th></th>
              <td></td>
            </tr>
            </table>
          </tbody>
          <tfoot></tfoot>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  $(function () {
    $("#stock-table").DataTable({
      "autoWidth": false,
      "pageLength": 8,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?=base_url('stocks/get_stock_ajax/'.$type)?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [5,6,7,8],
          "visible": false
        },
        {
          "targets": [9],
          "className": 'text-center',
          "width": '10rem',
          "orderable": false
        }
      ]      
    })
  })

  $(document).ready(function() {
    $(document).on('click', '#select', function () {
      var date = $(this).data('date');
      var material_name = $(this).data('material_name');
      var quantity = $(this).data('quantity');
      var notes = $(this).data('notes');
      var supplier_name = $(this).data('supplier_name');
      var created = $(this).data('created');
      var user_name = $(this).data('user_name');
      var material_barcode = $(this).data('material_barcode');
      $('#date').text(date);
      $('#material_name').text(material_name);
      $('#quantity').text(quantity);
      $('#notes').text(notes);
      $('#supplier_name').text(supplier_name);
      $('#created').text(created);
      $('#user_name').text(user_name);
      $('#material_barcode').text(material_barcode);
      $('#material-modal').modal('hide');
    })
  })
</script>