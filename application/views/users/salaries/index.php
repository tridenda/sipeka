<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gaji</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('pengguna')?>">Pengguna</a></li>
            <li class="breadcrumb-item active">Gaji</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Data gaji</h3>
          <div class="float-right">
            <a href="<?=base_url('gaji/tambah')?>" class="btn btn-primary">
              <i class="fa fa-plus"></i> Tambah Gaji
            </a>
          </div>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="salaries-table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Nama</th>
            <th>Gaji Pokok</th>
            <th>Hak Cuti</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody></tbody>
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
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="salary-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Tahun</th>
              <td><span id="date"></span></td>
            </tr>
            <tr>
              <th>Nama</th>
              <td><span id="user_name"></span></td>
            </tr>
            <tr>
              <th>Gaji Pokok</th>
              <td><span id="salary"></span></td>
            </tr>
            <tr>
              <th>Uang Makan Perbulan</th>
              <td><span id="meal_allowance"></span></td>
            </tr>
            <tr>
              <th>Uang Transformasi Perbulan</th>
              <td><span id="transport_allowance"></span></td>
            </tr>
            <tr>
              <th>Upah Lembur Perjam</th>
              <td><span id="overtime_allowance"></span></td>
            </tr>
            <tr>
              <th>Uang Lainnya Perbulan</th>
              <td><span id="other_allowance"></span></td>
            </tr>
            <tr>
              <th>Jam Kerja Perhari</th>
              <td><span id="worktime"></span></td>
            </tr>
            <tr>
              <th>Hak Cuti</th>
              <td><span id="annual_leave"></span></td>
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
    $("#salaries-table").DataTable({
      "autoWidth": false,
      "pageLength": 8,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?=base_url('Salaries/get_ajax')?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          // 5,7,8,9
          // "targets": [5,6,8,9,10],
          // "visible": false
        },
        {
          "targets": [5],
          "className": 'text-center',
          "width": '15rem',
          "orderable": false
        }
      ]      
    })
  })

  $(document).ready(function() {
    $(document).on('click', '#select', function () {
      var date = $(this).data('date');
      var user_name = $(this).data('user_name');
      var salary = $(this).data('salary');
      var meal_allowance = $(this).data('meal_allowance');
      var transport_allowance = $(this).data('transport_allowance');
      var overtime_allowance = $(this).data('overtime_allowance');
      var other_allowance = $(this).data('other_allowance');
      var overtime_allowance = $(this).data('overtime_allowance');
      var worktime = $(this).data('worktime');
      var annual_leave = $(this).data('annual_leave');
      $('#date').text(date);
      $('#user_name').text(user_name);
      $('#salary').text(salary);
      $('#meal_allowance').text(meal_allowance);
      $('#transport_allowance').text(transport_allowance);
      $('#overtime_allowance').text(overtime_allowance);
      $('#other_allowance').text(other_allowance);
      $('#overtime_allowance').text(overtime_allowance);
      $('#worktime').text(worktime);
      $('#annual_leave').text(annual_leave);
      $('#material-modal').modal('hide');
    })
  })
</script>