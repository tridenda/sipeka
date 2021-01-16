<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
  <li class="breadcrumb-item"><a href="<?=base_url('gaji')?>">Gaji Karyawan</a></li>
  <?php
    if( $this->uri->segment(1) == 'gaji' ) {
      echo "<li class=\"breadcrumb-item active\">Daftar Gaji</li>";
    } else if( $this->uri->segment(1) == 'pembayaran_gaji' ) {
      echo "<li class=\"breadcrumb-item active\">Pembayaran gaji</li>";
    } else if( $this->uri->segment(1) == 'pembayaran_cuti' ) {
      echo "<li class=\"breadcrumb-item active\">Pembayaran Cuti</li>";
    } else {
      echo "<li class=\"breadcrumb-item active\">Daftar Gaji</li>";
    }
  ?>
</ol>