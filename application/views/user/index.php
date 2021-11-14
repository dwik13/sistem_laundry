<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data User</li>
    </ol>
  </nav>
  <!-- DataTales Example -->
  <?= form_error('username', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= form_error('password1', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

  <?= $this->session->flashdata('message'); ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight">Data User</h4>
      <button type="button" class="btn btn-primary mt-3 mb-2 tampilmodaltambah" data-toggle="modal" data-target="#exampleModal">Tambah Data Baru</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="50px">No.</th>
              <th width="600px">Username</th>
              <th width="100px">Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($datauser as $d) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $d['username']; ?></td>
                <td><?= $d['role']; ?></td>
                <td>
                  <a href="" class="btn btn-success tampilmodaledit btn-sm" data-toggle="modal" data-target="#exampleModal" data-id="<?= $d['id_user']; ?>">Edit</a>
                  <a href="<?= base_url('user/deleteuser/') . $d['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user'); ?>" method="post">
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Ulangi Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Role User</label>
            <select class="form-control" id="role" name="role">
              <option value="1">Admin</option>
              <option value="2">User</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>