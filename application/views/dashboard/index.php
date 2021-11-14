<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
  <?= $this->session->flashdata('message'); ?>
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laundry Masuk (Hari ini)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laundrymasuk; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-sign-in-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laundry Selesai</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laundryselesai; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan (Hari ini)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $transhari['total'] == null ? 0 :  $transhari['total']; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $totrans['totaltransaksi']; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card shadow lg">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight">Riwayat Transaksi Terbaru</h4>
    </div>
    <div class="card-body">
      <?php if ($transaksi == null) : ?>
        <h6>Belum ada transaksi masuk</h6>
      <?php else : ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Invoice</th>
                <th>Nama Pelanggan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <tr>
                <?php foreach ($transaksi as $tr) : ?>
                  <td><?= $i++; ?></td>
                  <td><?= $tr['id_transaksi']; ?></td>
                  <td><?= $tr['nama_pelanggan']; ?></td>
                  <td><?php if ($tr['status'] == 1) {
                        echo '<span class="badge badge-warning">Dalam Proses</span>';
                      } else if ($tr['status'] == 2) {
                        echo '<span class="badge badge-primary">Selesai</span>';
                      } else {
                        echo '<span class="badge badge-danger">Sudah Diambil</span>';
                      }
                      ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
    </div>
  </div>
<?php endif; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->