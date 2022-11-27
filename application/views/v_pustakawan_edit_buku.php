<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <?php include 'templates/header.php'; ?>

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

    #input_hari {
      width: 60%;
      margin-left: 1%;
      margin-top: 1%;
      margin-bottom: -1%;
    }


    html * {
      font-family: 'Poppins', sans-serif;
    }


    #lihat_jadwal {
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }


    #upload_fp {
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }
  </style>

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




  <br>

  <!-- Page Content -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <div id="lihat_jadwal">
    <h2><b>CRUD Buku</b></h2>
    <h4>Halaman untuk menambah, menghapus dan mengedit buku</h4>
  </div>
  <br>

  <!-- Button untuk open tambah buku -->
  <div class="col text-center">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahBuku">
      Tambah buku dan generate QR Code buku disini
    </button>
  </div>

  <!-- Modal tambah buku -->
  <div class="modal fade" id="modalTambahBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahBuku" style="text-align: center;">Semua data pada form dibawah ini WAJIB diisi</b>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- form untuk tambah buku -->
        <form action="<?= base_url('index.php/pustakawan/AturBuku_Pustakawan/add_buku'); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>ISBN Buku</label>
              <input type="text" name="isbn_buku" class="form-control" value="" id="isbn_buku">
            </div>
            <div class="form-group">
              <label>Judul Buku</label>
              <input type="text" name="judul_buku" class="form-control" value="" id="judul_buku">
            </div>
            <div class="form-group">
              <label>Nomor Panggil</label>
              <input type="text" name="nomor_panggil" class="form-control" value="" id="nomor_panggil">
            </div>
            <div class="form-group">
              <label>Penerbit</label>
              <input type="text" name="penerbit" class="form-control" value="" id="penerbit">
            </div>
            <div class="form-group">
              <label>Tahun Terbit</label>
              <input type="text" name="tahun" class="form-control" value="" id="tahun">
            </div>
            <div class="form-group">
              <label>Bahasa</label>
              <input type="text" name="bahasa" class="form-control" value="" id="bahasa">
            </div>
            <div class="form-group">
              <input type="hidden" name="status" class="form-control" value="Available" id="status">
            </div>
            <h6 class="text-danger">Pastikan semua data telah terisi dengan benar</h6>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Tambah Buku dan Generate QR">
            </div>
          </div>
      </div>
    </div>
  </div>
  </form>

  <br>
  <!-- tabel untuk mengeluarkan isi dari tabel anggota  -->
  <table class="table table-striped" style="margin-left:auto; margin-right:auto; text-align:center; width: 80%; ">
    <thead style="font-weight: bold;" class="thead-dark">
      <td>ISBN Buku</td>
      <td>Judul Buku</td>
      <td>Nomor Panggil</td>
      <td>Penerbit</td>
      <td>Tahun Terbit</td>
      <td>Bahasa</td>
      <td>Status</td>
      <td>QR Code</td>
      <td>Edit Buku</td>
      <td>Hapus Buku</td>

    </thead>
    <!-- kode php untuk ambil data buku dari database -->
    <?php
    foreach ($list_buku as $rows) {
    ?>
      <tr>
        <td><?php echo $rows->ISBN_buku ?></td>
        <td><?php echo $rows->judul_buku ?></td>
        <td><?php echo $rows->nomor_panggil ?></td>
        <td><?php echo $rows->penerbit ?></td>
        <td><?php echo $rows->tahun_terbit ?></td>
        <td><?php echo $rows->bahasa ?></td>
        <td><?php echo $rows->status ?></td>
        <td><img style="width: 100px;" src="<?php echo base_url() . 'assets/img/' . $rows->qr_code; ?>"></td>
        <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditBuku" onclick="editBuku(<?php echo $rows->ISBN_buku ?>, '<?php echo base_url('index.php') ?>')">Edit Buku</button></td>
        <td><?php echo anchor("pustakawan/AturBuku_Pustakawan/delete_buku/{$rows->ISBN_buku}", 'Hapus Buku', ['class' => 'btn btn-danger btn-sm']); ?> </td>
        </form>


        <!-- modal untuk edit buku !-->
        <div class="modal fade" id="modalEditBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalEditBuku">Edit buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="editBuku" action='' method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" value="" id="judul_buku">
                  </div>
                  <div class="form-group">
                    <label>Nomor Panggil</label>
                    <input type="text" name="nomor_panggil" class="form-control" value="" id="nomor_panggil">
                  </div>
                  <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="" id="penerbit">
                  </div>
                  <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="text" name="tahun" class="form-control" value="" id="tahun">
                  </div>
                  <div class="form-group">
                    <label>Bahasa</label>
                    <input type="text" name="bahasa" class="form-control" value="" id="bahasa">
                  </div>
                  <h6 class="text-danger">Pastikan semua data telah terisi dengan benar</h6>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan Buku">
                  </div>
              </form>
            </div>
          </div>
        </div>
        </div>
      </tr>
    <?php } ?>
  </table>

</html>

<script>
  function editBuku(id, base_url){
    document.getElementById("editBuku").action = base_url+"/pustakawan/AturBuku_pustakawan/edit_buku/"+id;
  }
</script>