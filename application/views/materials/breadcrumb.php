<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
  <li class="breadcrumb-item"><a href="<?=base_url('bahan_baku')?>">Bahan Baku</a></li>
  <?php
    if( $this->uri->segment(1) == 'daftar_bahan' ) {
      echo "<li class=\"breadcrumb-item active\">Daftar bahan</li>";
    } else if( $this->uri->segment(1) == 'kategori' ) {
      echo "<li class=\"breadcrumb-item active\">Kategori</li>";
    } else if( $this->uri->segment(1) == 'satuan' ) {
      echo "<li class=\"breadcrumb-item active\">Satuan</li>";
    } else if( $this->uri->segment(1) == 'pemasok' ) {
      echo "<li class=\"breadcrumb-item active\">Pemasok</li>";
    } else {
      echo "<li class=\"breadcrumb-item active\">Daftar Bahan</li>";
    }
  ?>
</ol>