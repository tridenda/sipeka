<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
  <li class="breadcrumb-item"><a href="<?=base_url('produk')?>">Produk</a></li>
  <?php
    if( $this->uri->segment(1) == 'produk'
    && $this->uri->segment(2) == 'daftar_produk' ) {
      echo "<li class=\"breadcrumb-item active\">Daftar Produk</li>";
    } else if( $this->uri->segment(1) == 'produk'
    && $this->uri->segment(2) == 'kategori' ) {
      echo "<li class=\"breadcrumb-item active\">Kategori</li>";
    } else {
      echo "<li class=\"breadcrumb-item active\">Daftar Produk</li>";
    }
  ?>
</ol>