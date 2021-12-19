<?php

if (isset($_POST['submit'])) {
  if (tambah_pendaftaran($_POST) > 0) {
    echo "
      <script>
        alert('Data Berhasil Di Tambahkan');
      </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<h1>Tambah Pendaftaran</h1>

<style>
  label {
    display: block;
  }
</style>
<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="jurusan_id">Pilih Jurusan</label>
        <select class="form-control" id="jurusan_id" name="jurusan_id">
          <option>IPA</option>
          <option>IPS</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="nilai_mtk">Nilai Matematika</label>
        <input type="text" class="form-control" id="nilai_mtk" name="nilai_mtk" placeholder="Masukan Nilai Matematika">
      </div>
      <div class="form-group col-md-6">
        <label for="nilai_ipa">Nilai IPA</label>
        <input type="text" class="form-control" id="nilai_ipa" name="nilai_ipa" placeholder="Masukan Nilai IPA">
      </div>
      <div class="form-group col-md-6">
        <label for="nilai_ing">Nilai Bahasa Inggris </label>
        <input type="text" class="form-control" id="nilai_ing" name="nilai_ing" placeholder="Masukan Nilai B Inggris">
      </div>
      <div class="form-group col-md-6">
        <label for="nilai_ind">Nilai Bahasa Indonesia</label>
        <input type="text" class="form-control" id="nilai_ind" name="nilai_ind" placeholder="Masukan Nilai B Indonesia">
      </div>
      <div class="form-group col-md-6">
        <label for="Ijazah">Ijazah</label>
        <input type="file" class="form-control" id="Ijazah" name="Ijazah" placeholder="Masukan Nama Orang Tua">
      </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>