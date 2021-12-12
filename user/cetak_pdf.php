<?php
session_start();

require "../controllers/functions.php";
require "../vendor/autoload.php";

use Dompdf\Dompdf;

$query_p = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'");
$query_b = mysqli_query($conn, "SELECT * FROM biodata WHERE user_id = '" . $_SESSION['user_id'] . "'");
$pendaftaran = mysqli_fetch_array($query_p);
$biodata = mysqli_fetch_array($query_b);

$id = $pendaftaran['id_pendaftaran'];
$jurusan = $pendaftaran['jurusan_id'];
$sekolah = $biodata['asal_sekolah'];
$nisn = $biodata['nisn'];
$name = $biodata['fullname'];
$kelamin = $biodata['jenis_kelamin'];

// echo $id;

$html =
  // '<h1>Kartu Pendaftaran</h1>' .
  '<html><body>' .
  '<center>' .
  '<h1> Kartu Pendaftaran </h1>' .
  '<table border="1" cellpadding="10" cellspacing="0" align="center">' .
  '<tr>' .
  '<th>Id Pendaftaran :</th>' .
  '<td>' . $id . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>Nama :</th>' .
  '<td>' . $name . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>NISN :</th>' .
  '<td>' . $nisn . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>Jenis Kelamin :</th>' .
  '<td>' . $kelamin . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>Asal Sekolah :</th>' .
  '<td>' . $sekolah . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>Jurusan :</th>' .
  '<td>' . $jurusan . '</td>' .
  '</tr>' .
  '</table></center></body></html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('kartu.pdf', array("Attachment" => 0));
