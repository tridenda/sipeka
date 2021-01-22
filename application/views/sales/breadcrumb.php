<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
  <li class="breadcrumb-item"><a href="<?=base_url('penjualan')?>">Penjualan</a></li>
  <?php
    if( $this->uri->segment(2) == 'pesanan_baru' ) {
      echo "<li class=\"breadcrumb-item active\">Pesanan Baru</li>";
    } else if( $this->uri->segment(2) == 'daftar_penjualan' ) {
      echo "<li class=\"breadcrumb-item active\">Daftar Penjualan</li>";
    } else {
      echo "<li class=\"breadcrumb-item active\">Keranjang</li>";
    } 
  ?>
</ol>