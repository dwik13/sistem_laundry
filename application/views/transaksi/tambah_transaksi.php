<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('admin');?>">Admin</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url('transaksi');?>">Data Transaksi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Form Tambah Transaksi</li>
  </ol>
</nav>
<!-- DataTales Example -->
  <div class="col-lg-8">
            <!-- DataTales Example -->
              <form action="<?= base_url('transaksi/tambahtransaksi');?>" method="post">
                  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h5>Form Tambah Data Transaksi</h5>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">No Transaksi</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="notransaksi" value="<?=$maxtrans;?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Tgl Masuk</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="tglmasuk" value="<?= date("Y-m-d");?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-7">
                      <select id="pelanggan" name="pelanggan" class="form-control">
                        <option selected disabled> -- Pilih Nama Pelanggan --</option>
                        <?php foreach($pelanggan as $pl ) : ?>
                          <option value="<?= $pl['id_pelanggan']?>"><?= $pl['nama_pelanggan'];?></option>
                          <?php endforeach;?>
                        </select>
                        <?= form_error('pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Paket</label>
                    <div class="col-sm-7">
                    <select id="inputState" name="paket" class="form-control">
                    <option selected disabled> -- Pilih Paket --</option>
                        <?php foreach($paket as $p ) : ?>
                          <option value="<?= $p['id_paket']?>"><?= $p['nama_paket'];?></option>
                          <?php endforeach;?>
                        </select>
                        <?= form_error('paket', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Berat/Jumlah</label>
                    <div class="col-sm-4">
                    <input type="text" name="jumlah" class="form-control">
                    <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Catatan</label>
                    <div class="col-sm-7">
                    <textarea class="form-control" aria-label="With textarea" name="catatan"></textarea>
                    </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                    <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary float-right ml-3">Simpan Data</button>
                    <button type="button" class="btn btn-secondary float-right" onclick="redirect(<?= base_url('pelanggan');?>)">Kembali </button>
                    </div>
                </div>
                  </div>
                </div>
                </form>
        </div>
        </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->