<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('admin');?>">Admin</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url('pelanggan');?>">Data Pelanggan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Form Tambah Pelanggan</li>
  </ol>
</nav>
<!-- DataTales Example -->
  <div class="col-lg-8">
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5>Form Tambah Data Pelanggan</h5>
            </div>
            <div class="card-body">
            <form action="<?= base_url('pelanggan/tambahpelanggan')?>" method="post">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="namapelanggan" name="namapelanggan" placeholder="Nama Pelanggan">
                    <?= form_error('namapelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">No hp</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Hp">
                    <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary float-right ml-3">Tambah Data</button>
                    <button type="button" class="btn btn-secondary float-right" onclick="redirect(<?= base_url('pelanggan');?>)">Kembali </button>
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