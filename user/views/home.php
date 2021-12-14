<?php

$biodata = mysqli_query($conn, "SELECT * FROM biodata WHERE user_id = '" . $_SESSION['user_id'] . "'");
$pendaftaran = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'");

$status = mysqli_query($conn, "SELECT p.id_pendaftaran,
                                s.nama_status
                                FROM pendaftaran as p
                                INNER JOIN status as s ON p.status_id = s.id_status
                                WHERE p.user_id = '" . $_SESSION['user_id'] . "'");

$row = mysqli_fetch_assoc($status);
?>

<style>
  #link {
    color: red;
    text-decoration: none;
  }

  #link2 {
    color: red;
    text-decoration: none;
  }

  #link3 {
    display: none;
    color: red;
    text-decoration: none;
  }

  #status {
    display: none;
  }
</style>

<h1>Home User</h1>

<h1 id="status"><?= $row['nama_status'] ?></h1>
<p>
  <?= $_SESSION['username'] ?>
</p>
<p>
  <?= $_SESSION['user_id'] ?>
</p>
<p>
  <?= $_SESSION['level'] ?>
</p>

<p><a href="index.php?page=biodata" id="link"> 1. Pengisian Biodata</a></p>
<p><a href="index.php?page=pendaftaran" id="link2"> 2. Pengisian Pendaftaran</a></p>
<p><a href="index.php?page=cetak" id="link3"> 3. Cetak Kartu</a></p>

<?php if (mysqli_num_rows($biodata) > 0) { ?>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('#link').css('color', 'green');
    });
    $(document).ready(function() {
      $('a[href^="index.php?page=biodata"]').each(function() {
        var oldUrl = $(this).attr("href");
        var newUrl = oldUrl.replace("index.php?page=biodata", "index.php?page=update_biodata&id=<?= $_SESSION['user_id'] ?>");

        $(this).attr("href", newUrl);
      })
    })
  </script>

<?php } ?>
<?php if (mysqli_num_rows($pendaftaran) > 0) { ?>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('#link2').css('color', 'green');
    });
    $(document).ready(function() {
      $('a[href^="index.php?page=pendaftaran"]').each(function() {
        var oldUrl = $(this).attr("href");
        var newUrl = oldUrl.replace("index.php?page=pendaftaran", "index.php?page=update_pendaftaran&id=<?= $_SESSION['user_id'] ?>");

        $(this).attr("href", newUrl);
      })
    })
  </script>

<?php } ?>
<?php if (mysqli_num_rows($pendaftaran) > 0 && mysqli_num_rows($biodata) > 0) { ?>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('#link3').css('display', 'block');
    });
  </script>

<?php } ?>
<?php if (mysqli_num_rows($pendaftaran) > 0 && mysqli_num_rows($biodata) > 0) { ?>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('#status').css('display', 'block');
    });
  </script>

<?php } ?>