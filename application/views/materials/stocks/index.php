<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <?php $this->load->view('materials/stocks/header')?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">
          <?php 
            if( $this->uri->segment(2) == 'masuk' ) {
              echo "Data bahan masuk";
            } else if( $this->uri->segment(2) == 'keluar' ) {
              echo "Data bahan keluar";
            } else if( $this->uri->segment(2) == 'hilang' ) {
              echo "Data bahan hilang";
            } else if( $this->uri->segment(2) == 'ditemukan' ) {
              echo "Data bahan ditemukan";
            }
          ?>
          </h3>
          <div class="float-right">
            <a href="<?php 
                      if( $this->uri->segment(2) == 'masuk' ) {
                        echo base_url('persediaan/masuk/tambah');
                      } else if( $this->uri->segment(2) == 'keluar' ) {
                        echo base_url('persediaan/keluar/tambah');
                      } else if( $this->uri->segment(2) == 'hilang' ) {
                        echo base_url('persediaan/hilang/tambah');
                      } else if( $this->uri->segment(2) == 'ditemukan' ) {
                        echo base_url('persediaan/ditemukan/tambah');
                      }
                    ?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> 
              <?php 
                if( $this->uri->segment(2) == 'masuk' ) {
                  echo "Tambah Bahan Masuk";
                } else if( $this->uri->segment(2) == 'keluar' ) {
                  echo "Tambah Bahan Keluar";
                } else if( $this->uri->segment(2) == 'hilang' ) {
                  echo "Tambah Bahan Hilang";
                } else if( $this->uri->segment(2) == 'ditemukan' ) {
                  echo "Tambah Bahan Ditemukan";
                }
              ?>
            </a>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="stock-table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Masuk</th>
            <th>Keterangan</th>
            <th>Pemasok</th>
            <th>Waktu Pencatatan</th>
            <th>Nama Pencatat</th>
            <th>Kodebar</th>
            <th>Satuan</th>
            <th>Harga</th>
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
        <h4 class="modal-title">
          Rincian
          <?php 
            if( $this->uri->segment(2) == 'masuk' ) {
              echo "bahan masuk";
            } else if( $this->uri->segment(2) == 'keluar' ) {
              echo "bahan keluar";
            } else if( $this->uri->segment(2) == 'hilang' ) {
              echo "bahan hilang";
            } else if( $this->uri->segment(2) == 'ditemukan' ) {
              echo "bahan ditemukan";
            }
          ?>
        </h4>
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
              <th>Kodebar</th>
              <td><span id="material_barcode"></span></td>
            </tr>
            <tr>
              <th>Nama Barang</th>
              <td><span id="material_name"></span></td>
            </tr>
            <tr>
              <th>Harga</th>
              <td><span id="material_price"></span></td>
            </tr>
            <tr>
              <th>Jumlah</th>
              <td><span id="quantity"></span></td>
            </tr>
            <tr>
              <th>Satuan</th>
              <td><span id="unit_name"></span></td>
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
              <th>Nama Pencatat</th>
              <td><span id="user_name"></span></td>
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
          // 5,7,8,9
          "targets": [5,6,8,9,10],
          "visible": false
        },
        {
          "targets": [11],
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
      var unit_name = $(this).data('unit_name');
      var material_price = $(this).data('material_price');
      $('#date').text(date);
      $('#material_name').text(material_name);
      $('#quantity').text(quantity);
      $('#notes').text(notes);
      $('#supplier_name').text(supplier_name);
      $('#created').text(created);
      $('#user_name').text(user_name);
      $('#material_barcode').text(material_barcode);
      $('#unit_name').text(unit_name);
      $('#material_price').text(material_price);
      $('#material-modal').modal('hide');
    })
  })
</script>