<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('pelanggan'); ?>">Data Paket Laundry</a></li>
      <li class="breadcrumb-item active" aria-current="page">Form Edit Paket</li>
    </ol>
  </nav>
  <!-- DataTales Example -->
  <div class="col-lg-8">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5>Form Edit Data Paket</h5>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group row">
            <input type="hidden" class="form-control" id="idpaket" name="idpaket" value="<?= $data_paket['id_paket']; ?>">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Paket</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="namapaket" name="namapaket" value="<?= $data_paket['nama_paket']; ?>">
              <?= form_error('namapaket', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Harga</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="harga" name="harga" value="<?= $data_paket['harga_satuan']; ?>">
              <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Waktu Pengerjaan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="pengerjaan" name="pengerjaan" value="<?= $data_paket['pengerjaan']; ?>">
              <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary float-right ml-3">Ubah Data</button>
              <?= anchor('paket/', '<div class="btn btn-secondary float-right">kembali</div>') ?>
              <!-- <button type="button" class="btn btn-secondary float-right" onclick="redirect(<?= base_url('pelanggan'); ?>)">Kembali </button> -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->