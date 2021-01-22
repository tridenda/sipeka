<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Keranjang</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('sales/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="content">
    <div class="row">
      <div class="col-sm bg-white ml-3">
        <div class="form-group">
          <label for="date" class="p-1 col-sm-3 col-form-label col-form-label-sm">Tanggal</label>
          <div class="p-1 col-sm-9">
            <input type="date" class="form-control form-control-sm" id="date">
          </div>
        </div>
        <div class="form-group">
          <label for="user_id" class="p-1 col-sm-3 col-form-label col-form-label-sm">Pramuniaga</label>
          <div class="p-1 col-sm-9">
            <input type="text" class="form-control form-control-sm" id="user_id" value="<?=ucfirst($this->functions->user_login()->name)?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="Pelanggan" class="p-1 col-sm-3 col-form-label col-form-label-sm">Pelanggan</label>
          <div class="p-1 col-sm-9">
            <input type="Pelanggan" class="form-control form-control-sm" id="Pelanggan" value="<?=$row->name?>" readonly>
          </div>
        </div>
      </div>
      <div class="col-sm bg-white ml-1 mr-1">
        <div class="form-group">
          <label for="barcode" class="p-1 col-sm-3 col-form-label col-form-label-sm">Kodebar</label>
          <div class="p-1 col-sm-7">
            <input type="hidden" id="product_id">
            <input type="hidden" id="sale_id" value="<?=$row->sale_id?>">
            <input type="hidden" id="price">
            <input type="text" class="form-control form-control-sm" id="barcode" placeholder="Klik tombol cari untuk memilih" readonly>
          </div>
          <div class="p-1 col-sm-2">
            <button class="btn btn-outline-primary btn-sm w-100" data-toggle="modal" data-target="#product-modal"><i class="fas fa-search"></i></button>
          </div>
        </div>
        <div class="form-group">
          <label for="quantity" class="p-1 col-sm-3 col-form-label col-form-label-sm">Jumlah</label>
          <div class="p-1 col-sm-9">
            <input type="number" class="form-control form-control-sm" id="quantity" value="1">
          </div>
        </div>
        <div class="form-group float-right mt-2">
          <button id="add_cart" class="btn btn-outline-primary btn-sm">
            <i class="fa fa-cart-plus"></i> Tambah Ke Keranjang
          </button>
        </div>
      </div>
      <div class="col-sm bg-white mr-3">
        <p class="text-right" style="font-size: 1.5rem">
          Faktur <strong>IN2020100009</strong><br>
          <strong style="font-size: 3.6rem;">RP 30.000.000</strong>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kodebar</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Potongan</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="cart-table">
                <?php $this->view('sales/cart/cart')?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row" style="margin-top: -2rem;">
      <div class="col-3">
        <div class="card">
          <div class="form-group ml-3 mr-3 mt-3">
            <label for="Pelanggan" class="p-1 col-sm-4 col-form-label col-form-label-sm">Total</label>
            <div class="p-1 col-sm-8">
              <input type="Pelanggan" class="form-control form-control-sm" id="Pelanggan" placeholder="50000" readonly>
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <label for="discount" class="p-1 col-sm-4 col-form-label col-form-label-sm">Potongan</label>
            <div class="p-1 col-sm-8">
              <input type="number" class="form-control form-control-sm" id="discount" placeholder="Masukan angka">
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <label for="Pelanggan" class="p-1 col-sm-4 col-form-label col-form-label-sm">Total bayar</label>
            <div class="p-1 col-sm-8">
              <input type="Pelanggan" class="form-control form-control-sm" id="Pelanggan" placeholder="Nama pelanggan" readonly>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card">
          <div class="form-group ml-3 mr-3 mt-3">
            <label for="Pelanggan" class="p-1 col-sm-4 col-form-label col-form-label-sm">Total</label>
            <div class="p-1 col-sm-8">
              <input type="Pelanggan" class="form-control form-control-sm" id="Pelanggan" placeholder="50000">
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <label for="discount" class="p-1 col-sm-4 col-form-label col-form-label-sm">Kembalian</label>
            <div class="p-1 col-sm-8">
              <input type="number" class="form-control form-control-sm" id="discount" placeholder="15000"  readonly>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card">
          <div class="form-group mt-2 ml-3 mr-3">
            <label class="p-1 col-sm-4 col-form-label col-form-label-sm">Textarea</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card p-3">
          <div class="d-flex justify-content-between">
            <button class="btn btn-warning w-100 mr-1">Hapus Semua</button>
            <button class="btn btn-secondary w-100 ml-1">Bayar Nanti</button>
          </div>
          <button class="btn btn-success w-100 mt-2" style="height: 4rem">Bayar Sekarang</button>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>

<!-- Begin: Products -->
<div class="modal fade" id="product-modal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          Pilih produk
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="product-table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Kodebar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
            <th>Aksi</th>
          </tr>
          </thead>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End: Products -->
<script>
  $(document).ready(function() {
    $(document).on('click', '#select', function () {
      var barcode = $(this).data('barcode');
      var product_id = $(this).data('product_id');
      var price = $(this).data('price');
      $('#barcode').val(barcode);
      $('#product_id').val(product_id);
      $('#price').val(price);
      $('#product-modal').modal('hide');
    })
  })

  $(function () {
    $("#product-table").DataTable({
      "paging": true,
      "lengthChange": true,
      "pageLength": 6,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?=base_url('pro_products/get_ajax')?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [0,5],
          "orderable": false
        },
        {
          "targets": [6],
          "className": 'text-center',
          "width": '5rem'
        },
        {
          "targets": [5],
          "visible": false
        },
      ]
    });
  });

  $(document).ready(function() {
    $(document).on('click', '#add_cart', function () {
      var product_id = $('#product_id').val();
      var sale_id = $('#sale_id').val();
      var price = $('#price').val();
      var quantity = $('#quantity').val();
      console.log(sale_id);
      console.log(product_id);
      console.log(price);
      console.log(quantity);
      if( product_id == '' ) {
        alert('Produk belum dipilih')
        $('#barcode').focus(); 
      } else {
        $.ajax({
          type: 'POST',
          url: '<?=base_url('Sal_cart/process')?>',
          data: {'add_cart' : true, 'product_id' : product_id, 'price' : price, 'quantity' : quantity, 'sale_id' : sale_id},
          dataType: 'json',
          success: function(result) {
              if(result.success == true) {
                $('#cart-table').load('<?=base_url('sal_cart/cart_data/').$row->sale_id?>', function() {

                })
              } else {
                alert('Gagal tambah produk ke keranjang')
            }
          }
        })
      }
    })
  })
</script>