<div class="content-wrapper" style="min-height: 1416.81px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Keranjang</h1>
        </div>
        <div class="col-sm-6">
          <?php $this->load->view('sales/breadcrumb')?>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="content">
    <div class="row">
      <div class="col-sm bg-white ml-3">
        <div class="form-group">
          <label for="date" class="p-1 col-sm-3 col-form-label col-form-label-sm">Tanggal</label>
          <div class="p-1 col-sm-9">
            <input type="date" class="form-control form-control-sm" id="date">
          </div>
        </div>
        <div class="form-group">
          <label for="user_id" class="p-1 col-sm-3 col-form-label col-form-label-sm">Pramuniaga</label>
          <div class="p-1 col-sm-9">
            <input type="user_id" class="form-control form-control-sm" id="user_id" placeholder="Nama pramuniaga" readonly>
          </div>
        </div>
        <div class="form-group">
          <label for="Pelanggan" class="p-1 col-sm-3 col-form-label col-form-label-sm">Pelanggan</label>
          <div class="p-1 col-sm-9">
            <input type="Pelanggan" class="form-control form-control-sm" id="Pelanggan" placeholder="Nama pelanggan" readonly>
          </div>
        </div>
      </div>
      <div class="col-sm bg-white ml-1 mr-1">
        <div class="form-group">
          <label for="user_id" class="p-1 col-sm-3 col-form-label col-form-label-sm">Produk</label>
          <div class="p-1 col-sm-7">
            <input type="user_id" class="form-control form-control-sm" id="user_id" placeholder="Klik tombol cari untuk memilih" readonly>
          </div>
          <div class="p-1 col-sm-2">
            <button class="btn btn-outline-primary btn-sm w-100"><i class="fas fa-search"></i></button>
          </div>
        </div>
        <div class="form-group">
          <label for="Pelanggan" class="p-1 col-sm-3 col-form-label col-form-label-sm">Jumlah</label>
          <div class="p-1 col-sm-9">
            <input type="number" class="form-control form-control-sm" id="Pelanggan">
          </div>
        </div>
        <div class="form-group float-right mt-2">
          <button class="btn btn-outline-primary btn-sm">
            <i class="fa fa-cart-plus"></i> Tambah Ke Keranjang
          </button>
        </div>
      </div>
      <div class="col-sm bg-white mr-3">
        <p class="text-right" style="font-size: 1.5rem">
          Faktur <strong>IN2020100009</strong><br>
          <strong style="font-size: 3.6rem;">RP 30.000.000</strong>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kodebar</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Potongan</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>KB0209970004</td>
                  <td>Mie Kocok Kaki Sapi + Baso + Iga</td>
                  <td>Rp 25.000</td>
                  <td>2</td>
                  <td>Rp 2.000</td>
                  <td>Rp 48.000</td>
                  <td style="width: 5rem">
                    <form action="'.base_url('daftar_bahan/hapus').'" method="post">
                      <a class="btn btn-sm btn-outline-primary" href="'.base_url('daftar_bahan/ubah/').$material->material_id.'">
                        <i class="far fa-edit"></i> Ubah
                      </a>
                      <input name="material_id" type="hidden" value="'.$material->material_id.'">
                      <button onclick="return confirm('Anda akan menghapus data bahan, yakin?');" class="btn btn-sm btn-outline-danger">
                        <i class="far fa-trash-alt"></i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row" style="margin-top: -2rem;">
      <div class="col-3">
        <div class="card">
          <div class="form-group ml-3 mr-3 mt-3">
            <label for="Pelanggan" class="p-1 col-sm-4 col-form-label col-form-label-sm">Total</label>
            <div class="p-1 col-sm-8">
              <input type="Pelanggan" class="form-control form-control-sm" id="Pelanggan" placeholder="50000" readonly>
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <label for="discount" class="p-1 col-sm-4 col-form-label col-form-label-sm">Potongan</label>
            <div class="p-1 col-sm-8">
              <input type="number" class="form-control form-control-sm" id="discount" placeholder="Masukan angka">
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <label for="Pelanggan" class="p-1 col-sm-4 col-form-label col-form-label-sm">Total bayar</label>
            <div class="p-1 col-sm-8">
              <input type="Pelanggan" class="form-control form-control-sm" id="Pelanggan" placeholder="Nama pelanggan" readonly>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card">
          <div class="form-group ml-3 mr-3 mt-3">
            <label for="Pelanggan" class="p-1 col-sm-4 col-form-label col-form-label-sm">Total</label>
            <div class="p-1 col-sm-8">
              <input type="Pelanggan" class="form-control form-control-sm" id="Pelanggan" placeholder="50000">
            </div>
          </div>
          <div class="form-group ml-3 mr-3" style="margin-top: -1rem">
            <label for="discount" class="p-1 col-sm-4 col-form-label col-form-label-sm">Kembalian</label>
            <div class="p-1 col-sm-8">
              <input type="number" class="form-control form-control-sm" id="discount" placeholder="15000"  readonly>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card">
          <div class="form-group mt-2 ml-3 mr-3">
            <label class="p-1 col-sm-4 col-form-label col-form-label-sm">Textarea</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-3">
        <div class="card p-3">
          <div class="d-flex justify-content-between">
            <button class="btn btn-warning w-100 mr-1">Hapus Semua</button>
            <button class="btn btn-secondary w-100 ml-1">Bayar Nanti</button>
          </div>
          <button class="btn btn-success w-100 mt-2" style="height: 4rem">Bayar Sekarang</button>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>