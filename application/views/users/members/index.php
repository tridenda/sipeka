<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('users/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Data pelanggan</h3>
          <div class="float-right">
            <?php if( $this->functions->user_login()->level == '1') : ?>
              <form action="" method="post">
                <button name="tutorial" type="submit" class="btn btn-secondary">
                  <i class="fas fa-question-circle"></i> Tutorial
                </button>
                  <a href="<?=base_url('pengguna/pelanggan/tambah')?>" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Tambah Pelanggan
                </a>
              </form>
            <?php endif; ?>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="members-table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>No HP</th>
            <th>ALamat</th>
            <th>Poin</th>
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
    $("#members-table").DataTable({
      "autoWidth": false,
      "pageLength": 10,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?=base_url('Members/get_ajax')?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [6],
          "className": 'text-center',
          "width": '15rem',
          "orderable": false
        }
      ]      
    })
  })
</script>