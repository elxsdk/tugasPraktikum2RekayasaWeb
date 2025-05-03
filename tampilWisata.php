<?php
function curl($url)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);
  return $output;
}

// Alamat localhost untuk file getWisata.php
$send = curl("http://localhost/rekayasaWeb/Pertemuan2/getWisata.php");

// Mengubah JSON menjadi array
$data = json_decode($send, TRUE);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Data Wisata</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
      padding: 12px 15px;
      text-align: center;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #e0f7fa;
    }

    td {
      color: #333;
    }
  </style>
</head>

<body>

  <h2>Daftar Wisata</h2>

  <table>
    <thead>
      <tr>
        <th>ID Wisata</th>
        <th>Kota</th>
        <th>Landmark</th>
        <th>Tarif</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row["id_wisata"]) ?></td>
          <td><?= htmlspecialchars($row["kota"]) ?></td>
          <td><?= htmlspecialchars($row["landmark"]) ?></td>
          <td><?= htmlspecialchars($row["tarif"]) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>

</html>