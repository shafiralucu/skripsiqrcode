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


  <main class="container mt-4">
    <div id="upload_fp">
      <h2><b>Upload File Penugasan</b></h2>
      <h4>Upload file penugasan di bawah ini</h4>
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal_fp">
        Lihat data penugasan yang telah tersedia disini
      </button>

      <hr>

      <form method="post" action="<?php echo base_url('admin/ImportExport_Admin/spreadsheet_import'); ?>" enctype="multipart/form-data" name="upload">
        <div class="form-group">
          <input type="file" name="upload_file" class="form-control" placeholder="Enter Name" id="upload_file" required>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-success" value="Upload">
        </div>
      </form>
  </main>
  </div>

  <br>

  <!-- Page Content -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <div id="lihat_jadwal">
    <h2><b>Lihat Data Penugasan</b></h2>
    <h4>Lihat data penugasan yang telah terdapat pada sistem</h4>
  </div>
  <br>
  <form action="<?php echo base_url('admin/ImportExport_Admin/show_file_penugasan'); ?>" method="POST">
    <table style="margin-left:auto; margin-right:auto; text-align:center; width: 45%;">
      <tr>
        <td><label>Tahun Ajar:</label>
          <input type="text" class="form-control" name="tahun_ajar_fp" style="width:100%">
        </td>
        <td><label style="opacity: 0;">Tahun Ajar:</label></td>
        <td><label>Pilih Ganjil/Genap:</label>
          <select name="gg_fp" class="form-control" style="width: 100%">
            <option>Ganjil</option>
            <option>Genap</option>
          </select>
        </td>
        <td><label style="opacity: 0;">Tahun Ajar:</label></td>

        <td><label style="opacity: 0;">Cari input</label><br>
          <input type="submit" class="btn btn-primary" value="Lihat data penugasan"></button>
        </td>
      </tr>
    </table>

    <br>
    <!-- tabel untuk mengeluarkan isi dari file penugasan dari tahun yang dipilih -->
    <table class="table table-striped" style="margin-left:auto; margin-right:auto; text-align:center; width: 80%; table-layout: fixed;">
      <thead style="font-weight: bold;" class="thead-dark">
        <td>ID</td>
        <td>NIK</td>
        <td>Nama Dosen</td>
        <td>Kode MK</td>
        <td>Nama MK</td>
        <td>Banyak SKS</td>
        <td>Banyak Kelas</td>
        <td>Tahun Ajar</td>
        <td>Genap Ganjil</td>
        <td>Edit Penugasan</td>
        <td>Hapus Penugasan</td>
      </thead>
      <?php
      foreach ($file_penugasan as $rows) {
      ?>
        <tr>
          <td><?php echo $rows->id_penugasan ?></td>
          <td><?php echo $rows->NIK ?></td>
          <td><?php echo $rows->nama_dosen ?></td>
          <td><?php echo $rows->kode_mk ?></td>
          <td><?php echo $rows->nama_mk ?></td>
          <td><?php echo $rows->banyak_sks ?></td>
          <td><?php echo $rows->banyak_kelas ?></td>
          <td><?php echo $rows->tahun_ajar ?></td>
          <td><?php echo $rows->genap_ganjil ?></td>
          <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditPenugasan">Edit Jadwal</button></td>
          <td><?php echo anchor("admin/ImportExport_Admin/delete/{$rows->id_penugasan}", 'Hapus Penugasan', ['class' => 'btn btn-danger btn-sm']); ?> </td>
          </form>


          <!-- modal untuk edit file penugasan !-->
          <div class="modal fade" id="modalEditPenugasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalEditPenugasan">Edit penugasan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?php echo base_url('admin/ImportExport_Admin/edit'); ?>" method="POST">
                  <input type="hidden" name="id_edit" id="id_edit" value="<?php echo $rows->id_penugasan; ?>" />
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Pilih Nama Dosen:</label>
                      <select class="form-control" style="width: 100%;" name="pilih_dosen">
                        <?php
                        foreach ($dosen_file_penugasan as $rows) {
                          echo '<option value="' . $rows->NIK . ' ' . $rows->Nama_Dosen . '">' . $rows->NIK . ' ' . $rows->Nama_Dosen . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pilih Nama Mata Kuliah:</label>
                      <select name="pilih_mk" class="form-control" style="width: 100%">
                        <?php
                        foreach ($mk_file_penugasan as $rows) {
                          echo '<option value="' . $rows->Kode_MK . ' ' . $rows->Nama_MK . '">' . $rows->Kode_MK . ' ' . $rows->Nama_MK . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Banyak SKS:</label>
                      <select name="pilih_sks" class="form-control" style="width: 100%;">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Banyak Kelas:</label>
                      <select name="pilih_banyak_kelas" class="form-control" style="width: 100%">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tahun Ajar:</label>
                      <input type="text" class="form-control" id="pilih_thn_ajar" name="pilih_thn_ajar" style="width: 100%">
                    </div>
                    <div class="form-group">
                      <label>Genap Ganjil:</label>
                      <input type="text" class="form-control" id="pilih_gg" name="pilih_gg" style="width: 100%">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Simpan jadwal">
                    </div>
                </form>
              </div>
            </div>
          </div>
          </div>
        </tr>
      <?php } ?>

    </table>



  <!-- modal untuk mendapatkan file penugasan yang tersedia -->
  <!-- Modal -->
  <div class="modal fade" id="modal_fp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_fp">File penugasan yang telah tersedia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped" style="margin-left:auto; margin-right:auto; text-align:center; width: 80%; table-layout: fixed;">
            <thead style="font-weight: bold;" class="thead-dark">
              <td>Tahun</td>
              <td>Semester</td>
              <td>Tersedia</td>
            </thead>
            <?php
            foreach ($tahun_file_penugasan as $rows) {
            ?>
              <tr>
                <td><?php echo $rows->tahun_ajar ?></td>
                <td><?php echo $rows->genap_ganjil ?></td>
                <td>✔️</td>
              </tr>
            <?php } ?>
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</html>