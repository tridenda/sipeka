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
<div class="modal-content bg-danger">
  <div class="modal-header">
    <h4 class="modal-title">Danger Modal</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">
  <?=$this->session->flashdata('success');?>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-outline-light">Save changes</button>
  </div>
</div>
<?php endif; ?>
<!-- End: Empty edit -->