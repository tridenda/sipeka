<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan Persediaan 
            <!-- <small class="text-muted">(<?php echo indo_date(date('Y-m-d'))?>)</small> -->
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <form action="" method="post">
              <div class="input-group date" id="timepicker" data-target-input="nearest">
              <select name="month" class="form-control datetimepicker-input" style="width: 10rem">
              <?php 
                $post = $this->input->post(null, TRUE);
                if( !$post['month'] ) {
                  $input_month = NULL;
                } else {
                  $input_month = $post['month'];
                }
                if( !$post['year'] ) {
                  $input_year = NULL;
                } else {
                  $input_year = $post['year'];
                }
                $curmonth = date('m');
                // Activate this condition if there's input
                // Get the data from flashdata
                if( $post['month'] ) {
                  $curmonth = $post['month'];
                }
              ?>
                <option <?= $curmonth == '01' ? 'selected' : ''?> value="01">Januari</option>
                <option <?= $curmonth == '02' ? 'selected' : ''?> value="02" >Februari</option>
                <option <?= $curmonth == '03' ? 'selected' : ''?> value="03">Maret</option>
                <option <?= $curmonth == '04' ? 'selected' : ''?> value="04">April</option>
                <option <?= $curmonth == '05' ? 'selected' : ''?> value="05">Mei</option>
                <option <?= $curmonth == '06' ? 'selected' : ''?> value="06">Juni</option>
                <option <?= $curmonth == '07' ? 'selected' : ''?> value="07">Juli</option>
                <option <?= $curmonth == '08' ? 'selected' : ''?> value="08">Agustus</option>
                <option <?= $curmonth == '09' ? 'selected' : ''?> value="09">September</option>
                <option <?= $curmonth == '10' ? 'selected' : ''?> value="10">Oktober</option>
                <option <?= $curmonth == '11' ? 'selected' : ''?> value="11">November</option>
                <option <?= $curmonth == '12' ? 'selected' : ''?> value="12">Desember</option>
              </select>
              <select name="year" class="ml-2 form-control datetimepicker-input">
                <?php
                  $curyear = date('Y');
                  $range = $curyear - 4;
                  foreach (range($range, $curyear) as $value) :
                    // Activate this condition if there's input
                    // Get the data from flashdata
                    if( $post['year'] ) {
                      $curyear = $post['year'];
                    }
                ?>
                  <option value="<?=$value?>" <?=$value == $curyear ? 'selected' : ''?>><?=$value?></option>
                <?php
                  endforeach;
                ?>
              </select>
              <button type="submit" class="ml-1 btn btn-outline-secondary input-group-append">Ubah Tanggal</button>
              </div>
            </form>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">   
      <div class="row">
      <div class="col-12 col-sm-6 col-md-3 text-right">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-import"></i></span>

          <div class="info-box-content">
            <h6 class="font-weight-bold text-muted border-bottom">Bahan Masuk</h6>
            <span class="info-box-text"><?=$this->functions->get_report("in", "kind", $input_month, $input_year)?> Jenis</span>
            <span class="info-box-number"><?=$this->functions->get_report("in", "rupiah", $input_month, $input_year)?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3 text-right">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-export"></i></span>

          <div class="info-box-content">
            <h6 class="font-weight-bold text-muted border-bottom">Bahan Keluar</h6>
            <span class="info-box-text"><?=$this->functions->get_report("out", "kind", $input_month, $input_year)?> Jenis</span>
            <span class="info-box-number"><?=$this->functions->get_report("out", "rupiah", $input_month, $input_year)?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3 text-right">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>

          <div class="info-box-content">
            <h6 class="font-weight-bold text-muted border-bottom">Bahan Hilang</h6>
            <span class="info-box-text"><?=$this->functions->get_report("missing", "kind", $input_month, $input_year)?> Jenis</span>
            <span class="info-box-number"><?=$this->functions->get_report("missing", "rupiah", $input_month, $input_year)?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3 text-right">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-undo"></i></span>

          <div class="info-box-content">
            <h6 class="font-weight-bold text-muted border-bottom">Bahan Ditemukan</h6>
            <span class="info-box-text"><?=$this->functions->get_report("founded", "kind", $input_month, $input_year)?> Jenis</span>
            <span class="info-box-number"><?=$this->functions->get_report("founded", "rupiah", $input_month, $input_year)?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    </div><!-- /.container-fluid -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-1">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">5 Bahan Paling Sering Dikeluarkan</h3>
                <!-- <a href="javascript:void(0);">View Report</a> -->
              </div>
            </div>
            <div class="card-body">
              <!-- Bar chart -->
              <div class="box-body">
                <div class="chart">
                    <canvas id="myChart1"></canvas>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-1">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">5 Bahan Paling Sering Hilang</h3>
                <!-- <a href="javascript:void(0);">View Report</a> -->
              </div>
            </div>
            <div class="card-body">
              <!-- Bar chart -->
              <div class="box-body">
                <div class="chart">
                    <canvas id="myChart2"></canvas>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Grafik Keluar/Masuk Bahan Perbulan <small>(Hitung Perjenis)</small></h3>
                </div>
              </div>
              <div class="card-body" style="position: relative;">
                <div class="position-relative mb-4">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                  <canvas id="stock-in" class="chartjs-render-monitor"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Bahan Masuk
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Bahan Keluar
                  </span>
                </div>
              </div>
            </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Page script -->
<script>
var myChart1 = document.getElementById('myChart1').getContext('2d');

// Global Options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 12;
Chart.defaults.global.defaultFontColor = '#777';
var ctx = document.getElementById("myChart1");
ctx.height = 80;

var massPopChart = new Chart(myChart1, {
  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:[
      <?php $no=1 ?>
      <?php foreach( $this->functions->get_top_five("out", $input_month, $input_year) as $material ) : ?>
        <?php 
        if( $no != 0 ) {
          echo "'".$material->material_name."'";
          echo ",";
        } else {
          echo "'".$material->material_name."'";
        }
        ?>
      <?php endforeach; ?>
    ],
    datasets:[{
      label:'Produk',
      data:[
        <?php $no=1 ?>
        <?php foreach( $this->functions->get_top_five("out", $input_month, $input_year) as $material ) : ?>
          <?php 
          if( $no != 0 ) {
            echo "'".$material->num_rows."'";
            echo ",";
          } else {
            echo "'".$material->num_rows."'";
          }
          ?>
        <?php endforeach; ?>
      ],
      //backgroundColor:'green',
      backgroundColor:[
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(255, 99, 132, 0.6)'
      ],
      borderWidth:1,
      borderColor:'#777',
      hoverBorderWidth:3,
      hoverBorderColor:'#000'
    }]
  },
  options:{
    title:{
      display:false,
      text:'Largest Cities In Massachusetts',
      fontSize:25,
      responsive: true
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
    legend:{
      display:false,
      position:'right',
      labels:{
        fontColor:'#000'
      }
    },
    layout:{
      padding:{
        left:0,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips:{
      enabled:true
    }
  }
});

var myChart2 = document.getElementById('myChart2').getContext('2d');

Chart.defaults.global.defaultFontColor = '#777';
var ctx = document.getElementById("myChart2");
ctx.height = 80;

var massPopChart = new Chart(myChart2, {
  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    
    labels:[
      <?php $no=1 ?>
      <?php foreach( $this->functions->get_top_five("missing", $input_month, $input_year) as $material ) : ?>
        <?php 
        if( $no != 0 ) {
          echo "'".$material->material_name."'";
          echo ",";
        } else {
          echo "'".$material->material_name."'";
        }
        ?>
      <?php endforeach; ?>
    ],
    datasets:[{
      label:'Produk',
      data:[
        <?php $no=1 ?>
        <?php foreach( $this->functions->get_top_five("missing", $input_month, $input_year) as $material ) : ?>
          <?php 
          if( $no != 0 ) {
            echo "'".$material->num_rows."'";
            echo ",";
          } else {
            echo "'".$material->num_rows."'";
          }
          ?>
        <?php endforeach; ?>
      ],
      //backgroundColor:'green',
      backgroundColor:[
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(255, 99, 132, 0.6)'
      ],
      borderWidth:1,
      borderColor:'#777',
      hoverBorderWidth:3,
      hoverBorderColor:'#000'
    }]
  },
  options:{
    title:{
      display:false,
      text:'Largest Cities In Massachusetts',
      fontSize:25,
      responsive: true
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
    legend:{
      display:false,
      position:'right',
      labels:{
        fontColor:'#000'
      }
    },
    layout:{
      padding:{
        left:0,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips:{
      enabled:true
    }
  }
});

// test
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $visitorsChart = $('#stock-in')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : [
        <?php $no=1 ?>
        <?php foreach( $this->functions->get_top_year("in", $input_month, $input_year) as $material ) : ?>
          <?php 
          if( $material->month_name == '1' ) {
            $month_name = 'Januari';
          } else if( $material->month_name == '2' ) {
            $month_name = 'Februari';
          } else if( $material->month_name == '3' ) {
            $month_name = 'Maret';
          } else if( $material->month_name == '4' ) {
            $month_name = 'April';
          } else if( $material->month_name == '5' ) {
            $month_name = 'Mei';
          } else if( $material->month_name == '6' ) {
            $month_name = 'Juni';
          } else if( $material->month_name == '7' ) {
            $month_name = 'Juli';
          } else if( $material->month_name == '8' ) {
            $month_name = 'Agustus';
          } else if( $material->month_name == '9' ) {
            $month_name = 'September';
          } else if( $material->month_name == '10' ) {
            $month_name = 'Oktober';
          } else if( $material->month_name == '11' ) {
            $month_name = 'November';
          } else if( $material->month_name == '12' ) {
            $month_name = 'Desember';
          }
          if( $no != 0 ) {
            echo "'".$month_name."'";
            echo ",";
          } else {
            echo "'".$month_name."'";
          }
          ?>
        <?php endforeach; ?>
      ],
      datasets: [{
        type                : 'line',
        data                : [
          <?php $no=1 ?>
          <?php foreach( $this->functions->get_top_year("in", $input_month, $input_year) as $material ) : ?>
            <?php 
            if( $no != 0 ) {
              echo "'".$material->quantity."'";
              echo ",";
            } else {
              echo "'".$material->quantity."'";
            }
            ?>
          <?php endforeach; ?>
        ],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : [
            <?php $no=1 ?>
            <?php foreach( $this->functions->get_top_year("out", $input_month, $input_year) as $material ) : ?>
              <?php 
              if( $no != 0 ) {
                echo "'".$material->quantity."'";
                echo ",";
              } else {
                echo "'".$material->quantity."'";
              }
              ?>
            <?php endforeach; ?>
          ],
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            // suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})
</script>