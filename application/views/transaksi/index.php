<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
    </ol>
  </nav>
  <!-- DataTales Example -->
  <?= $this->session->flashdata('message'); ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight"><?= $title; ?></h4>
      <a href="<?= base_url('transaksi/tambahtransaksi') ?>" class="btn btn-primary mt-3">Tambah Data Transaksi</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>No Invoice</th>
              <th>Nama Pelanggan</th>
              <th>Tgl Masuk</th>
              <th>Tgl Selesai</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($datatransaksi as $d) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $d['id_transaksi']; ?></td>
                <td><?= $d['nama_pelanggan']; ?></td>
                <td><?= $d['tgl_masuk']; ?></td>
                <td><?= $d['tgl_selesai']; ?></td>
                <td>
                  <?php
                  if ($d['status'] == 1) {
                    echo '<span class="badge badge-pill badge-warning">Dalam Proses</span>';
                  } else if ($d['status'] == 2) {
                    echo '<span class="badge badge-pill badge-primary">Selesai</span>';
                  } else if ($d['status'] == 3) {
                    echo '<span class="badge badge-pill badge-danger">Sudah Diambil</span>';
                  }
                  ?>
                <td>
                  <a href="<?= base_url('transaksi/detailtransaksi/') . $d['id_transaksi']; ?>" class="btn btn-success btn-sm" ?>Detail</a>
                  <a href="<?= base_url('transaksi/hapustransaksi/') . $d['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->