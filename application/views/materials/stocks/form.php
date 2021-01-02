<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Bahan</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('materials/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-secondary card-outline">
        <div class="card-header">
          <h3 class="card-title"> bahan</h3>
          <div class="float-right">
            <a href="<?=base_url('persediaan/masuk')?>" class="btn btn-warning">
            <i class="fas fa-reply"></i> Kembali
            </a>
          </div>
        </div> 
        <!-- /.card-body -->
        <div class="d-flex justify-content-center mb-4">
          <form action="" style="width: 30rem;" method="post">
            <div class="form-group">
              <label for="date">Tanggal *</label>
              <input name="date" type="date" class="form-control" id="date" value="<?=date('Y-m-d')?>">
              <small class="text-red font-italic"><?php echo form_error('date'); ?></small>
            </div>
            <input name="material_id" id="material_id" type="hidden">
            <div class="form-group">
              <label for="barcode">Kodebar *</label>
              <div class="input-group input-group-sm">
                <input name="barcode" id="barcode" type="text" class="form-control" placeholder="Cari kodebar dengan tekan tombol cari dibagian kanan">
                <span class="input-group-append">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#material-modal"><i class="fas fa-search"></i></button>
              </div>
              <small class="text-red font-italic"><?php echo form_error('barcode'); ?></small>
            </div>
            <div class="form-group">
              <label for="name">Nama bahan</label>
              <input name="name" type="text" id="name" class="form-control" placeholder="-" disabled="">
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="unit_name">Satuan barang</label>
                  <input name="unit_name" id="unit_name" type="text" class="form-control" placeholder="-" disabled="">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="initial_qty">Jumlah awal</label>
                  <input name="initial_qty" id="initial_qty" type="number" class="form-control" placeholder="-" disabled="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="notes">Keterangan</label>
              <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Tambah keterangan"><?=$this->input->post('notes')?></textarea>
            </div>
            <div class="form-group">
              <label for="supplier">Pemasok</label>
              <?php echo form_dropdown('supplier', $supplier, $selected_supplier, ['class' => 'form-control']) ?>
            </div>
            <div class="form-group">
              <label for="quantity">Jumlah</label>
              <input name="quantity" id="quantity" type="number" class="form-control" placeholder="Masukan angka" value="<?=$this->input->post('quantity')?>">
              <small class="text-red font-italic"><?php echo form_error('quantity'); ?></small>
            </div>
            <div class="card-footer">
              <button name="<?=$page?>" type="submit" class="btn btn-primary float-right ml-2"><i class="fas fa-paper-plane"></i> Simpan</button>
              <button type="reset" class="btn btn-secondary float-right ml-2">Reset</button>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<div class="modal fade" id="material-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pilih Bahan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="material-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kodebar</th>
              <th>Nama</th>
              <th>Satuan</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          </tfoot>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
function Test(){
var test = $(this).data('section');
alert(test);
}</script>
<script>
  $(function () {
    $("#material-table").DataTable({
      "autoWidth": false,
      "pageLength": 8,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?=base_url('stocks/get_material_ajax/')?>",
        "type": "POST"
      },
      "columnDefs": [
        {
          "targets": [5],
          "className": 'text-center',
          "width": '5rem',
          "height": '5rem',
          "orderable": false
        }
      ]      
    })
  })

  $(document).ready(function() {
    $(document).on('click', '#select', function () {
      var material_id = $(this).data('material_id');
      var barcode = $(this).data('barcode');
      var name = $(this).data('name');
      var unit_name = $(this).data('unit_name');
      var initial_qty = $(this).data('initial_qty');
      $('#material_id').val(material_id);
      $('#barcode').val(barcode);
      $('#name').val(name);
      $('#unit_name').val(unit_name);
      $('#initial_qty').val(initial_qty);
      $('#material-modal').modal('hide');
    })
  })
</script>