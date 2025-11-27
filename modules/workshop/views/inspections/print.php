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
  <table align="center" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td width="150px">
            <img src="<?= getSidebarLogo() ?>" alt="" width="120px">
        </td>
        <td style="vertical-align: middle;">
            <h2 style="margin: 0;"><?= env('APP_BUSINESS_NAME')?></h2>
            <p style="margin: 0;text-align:center;"><?= env('APP_BUSINESS_ADDRESS')?></p>
        </td>
        <td>
            SPK
        </td>
    </tr>
  </table>
  <h2>Laporan Pekerjaan Kendaraan</h2>

  <table>
    <tr>
      <td class="label">Kode</td>
      <td><?= $data->code ?></td>
    </tr>
    <tr>
      <td class="label">Kendaraan</td>
      <td><?= $data->vehicle->name ?> - <?= $data->vehicle->police_number ?> (<?= $data->vehicle->merk .' / '. $data->vehicle->type ?>)</td>
    </tr>
    <tr>
      <td class="label">Kustomer</td>
      <td><?= $data->customer->name ?> - <?= $data->customer->phone ?> (<?= strip_tags($data->customer->address) ?>)</td>
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
      <td class="label">Indikator Bar BBM</td>
      <td><?= $data->gasoline_indicator ?: '-' ?></td>
    </tr>
    <tr>
      <td class="label">Kondisi Kendaraan</td>
      <td><?= $data->vehicle_condition ?: '-' ?></td>
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
    <tr>
      <td class="label">Catatan</td>
      <td>
        <ol>
          <li>PKB ini wajib diisi dan ditanda tangani oleh masing-masing pihak</li>
          <li>Mekanik hanya akan mengutamakan pekerjaan yang sudah tercantum dalam PKB</li>
          <li>Konsumen tidak bisa komplain diluar pekerjaan yang sudah disepakati lewat PKB tersebut</li>
          <li>Segala resiko diluar PKB diluar tanggung jawab bengkel</li>
          <li>Konsumen memberikan ijin kepada bengkel membawa mobilnya untuk dicoba / dites dalam area</li>
          <li>bengkel ataupun diluar area bengkel</li>
          <li>PKB ini sebagai alat bukti pengambilan mobil konsumen selain STNK</li>
        </ol>
      </td>
    </tr>
  </table>

  <br><br>
  <table style="width: 100%; text-align: center;">
    <tr>
      <td colspan="3">Diketahui oleh</td>
    </tr>
    <tr>
      <td colspan="3" style="height: 60px;"></td>
    </tr>
    <tr>
      <td>
        <b><?= $data->advisor?->name ?? $data->creator->name ?></b><br>
        <?= $data->advisor ? 'Service Advisor' : 'Administrator' ?>
      </td>
      <td>
        <b><?= $data->mechanic?->name ?></b><br>
        Mekanik
      </td>
      <td>
        <b><?= $data->customer->name ?></b><br>
        Kustomer
      </td>
    </tr>
  </table>
  <script>window.print()</script>
</body>
</html>
