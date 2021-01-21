<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Produk</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('products/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Data produk</h3>
          <div class="float-right">
            <form action="" method="post">
              <button name="tutorial" type="submit" class="btn btn-secondary">
                <i class="fas fa-question-circle"></i> Tutorial
              </button>
              <a href="<?=base_url('produk/daftar_produk/tambah')?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Produk
              </a>
            </form>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="product-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kodebar</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Harga</th>
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

<script>
  $(function () {
    $("#product-table").DataTable({
      "paging": true,
      "lengthChange": true,
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
          "targets": [5],
          "className": 'text-center',
          "width": '9rem',
          "height": '9rem'
        }
      ]
    });
  });
</script>