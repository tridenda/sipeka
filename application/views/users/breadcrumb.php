<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
  <li class="breadcrumb-item"><a href="<?=base_url('pengguna')?>">Pengguna</a></li>
  <?php
    if( $this->uri->segment(2) == 'pengaturan' ) {
      echo "<li class=\"breadcrumb-item active\">Pengaturan</li>";
    } else if( $this->uri->segment(2) == 'bantuan' ) {
      echo "<li class=\"breadcrumb-item active\">Bantuan</li>";
    } else {
      echo "<li class=\"breadcrumb-item active\">Pramuniaga</li>";
    } 
  ?>
</ol>