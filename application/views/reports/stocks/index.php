<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan Persediaan <small class="text-muted">(<?php echo indo_date(date('Y-m-d'))?>)</small></h1>
        </div>
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Beranda</li>
          </ol> -->
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
            <span class="info-box-text"><?=$this->functions->get_report("in", "kind")?> Jenis</span>
            <span class="info-box-number"><?=$this->functions->get_report("in", "rupiah")?></span>
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
            <span class="info-box-text"><?=$this->functions->get_report("out", "kind")?> Jenis</span>
            <span class="info-box-number"><?=$this->functions->get_report("out", "rupiah")?></span>
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
            <span class="info-box-text"><?=$this->functions->get_report("missing", "kind")?> Jenis</span>
            <span class="info-box-number"><?=$this->functions->get_report("missing", "rupiah")?></span>
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
            <span class="info-box-text"><?=$this->functions->get_report("founded", "kind")?> Jenis</span>
            <span class="info-box-number"><?=$this->functions->get_report("founded", "rupiah")?></span>
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
      <?php foreach( $this->functions->get_top_five("out") as $material ) : ?>
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
        <?php foreach( $this->functions->get_top_five("out") as $material ) : ?>
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
      <?php foreach( $this->functions->get_top_five("missing") as $material ) : ?>
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
        <?php foreach( $this->functions->get_top_five("missing") as $material ) : ?>
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
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [{
        type                : 'line',
        data                : [100000, 120, 170, 167, 180, 177, 160, 170, 167, 180, 177, 160],
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
          data                : [60, 80, 70, 67, 80, 77, 100, 170, 167, 180, 177, 160],
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
            suggestedMax: 200
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