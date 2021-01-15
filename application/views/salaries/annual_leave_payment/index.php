<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cuti</h1>
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
          <h3 class="card-title">Data pembayaran cuti</h3>
        </div> <!-- /.card-body -->
        <?php $this->view('messages'); ?>
        <div class="card-body">
        <table id="table1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Nama</th>
            <th>Sisa Cuti</th>
            <th>Total bayar</th>
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
            <td><?=$payment->date?></td>
            <td><?=$payment->user_name?></td>
            <td><?=$payment->annual_leave?></td>
            <!-- Annual leave perday 
            (basic salary * sum of monthday peryear) / sum of workday peryear
            -->
            <?php 
            $annual_leave_perday = ($payment->salary * 12) / $payment->workdaysum;
            $sub_total = ($annual_leave_perday * $payment->annual_leave);
            ?>
            <td><?=indo_currency($sub_total)?></td>
            <td><?=$payment->annual_leave == 0 ? 'Terbayar': 'Belum dibayar'?></td>
            <?php if( $this->functions->user_login()->level == '1') : ?>
              <td style="width: 8rem" class="text-center">
              <form action="<?=base_url('pembayaran_cuti/form')?>" method="post">
                <input name="user_id" type="hidden" value="<?=$payment->user_id?>">
                <input name="date" type="hidden" value="<?=$payment->date?>">
                <input name="user_name" type="hidden" value="<?=$payment->user_name?>">
                <input name="annual_leave" type="hidden" value="<?=$payment->annual_leave?>">
                <input name="sub_total" type="hidden" value="<?=$sub_total?>">
                <button type="submit" class="mr-1 btn btn-sm btn-<?=$payment->annual_leave == 0 ? 'secondary': 'success'?>">
                  <i class="fab fa-telegram-plane"></i> <?=$payment->annual_leave == 0 ? 'Terbayar': 'Belum dibayar'?>
                </button> 
              </form>
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