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
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-import"></i></span>

          <div class="info-box-content">
            <h6 class="font-weight-bold text-muted border-bottom">Bahan Masuk</h6>
            <span class="info-box-text">10 Jenis</span>
            <span class="info-box-number">Rp 2.500.000,00</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3 text-right">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-export"></i></span>

          <div class="info-box-content">
            <h6 class="font-weight-bold text-muted border-bottom">Bahan Keluar</h6>
            <span class="info-box-text">10 Jenis</span>
            <span class="info-box-number">Rp 2.500.000,00</span>
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
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-ban"></i></span>

          <div class="info-box-content">
            <h6 class="font-weight-bold text-muted border-bottom">Bahan Hilang</h6>
            <span class="info-box-text">10 Jenis</span>
            <span class="info-box-number">Rp 2.500.000,00</span>
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
            <span class="info-box-text">10 Jenis</span>
            <span class="info-box-number">Rp 2.500.000,00</span>
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
                <h3 class="card-title">5 Bahan Paling Sering Dipakai</h3>
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
    labels:['Produk 1', 'Produk 2', 'Produk 3', 'Produk 4', 'Produk 5'],
    datasets:[{
      label:'Produk',
      data:[
        5,5,5,5,5
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

// Global Options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 12;
Chart.defaults.global.defaultFontColor = '#777';
var ctx = document.getElementById("myChart2");
ctx.height = 80;

var massPopChart = new Chart(myChart2, {
  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:['Produk 1', 'Produk 2', 'Produk 3', 'Produk 4', 'Produk 5'],
    datasets:[{
      label:'Produk',
      data:[
        5,5,5,5,5
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
</script>