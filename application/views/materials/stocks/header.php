<section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
          <?php 
            if( $this->uri->segment(2) == 'masuk' ) {
              echo "Bahan Masuk";
            } else if( $this->uri->segment(2) == 'keluar' ) {
              echo "Bahan Keluar";
            } else if( $this->uri->segment(2) == 'hilang' ) {
              echo "Bahan Hilang";
            } else if( $this->uri->segment(2) == 'ditemukan' ) {
              echo "Bahan Ditemukan";
            }
          ?>
          </h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
          <li class="breadcrumb-item"><a href="<?=base_url('bahan_baku')?>">Transaksi Persediaan</a></li>
          <li class="breadcrumb-item active">
          <?php 
            if( $this->uri->segment(2) == 'masuk' ) {
              echo "Bahan Masuk";
            } else if( $this->uri->segment(2) == 'keluar' ) {
              echo "Bahan Keluar";
            } else if( $this->uri->segment(2) == 'hilang' ) {
              echo "Bahan Hilang";
            } else if( $this->uri->segment(2) == 'ditemukan' ) {
              echo "Bahan Ditemukan";
            }
          ?>
          </li>
        </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>