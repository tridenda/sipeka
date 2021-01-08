<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
  <li class="breadcrumb-item"><a href="<?=base_url('bahan_baku')?>">Kehadiran</a></li>
  <?php
    if( $this->uri->segment(1) == 'pengisian_kehadiran' ) {
      echo "<li class=\"breadcrumb-item active\">Kehadiran</li>";
    } else if( $this->uri->segment(1) == 'pengisian_lembur' ) {
      echo "<li class=\"breadcrumb-item active\">Lembur</li>";
    } else if( $this->uri->segment(1) == 'pengisian_cuti' ) {
      echo "<li class=\"breadcrumb-item active\">Cuti</li>";
    } else {
      echo "<li class=\"breadcrumb-item active\">Kehadiran</li>";
    }
  ?>
</ol>