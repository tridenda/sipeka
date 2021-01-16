<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Bantuan</h1>
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
      <div class="row">
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pengenalan Sipeka</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="d-md-flex p-3">
                <video controls>
                  <source src="<?=base_url()?>/assets/videos/introduction.mp4" type="video/mp4">
                  <source src="introduction.ogg" type="video/ogg">
                  Your browser does not support HTML5 video.
                </video>
              </div><!-- /.d-md-flex -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fab fa-twitter-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Twitter</span>
              <span class="info-box-number">twitter.com/tridenda97</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="fab fa-instagram-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Instagram</span>
              <span class="info-box-number">instagram.com/tridenda97</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fab fa-facebook-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Facebook</span>
              <span class="info-box-number">facebook.com/tridenda97</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="fas fa-envelope-open-text"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Email</span>
              <span class="info-box-number">tridenda297@gmail.com</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box mb-3 bg-secondary">
            <span class="info-box-icon"><i class="fas fa-phone-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nomor HP</span>
              <span class="info-box-number">0851-5522-7559</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>