<!DOCTYPE html>
<html lang="en">

<head>
<title>Daftar Peminjaman - Pustakawan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
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
</head>

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
    <h2><b>Daftar Peminjaman</b></h2>
    <h4>Halaman untuk menampilkan daftar peminjaman</h4>
  </div>
  <br>
<table class="table table-striped" style="margin-left:auto; margin-right:auto; text-align:center; width: 80%; ">
    <thead style="font-weight: bold;" class="thead-dark">
      <td>Nama Anggota</td>
      <td>ISBN Buku</td>
      <td>Judul Buku</td>
      <td>No. Eksemplar</td>
      <td>Tanggal Peminjaman</td>
      <td>Tanggal Pengembalian</td>
      <td>Status Peminjaman</td>
    </thead>
    <?php
    foreach ($list_peminjaman as $rows) {
    ?>
      <tr>
        <td><?php echo $rows->nama ?></td>
        <td><?php echo $rows->ISBN_buku ?></td>
        <td><?php echo $rows->judul_buku ?></td>
        <td><?php echo $rows->no_eksemplar ?></td>
        <td><?php echo $rows->tanggal_peminjaman ?></td>
        <td><?php echo $rows->tanggal_pengembalian ?></td>
        <td><?php echo $rows->status_pinjam ?></td>
        </form>


        <!-- modal untuk edit anggota !-->
        <div class="modal fade" id="modalEditAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalEditAnggota">Edit penugasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="editAnggota" action='' method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama" class="form-control" value="" id="nama">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" value="" id="password">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="" id="alamat">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="emailanggota" class="form-control" value="" id="emailanggota">
                  </div>
                  <div class="form-group">
                    <label>No. Handphone:</label>
                    <input type="text" name="nohp" class="form-control" value="" id="nohp">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan jadwal">
                  </div>
                  <h6 class="text-danger">*Pastikan semua data telah terisi dengan benar</h6>
              </form>
            </div>
          </div>
        </div>
        </div>
      </tr>
    <?php } ?>
  </table>

  

</html>