<!-- Begin: Add data success -->
<?php if( $this->session->has_userdata('success') ) : ?>
<div class="alert alert-success alert-dismissible m-3">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
  <?=$this->session->flashdata('success');?>
</div>
<?php endif; ?>
<!-- End: Add data success -->

<!-- Begin: Empty edit -->
<?php if( $this->session->has_userdata('empty') ) : ?>
<div class="alert alert-info alert-dismissible m-3">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-info"></i> Kosong!</h5>
  <?=$this->session->flashdata('empty');?>
</div>
<?php endif; ?>
<!-- End: Empty edit -->


<!-- Begin: Delete -->
<?php if( $this->session->has_userdata('deleted') ) : ?>
  <div class="alert alert-danger alert-dismissible m-3">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-eraser"></i> Berhasil!</h5>
  <?=$this->session->flashdata('deleted');?>
</div>
<?php endif; ?>
<!-- End: Delete -->

<!-- Begin: Delete -->
<?php if( $this->session->has_userdata('used') ) : ?>
<div class="alert alert-warning alert-dismissible m-3">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-exclamation-triangle"></i> Tidak dapat dihapus!</h5>
  <?=$this->session->flashdata('used');?>
</div>
<?php endif; ?>
<!-- End: Delete -->