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
          <h3 class="card-title">Data bahan</h3>
          <div class="float-right">
            <a href="<?=base_url('daftar_bahan/tambah')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Bahan
            </a>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Kodebar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Jumlah</th>
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

<script>
  $(function () {
    $("#table2").DataTable({
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
        "url": "<?=base_url('materials/get_ajax')?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [0,6,7],
          "orderable": false
        },
        {
          "targets": [7],
          "className": 'text-center',
          "width": '9rem',
          "height": '9rem'
        }
      ]
    });
  });
</script>