<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Slip Gaji</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Gaji Karyawan</a></li>
            <li class="breadcrumb-item active">Slip Gaji</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header mb-3">
          <h3 class="card-title">Data slip gaji</h3>
          <div class="float-right">
            <a href="<?=base_url('pembayaran_gaji')?>" class="btn btn-warning">
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
                  <small class="float-right"><?=indo_date($_SESSION['data']['row']['date'])?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-3 invoice-col">
                Nama
                <address>
                  <strong><?=$_SESSION['data']['user_data']->name?></strong>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-3 invoice-col">
                Posisi
                <address>
                  <strong><?=$_SESSION['data']['user_data']->level == '1' ? 'Admin' : 'Pramuniaga'?></strong>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-3 invoice-col">
                Nama pengguna
                <address>
                  <strong><?=$_SESSION['data']['user_data']->username?></strong>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-3 invoice-col">
                Alamat
                <address>
                  <strong><?=$_SESSION['data']['user_data']->address?></strong>
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
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Gaji pokok</td>
                    <td><?=indo_currency($_SESSION['data']['salary_permonth'])?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Upah lembur</td>
                    <td><?=indo_currency($_SESSION['data']['salary_overtime'])?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Uang makan</td>
                    <td><?=indo_currency($_SESSION['data']['initial_salary']->meal_allowance)?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Uang transfortasi</td>
                    <td><?=indo_currency($_SESSION['data']['initial_salary']->transport_allowance)?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Uang lainnya</td>
                    <td><?=indo_currency($_SESSION['data']['initial_salary']->other_allowance)?></td>
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
                      <td><?=indo_currency($_SESSION['data']['salary_permonth']
                            + $_SESSION['data']['salary_overtime']
                            + $_SESSION['data']['initial_salary']->meal_allowance
                            + $_SESSION['data']['initial_salary']->transport_allowance
                            + $_SESSION['data']['initial_salary']->other_allowance)?></td>
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
                <?php if( $_SESSION['data']['row']['status'] == null ) {?>
                <form action="" method="post">
                  <input name="date" type="hidden" value="<?=$_SESSION['data']['row']['date']?>">
                  <input name="workdaysum" type="hidden" value="<?=$_SESSION['data']['row']['workdaysum']?>">
                  <input name="user_id" type="hidden" value="<?=$_SESSION['data']['user_data']->user_id?>">
                  <button name="submit" type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Lakukan pembayaran
                  </button>
                </form>
                <?php } else {
                ?>
                <form action="" method="post">
                  <input name="date" type="hidden" value="<?=$_SESSION['data']['row']['date']?>">
                  <input name="user_id" type="hidden" value="<?=$_SESSION['data']['user_data']->user_id?>">
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