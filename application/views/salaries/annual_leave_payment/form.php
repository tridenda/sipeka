<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Slip Cuti</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('salaries/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header mb-3">
          <h3 class="card-title">Data slip cuti</h3>
          <div class="float-right">
            <a href="<?=base_url('pembayaran_cuti')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div>
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Kedaibutin
                  <small class="float-right"><?=$row['date']?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-3 invoice-col">
                Nama
                <address>
                  <strong><?=$user_data->name?></strong>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-3 invoice-col">
                Posisi
                <address>
                  <strong><?=$user_data->level == 1 ? 'Admin' : 'Pramuniaga'?></strong>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-3 invoice-col">
                Nama pengguna
                <address>
                  <strong><?=$user_data->username?></strong>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-3 invoice-col">
                Alamat
                <address>
                  <strong><?=$user_data->address?></strong>
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Sisa Cuti</th>
                    <th>Total Bayar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td><?=$row['annual_leave']?></td>
                    <td><?=indo_currency($row['sub_total'])?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                
                <!-- Empty -->

              </div>
              <!-- /.col -->
              <div class="col-6">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th>Total:</th>
                      <td><?=indo_currency($row['sub_total'])?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                <?php if( $row['annual_leave'] != 0 ) {?>
                <form action="" method="post">
                  <input name="user_id" type="hidden" value="<?=$user_data->user_id?>">
                  <button name="submit" type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Lakukan pembayaran
                  </button>
                </form>
                <?php } else {
                ?>
                <form action="" method="post">
                  <!-- <input name="date" type="hidden" value="<?=$_SESSION['data']['row']['date']?>">
                  <input name="user_id" type="hidden" value="<?=$_SESSION['data']['user_data']->user_id?>"> -->
                  <button name="submit" type="submit" class="btn btn-secondary float-right"><i class="far fa-credit-card"></i> Bayar ulang
                  </button>
                </form>
                <?php
                } ?>
                <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </button> -->
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->