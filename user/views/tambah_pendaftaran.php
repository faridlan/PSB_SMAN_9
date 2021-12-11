<h1>Tambah Pendaftaran</h1>

<style>
  label {
    display: block;
  }
</style>

<form action="" method="POST" enctype="multipart/form-data">
  <ul>
    <li>
      <label for="jurusan_id">jurusan</label>
      <select id="jurusan_id" name="jurusan_id">
        <option value="1">IPA</option>
        <option value="2">IPS</option>
      </select>
    </li>
    <li>
      <label for="nilai_mtk">nilai mtk</label>
      <input type="text" id="nilai_mtk" name="nilai_mtk">
    </li>
    <li>
      <label for="nilai_ipa">nilai ipa</label>
      <input type="text" id="nilai_ipa" name="nilai_ipa">
    </li>
    <li>
      <label for="nilai_ing">nilai ing</label>
      <input type="text" id="nilai_ing" name="nilai_ing">
    </li>
    <li>
      <label for="nilai_ind">nilai ind</label>
      <input type="text" id="nilai_ind" name="nilai_ind">
    </li>
    <li>
      <label for="ijazah">ijazah</label>
      <input type="file" id="ijazah" name="ijazah">
    </li>
    <li>
      <button type="submit" name="submit">Submit</button>
    </li>
  </ul>
</form>