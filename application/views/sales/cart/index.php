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
            <input type="date" class="form-control form-control-sm" id="date" value="<?=date('Y-m-d')?>">
          </div>
        </div>
        <div class="form-group">
          <label for="user_id" class="p-1 col-sm-3 col-form-label col-form-label-sm">Pramuniaga</label>
          <div class="p-1 col-sm-9">
            <input type="text" class="form-control form-control-sm" id="pramuniaga" value="<?=ucfirst($this->functions->user_login()->name)?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="Pelanggan" class="p-1 col-sm-3 col-form-label col-form-label-sm">Pelanggan</label>
          <div class="p-1 col-sm-9">
            <input type="text" class="form-control form-control-sm" id="pelanggan" value="<?=$row->name?>" readonly>
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
        <input type="hidden" id="invoice" value="<?=$row->invoice?>">
        <p class="text-right" style="font-size: 1.5rem">
          Faktur <strong>IN2020100009</strong><br>
          <strong id="grandtotal2" style="font-size: 3.6rem;">0</strong>
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
            <label for="subtotal" class="p-1 col-sm-4 col-form-label col-form-label-sm">Total</label>
            <div class="p-1 col-sm-8">
              <input type="text" class="form-control form-control-sm" id="subtotal" readonly>
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <label for="subdiscount" class="p-1 col-sm-4 col-form-label col-form-label-sm">Potongan</label>
            <div class="p-1 col-sm-8">
              <input type="number" class="form-control form-control-sm" id="subdiscount">
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <label for="grandtotal" class="p-1 col-sm-4 col-form-label col-form-label-sm">Total bayar</label>
            <div class="p-1 col-sm-8">
              <input type="text" class="form-control form-control-sm" id="grandtotal" readonly>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card">
          <div class="form-group ml-3 mr-3 mt-3">
            <label for="cash" class="p-1 col-sm-4 col-form-label col-form-label-sm">Bayar</label>
            <div class="p-1 col-sm-8">
              <input type="text" class="form-control form-control-sm" id="cash" autocomplete="off">
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <div class="form-group" style="margin-bottom: -1.1rem">
              <label class="ml-1" for="remaining" style="font-size: 0.9rem">Kembalian</label>
              <input type="hidden" class="form-control" id="remaining" ><br>
              <p id="remaining2" class="p-0 text-center border font-weight-bold" style="font-size: 24px; height: 3rem"></p>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card">
          <div class="form-group mt-2 ml-3 mr-3">
            <label class="p-1 col-sm-4 col-form-label col-form-label-sm">Catatan</label>
            <textarea id="notes" class="form-control" rows="3"><?=$row->notes?></textarea>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card p-3">
          <div class="d-flex justify-content-between">
            <button id="cancel-payment" class="btn btn-warning w-100 mr-1">Batal Bayar</button>
            <button id="paylater" class="btn btn-secondary w-100 ml-1">Bayar Nanti</button>
          </div>
          <button id="paynow" class="btn btn-success w-100 mt-2" style="height: 4.6rem">Bayar Sekarang</button>
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

<!-- Begin: Products -->
<div class="modal fade" id="modal-product-update">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          Ubah produk
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="update_cart_id">
        <div class="row">
          <div class="col-sm-6 p-1">
            <!-- text input -->
            <div class="form-group">
              <label>Kodebar</label>
              <input id="update_product_barcode" type="text" class="form-control" readonly>
            </div>
          </div>
          <div class="col-sm-6 p-1">
            <div class="form-group">
              <label>Nama</label>
              <input id="update_product_name" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-form-label p-1" for="update_price">Harga</label>
          <input type="number" class="form-control" id="update_price">
        </div>
        <div class="form-group">
          <label class="col-form-label p-1" for="update_quantity">Jumlah</label>
          <input type="number" class="form-control" id="update_quantity">
        </div>
        <div class="form-group">
          <label class="col-form-label p-1" for="update_total">Harga sebelum</label>
          <input type="number" class="form-control" id="update_total" readonly>
        </div>
        <div class="form-group">
          <label class="col-form-label p-1" for="update_discount">Potongan harga</label>
          <input type="number" class="form-control" id="update_discount" autocomplete="on">
        </div>
        <div class="form-group">
          <label class="col-form-label p-1" for="update_final_price">Harga sesudah</label>
          <input type="number" class="form-control" id="update_final_price" readonly>
        </div>
      </div>
      <div class="card-footer">
        <button id="update_cart_table" type="submit" class="btn btn-primary float-right"><i class="far fa-paper-plane"></i> Simpan</button>
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
                  calculate()
                })
                $('#product_id').val('')
                $('#barcode').val('')
                $('#quantity').val(1)
              } else {
                alert('Gagal tambah produk ke keranjang')
            }
          }
        })
      }
    })
  })

  $(document).ready(function() {
    $(document).on('click', '#delete_cart', function () {
      if(confirm('Apakah anda yakin?')) {
        var cart_id = $(this).data(cart_id);
        $.ajax({
          type: 'POST',
          url: '<?=base_url('sal_cart/delete_cart')?>',
          data: {'cart_id' : cart_id},
          dataType: 'json',
          success: function(result) {
              if(result.success == true) {
                $('#cart-table').load('<?=base_url('sal_cart/cart_data/').$row->sale_id?>', function() {
                  calculate()
                })
              } else {
                alert('Gagal hapus produk dari keranjang')
              }
          }
        })
      }
    })
  })

  $(document).ready(function() {
    $(document).on('click', '#update_cart', function () {
      var update_cart_id = $(this).data('update_cart_id');
      var update_product_barcode = $(this).data('update_product_barcode');
      var update_product_name = $(this).data('update_product_name');
      var update_price = $(this).data('update_price');
      var update_quantity = $(this).data('update_quantity');
      var update_total = $(this).data('update_total');
      var update_discount = $(this).data('update_discount');

      $('#update_cart_id').val(update_cart_id);
      $('#update_product_barcode').val(update_product_barcode);
      $('#update_product_name').val(update_product_name);
      $('#update_price').val(update_price);
      $('#update_quantity').val(update_quantity);
      $('#update_total').val(update_total);
      $('#update_discount').val(update_discount);
    })
  })

  function count_update_modal() {
    var quantity = $('#update_quantity').val()
    var price = $('#update_price').val()
    var discount = $('#update_discount').val()

    final_price = (price - discount) * quantity
    $('#update_final_price').val(final_price)
  }

  $(document).on('keyup mouseup', '#update_quantity, #update_price, #update_discount', function() {
    count_update_modal()
  })

  $(document).ready(function() {
    $(document).on('click', '#update_cart_table', function () {
      var cart_id = $('#update_cart_id').val()
      var quantity = $('#update_quantity').val()
      var price = $('#update_price').val()
      var total = $('#update_final_price').val()
      var discount = $('#update_discount').val()
      if( price == '' || price < 1 ) {
        alert('Harga tidak boleh kosong')
        $('#update_price').focus(); 
      } else if( quantity == '' || quantity < 1) {
        alert('Jumlah minimal satu')
        $('#update_quantity').focus(); 
      } else if( total == '' || total < 1 ) {
        alert('Anda tidak merubah apapun')
      } else {
        $.ajax({
          type: 'POST',
          url: '<?=base_url('Sal_cart/process')?>',
          data: {'update_cart_table' : true, 'cart_id' : cart_id, 'price' : price, 'quantity' : quantity, 'discount' : discount, 'total' : total},
          dataType: 'json',
          success: function(result) {
              if(result.success == true) {
                $('#cart-table').load('<?=base_url('sal_cart/cart_data/').$row->sale_id?>', function() {
                  calculate()
                })
                $('#modal-product-update').modal('hide');
                alert('Produk berhasil diubah')
              } else {
                alert('Anda tidak merubah apapun')
            }
          }
        })
      }
    })
  })

  function calculate() {
    var subtotal = 0
    $('#cart-table tr').each(function() {
      subtotal += parseInt($(this).find('#total').text())
    })
    isNaN(subtotal) ? $('#subtotal').val(0) : $('#subtotal').val(subtotal)

    var discount = $('#subdiscount').val()
    var grandtotal = subtotal - discount
    if( isNaN(grandtotal) ) {
      $('#grandtotal').val(0)
      $('#grandtotal2').text(0)
    } else {
      $('#grandtotal').val(grandtotal)
       var rupiah = 'Rp ' + grandtotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");  // 12,345.67
      $('#grandtotal2').text(rupiah)
    }

    var cash = $('#cash').val()
    cash != 0 ? $('#remaining').val(cash - grandtotal) : $('#remaining').val(0)
    
    var remaining = 'Rp ' + (cash - grandtotal).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    cash != 0 ? $('#remaining2').text(remaining) : $('#remaining2').val(0)
    
  }

  $(document).on('keyup mouseup', '#subdiscount, #cash', function() {
    calculate()
  })

  $(document).ready(function() {
    calculate()
  })

  $(document).ready(function() {
    $(document).on('click', '#paynow', function () {
      var sale_id = $('#sale_id').val()
      var invoice = $('#invoice').val()
      var subtotal = $('#subtotal').val()
      var subdiscount = $('#subdiscount').val()
      var grandtotal = $('#grandtotal').val()
      var cash = $('#cash').val()
      var remaining = $('#remaining').val()
      var notes = $('#notes').val()
      var date = $('#date').val()
      if( subtotal == '' || subtotal < 1 ) {
        alert('Belum ada produk yang ditambahkan')
        $('#barcode').focus(); 
      } else if( cash == '' || cash < 1) {
        alert('Jumlah uang bayar belum dimasukan')
        $('#cash').focus(); 
      }  else {
        if(confirm('Yakin proses transaksi ini?')) {
          $.ajax({
          type: 'POST',
          url: '<?=base_url('Sal_cart/process')?>',
          data: {'paynow' : true, 
            'sale_id' : sale_id,
            'invoice' : invoice,
            'subtotal' : subtotal, 
            'subdiscount' : subdiscount, 
            'grandtotal' : grandtotal, 
            'cash' : cash, 
            'remaining' : remaining,
            'notes' : notes,
            'date' : date},
          dataType: 'json',
          success: function(result) {
              
          }
        })
        }
      }
    })
  })
</script>