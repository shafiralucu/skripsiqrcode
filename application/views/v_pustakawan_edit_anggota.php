<!DOCTYPE html>
<html>
<title>Atur Anggota - Pustakawan</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

<head>


  <?php include "templates/header.php"; ?>

  <style>
    h3 {
      font-family: Verdana;
      font-size: 14pt;
      font-style: normal;
      font-weight: bold;
      color: red;
      text-align: center;
    }


    table.tr {
      font-family: Verdana;
      color: black;
      font-size: 12pt;
      font-style: normal;
      font-weight: bold;
      text-align: left;
    }

    .center {
      margin-left: auto;
      margin-right: auto;
      width: 100%;
      margin-bottom: -1%;

    }



    html * {
      font-family: 'Poppins', sans-serif;
    }


    #atur_anggota_text {
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }


    #upload_fp {
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }

    table {
      max-width: 100%;
    }
  </style>

<body>
  <?php
  if ($this->session->flashdata('message')) {
    echo $this->session->flashdata('message');
  }
  ?>

  <?php
  if ($this->session->flashdata('deleted')) {
    echo $this->session->flashdata('deleted');
  }
  ?>

  <?php
  if ($this->session->flashdata('updated')) {
    echo $this->session->flashdata('updated');
  }
  ?>




  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<br>
  <div id="atur_anggota_text">
    <h2><b>Atur Anggota</b></h2>
    <h4>Halaman untuk menambah, menghapus dan mengedit anggota</h4>
  </div>
  <br>

  <!-- Button untuk open tambah anggota -->
  <div class="col text-center">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahAnggota">
      Tambah anggota disini
    </button>
  </div>

  <!-- Modal tambah anggota -->
  <div class="modal fade" id="modalTambahAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahAnggota" style="text-align: center;">Semua data pada form dibawah ini WAJIB diisi</b>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- form untuk tambah anggota -->
        <form action="<?= base_url('index.php/pustakawan/AturAnggota_pustakawan/add_anggota'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Anggota</label>
              <input type="text" name="nama" class="form-control" value="" id="nama" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" value="" id="password" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="emailanggota" class="form-control" value="" id="emailanggota" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" value="" id="alamat" required>
            </div>
            <div class="form-group">
              <label>No. Handphone:</label>
              <input type="text" name="no_telepon" class="form-control" value="" id="no_telepon" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="last_login" id="last_login" value="2001-01-01 00:00:00" />
            </div>
            <h6 class="text-danger">Pastikan semua data telah terisi dengan benar</h6>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Tambah Anggota">
            </div>
          </div>
      </div>
    </div>
  </div>
  </form>

  <br>
  <div class="table-max">
    <!-- tabel untuk mengeluarkan isi dari tabel anggota  -->
    <table class="table table-striped" style="margin-left:auto; margin-right:auto; text-align:center; width: 80%; ">
      <thead style="font-weight: bold;" class="thead-dark">
        <td>ID</td>
        <td>Nama Anggota</td>
        <td>Alamat</td>
        <td>Email</td>
        <td>No. Hp</td>
        <td>Edit Anggota</td>
        <td>Hapus Anggota</td>
      </thead>
      <?php
          $idx = 1;
      foreach ($list_anggota as $rows) {
      ?>
        <tr>
          <td id="id_anggota_view-<?php echo $idx ?>"><?php echo $rows->id_anggota ?></td>
          <td id="nama_view-<?php echo $idx ?>"><?php echo $rows->nama ?></td>
          <td id="alamat_view-<?php echo $idx ?>"><?php echo $rows->alamat ?></td>
          <td id="emailanggota_view-<?php echo $idx ?>"><?php echo $rows->email ?></td>
          <td id="nohp_view-<?php echo $idx ?>"><?php echo $rows->no_telepon ?></td>
          <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditAnggota" onclick="editAnggota(<?php echo $idx ?>, '<?php echo base_url('index.php') ?>')">Edit Anggota</button></td>
          <td><?php echo anchor("pustakawan/AturAnggota_Pustakawan/delete_anggota/{$rows->id_anggota}", 'Hapus Anggota', ['class' => 'btn btn-danger btn-sm']); ?> </td>
          </form>

          <!-- modal untuk edit anggota !-->
          <div class="modal fade" id="modalEditAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalEditAnggota">Edit anggota</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="editAnggota" action='' method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Anggota</label>
                      <input type="text" name="nama" class="form-control" value="" id="nama_edit" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control" value="" id="password_edit" placeholder="Masukkan password baru disini" required>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" value="" id="alamat_edit" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="emailanggota" class="form-control" value="" id="emailanggota_edit" required>
                    </div>
                    <div class="form-group">
                      <label>No. Handphone:</label>
                      <input type="text" name="nohp" class="form-control" value="" id="nohp_edit" required>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Simpan Data">
                    </div>
                    <h6 class="text-danger">*Pastikan semua data telah terisi dengan benar</h6>
                </form>
              </div>
            </div>
          </div>
  </div>
  </tr>
<?php $idx++;} ?>
</table>
</body>

<script>
  function editAnggota(id, base_url) {
    document.getElementById("nama_edit").value = document.getElementById("nama_view-" + id).innerText;
    document.getElementById("alamat_edit").value = document.getElementById("alamat_view-" + id).innerText;
    document.getElementById("emailanggota_edit").value = document.getElementById("emailanggota_view-" + id).innerText;
    document.getElementById("nohp_edit").value = document.getElementById("nohp_view-" + id).innerText;
    let idanggota = document.getElementById("id_anggota_view-" + id).innerText;
    document.getElementById("editAnggota").action = base_url + "/pustakawan/AturAnggota_pustakawan/edit_anggota/" + idanggota;
  }
</script>

</html>