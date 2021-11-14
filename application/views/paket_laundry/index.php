<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('admin');?>">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Paket Laundry</li>
  </ol>
</nav>
<!-- DataTales Example -->
  <?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight"><?= $title;?></h4>
              <a href="<?= base_url('paket/tambahpaket')?>" class="btn btn-primary mt-3">Tambah Data Paket</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="50px">No.</th>
                      <th width="350px">Nama Paket</th>
                      <th width="150px">Pengerjaan (Hari)</th>
                      <th width="150px">Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1;?>
                  <?php foreach($datapaket as $dp) : ?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?= $dp['nama_paket'];?></td>
                      <td><?= $dp['pengerjaan']?> Hari</td>
                      <td><?= $dp['harga_satuan'];?></td>
                      <td>
                      <a href="<?= base_url('paket/editpaket/') . $dp['id_paket'];?>" class="btn btn-success btn-sm"?>Edit</a>
                      <a href="<?= base_url('paket/hapuspaket/') . $dp['id_paket'];?>" class="btn btn-danger btn-sm"onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->