<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gaji</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('salaries/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title">Data pembayaran gaji</h3>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Kehadiran</th>
            <th>Cuti</th>
            <th>Lembur</th>
            <th>Status</th>
            <?php if( $this->functions->user_login()->level == '1') : ?>
            <th>Aksi</th>
            <?php endif; ?>
          </tr>
          </thead>
          <tbody>
          <?php $no=1?>
          <?php foreach ( $row as $payment ) : ?>
          <tr>
            <td><?=$no++?></td>
            <td><?=indo_date($payment->date)?></td>
            <td><?=$payment->user_name?></td>
            <td><?=$payment->attendance?> hari</td>
            <td><?=$payment->annual_leave?> hari</td>
            <td><?=$payment->overtime?> jam</td>
            <td><?=$payment->status ? $payment->status : 'Belum dibayar'?></td>
            <?php if( $this->functions->user_login()->level == '1') : ?>
              <td style="width: 7rem" class="text-center">
                <button class="mr-1 btn btn-sm btn-<?=$payment->status ? 'secondary' : 'success'?>" id="select" 
                  data-toggle="modal" data-target="#detail-modal"
                  data-modal_date="<?=indo_date($payment->date)?>"
                  data-date="<?=$payment->date?>"
                  data-user_id="<?=$payment->user_id?>"
                  data-user_name="<?=$payment->user_name?>"
                  data-attendance="<?=$payment->attendance?>"
                  data-annual_leave="<?=$payment->annual_leave?>"
                  data-overtime="<?=$payment->overtime?>"
                  data-status="<?=$payment->status?>">
                  <i class="fab fa-telegram-plane"></i> <?=$payment->status ? 'Bayar ulang' : 'Bayar'?>
                </button>            
              </td>
            <?php endif; ?>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        </div><!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="detail-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          Masukan Hari Kerja Bulan <span id="modal_date"></span>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="">
          <h5 class="text-center"><a id="left" href="#"><i class="fa fa-chevron-left"> </i></a><span>&nbsp;</span><span id="month"> </span><span>&nbsp;</span><span id="year"> </span><span>&nbsp;</span><a id="right" href="#"><i class="fa fa-chevron-right"> </i></a></h5>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-sm-10 col-sm-offset-1">
            <table class="table" id="table-calendar"></table>
          </div>
        </div>
        <form action="" method="post">
          <div class="form-group">
            <label>Total hari kerja *</label>
            <div class="input-group">
              <input name="date" id="date" type="hidden" value="">
              <input name="user_id" id="user_id" type="hidden" value="">
              <input name="user_name" id="user_name" type="hidden" value="">
              <input name="attendance" id="attendance" type="hidden" value="">
              <input name="annual_leave" id="annual_leave" type="hidden" value="">
              <input name="overtime" id="overtime" type="hidden" value="">
              <input name="status" id="status" type="hidden" value="">
              <input name="workdaysum" type="text" class="form-control" placeholder="Isi dengan angka" autocomplete="off" value="<?=$this->input->post('workdaysum')?? ''?>">
              <div class="input-group-prepend">
                <span class="input-group-text">hari</span>
              </div>
            </div>
            <small class="text-red font-italic"><?php echo form_error('workdaysum'); ?></small>
          </div>
          <div class="card-footer">
            <button name="submit" type="submit" class="btn btn-success float-right ml-2"><i class="fas fa-paper-plane"></i> Lanjut bayar</button>
            <button type="reset" class="btn btn-secondary float-right ml-2">Reset</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  $(document).ready(function() {
    var currentDate = new Date();
    function generateCalendar(d) {
      function monthDays(month, year) {
        var result = [];
        var days = new Date(year, month, 0).getDate();
        for (var i = 1; i <= days; i++) {
          result.push(i);
        }
        return result;
      }
      Date.prototype.monthDays = function() {
        var d = new Date(this.getFullYear(), this.getMonth() + 1, 0);
        return d.getDate();
      };
      var details = {
        // totalDays: monthDays(d.getMonth(), d.getFullYear()),
        totalDays: d.monthDays(),
        weekDays: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      };
      var start = new Date(d.getFullYear(), d.getMonth()).getDay();
      var cal = [];
      var day = 1;
      for (var i = 0; i <= 6; i++) {
        cal.push(['<tr>']);
        for (var j = 0; j < 7; j++) {
          if (i === 0) {
            cal[i].push('<td>' + details.weekDays[j] + '</td>');
          } else if (day > details.totalDays) {
            cal[i].push('<td>&nbsp;</td>');
          } else {
            if (i === 1 && j < start) {
              cal[i].push('<td>&nbsp;</td>');
            } else {
              cal[i].push('<td class="day">' + day++ + '</td>');
            }
          }
        }
        cal[i].push('</tr>');
      }
      cal = cal.reduce(function(a, b) {
        return a.concat(b);
      }, []).join('');
      $('#table-calendar').append(cal);
      $('#month').text(details.months[d.getMonth()]);
      $('#year').text(d.getFullYear());
      $('td.day').mouseover(function() {
        $(this).addClass('hover');
      }).mouseout(function() {
        $(this).removeClass('hover');
      });
    }
    $('#left').click(function() {
      $('#table-calendar').text('');
      if (currentDate.getMonth() === 0) {
        currentDate = new Date(currentDate.getFullYear() - 1, 11);
        generateCalendar(currentDate);
      } else {
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1)
        generateCalendar(currentDate);
      }
    });
    $('#right').click(function() {
      $('#table-calendar').html('<tr></tr>');
      if (currentDate.getMonth() === 11) {
        currentDate = new Date(currentDate.getFullYear() + 1, 0);
        generateCalendar(currentDate);
      } else {
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1)
        generateCalendar(currentDate);
      }
    });
    generateCalendar(currentDate);
  });

  $(document).ready(function() {
    $(document).on('click', '#select', function () {
      var modal_date = $(this).data('modal_date');
      var date = $(this).data('date');
      var user_id = $(this).data('user_id');
      var user_name = $(this).data('user_name');
      var attendance = $(this).data('attendance');
      var annual_leave = $(this).data('annual_leave');
      var overtime = $(this).data('overtime');
      var status = $(this).data('status');
      $('#modal_date').text(modal_date);
      $('#date').val(date);
      $('#user_id').val(user_id);
      $('#user_name').val(user_name);
      $('#attendance').val(attendance);
      $('#annual_leave').val(annual_leave);
      $('#overtime').val(overtime);
      $('#status').val(status);
      $('#material-modal').modal('hide');
    })
  })
</script>