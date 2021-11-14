<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('admin');?>">Admin</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url('transaksi');?>">Data Transaksi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
  </ol>
</nav>
<!-- DataTales Example -->
  <div class="col-lg">
            <!-- DataTales Example -->
              
                  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h5>Form Tambah Data Transaksi</h5>
                </div>
                <div class="card-body">
                <form action="" method="post">
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">No Transaksi</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" value="<?= $datatransaksi['id_transaksi'];?>" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                    <div class="col">
                    <input type="text" class="form-control" value="<?= $datatransaksi['nama_pelanggan'];?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Masuk</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" value="<?= $datatransaksi['tgl_masuk'];?>" disabled>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 col-form-label">No Hp.</label>
                    <div class="col">
                      <input type="text" class="form-control" value="<?= $datatransaksi['no_hp'];?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Selesai</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?= $datatransaksi['tgl_selesai'];?>" disabled>
                    </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Ubah Status</label>
                    <div class="col-sm-6">
                        <select id="inputState" name="status" class="form-control">
                          <option selected disabled>--Pilih Status--</option>
                          <option value=2>Selesai</option>
                          <option value=3>Sudah Diambil</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <hr>
                  </div>
                </div>

                <div class="card shadow mb-4">
                <div class="card-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th width="50px">No</th>
                    <th width="350px">Paket</th>
                    <th width="250px">Harga(per kilo/satuan)</th>
                    <th width="100px">Jumlah</th>
                    <th >Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php $i=1;?>
                    <?php foreach($transaksidet as $d) : ?>
                        <td><?= $i++;?></td>
                        <td><?= $d['nama_paket'];?></td>
                        <td><?= $d['harga_satuan'];?></td>
                        <td><?= $d['jumlah'];?></td>
                        <td><?= $d['total'];?></td>
                    </tr>
                    <?php endforeach;?>
                    <tr>
                        <td colspan="4" class="bg-primary"><center><b class="text-white">Total Transaksi</center></b></td>
                        <td><input type="text" id="txt1" class="form-control" value="<?= $totaltrans['totaltransaksi'];?>" disabled></td>
                    </tr>
                    <tr>
                    <td colspan="4"><center>Tunai</center></td>
                        <td><input type="text" id="txt2" onkeyup="sum();" class="form-control"></td>
                    </tr>
                    <tr>
                    <td colspan="4"><center>Kembalian</center></td>
                        <td><input type="text" id="txt3" class="form-control" disabled></td>
                    </tr>
                </tbody>
                </table>
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
<script>
function sum() {
    var txtFirstNumberValue = document.getElementById('txt1').value;
    var txtSecondNumberValue = document.getElementById('txt2').value;
    var result = parseInt(txtSecondNumberValue)-parseInt(txtFirstNumberValue) ;
    if (!isNaN(result)) {
        document.getElementById('txt3').value = result;
    }else if(txtSecondNumberValue == ''){
      document.getElementById('txt3').value ='';
    }
}

</script>