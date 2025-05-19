<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Pekerjaan Kendaraan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      font-size: 14px;
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    td {
      padding: 8px;
      vertical-align: top;
    }

    .label {
      font-weight: bold;
      width: 200px;
    }

    .multiline {
      white-space: pre-line;
    }

    @media print {
      body {
        margin: 0;
      }
    }
  </style>
</head>
<body>
  <h2>Laporan Pekerjaan Kendaraan</h2>

  <table>
    <tr>
      <td class="label">Kode</td>
      <td><?= $data->code ?></td>
    </tr>
    <tr>
      <td class="label">Kendaraan</td>
      <td><?= $data->vehicle->name ?> - <?= $data->vehicle->police_number ?></td>
    </tr>
    <tr>
      <td class="label">Tanggal Booking</td>
      <td><?= $data->booking_date ?></td>
    </tr>
    <tr>
      <td class="label">Tanggal Serah Terima</td>
      <td><?= $data->handover_date ?></td>
    </tr>
    <tr>
      <td class="label">Status</td>
      <td><?= $data->status ?></td>
    </tr>
    <tr>
      <td class="label">Status Menunggu</td>
      <td><?= $data->waiting_status ?></td>
    </tr>
    <tr>
      <td class="label">KM Masuk</td>
      <td><?= $data->km_in ?></td>
    </tr>
    <tr>
      <td class="label">KM Keluar</td>
      <td><?= $data->km_out ?: '-' ?></td>
    </tr>
    <tr>
      <td class="label">Keluhan</td>
      <td class="multiline"><?= $data->complaint ?></td>
    </tr>
    <tr>
      <td class="label">Deskripsi Pekerjaan</td>
      <td class="multiline"><?= nl2br($data->description) ?></td>
    </tr>
    <tr>
      <td class="label">Rekomendasi</td>
      <td><?= $data->recommendation ?></td>
    </tr>
    <tr>
      <td class="label">Sparepart</td>
      <td><?= $data->spareparts ?></td>
    </tr>
    <tr>
      <td class="label">Keterangan</td>
      <td><?= $data->keterangan ?></td>
    </tr>
  </table>

  <br><br>
  <table style="width: 100%; text-align: center;">
    <tr>
      <td>Dibuat oleh</td>
    </tr>
    <tr>
      <td style="height: 60px;"></td>
      <td></td>
    </tr>
    <tr>
      <td>(<?= $data->creator->name ?>)</td>
    </tr>
  </table>
  <script>window.print()</script>
</body>
</html>
