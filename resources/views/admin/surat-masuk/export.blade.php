<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 20px;
      }

      h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
      }

      p {
        text-align: center;
        font-size: 18px;
        margin: 5px 0;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      th,
      td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: #f2f2f2;
        font-size: 14px;
      }

      td {
        font-size: 14px;
      }

      #no-data {
        text-align: center;
        font-style: italic;
        color: #999;
      }
    </style>
  </head>

  <body>
    <h1>Laporan Surat Masuk</h1>
    <p>Tahun: {{ $tahun }}</p>
    @if ($bulan)
      <p>Bulan: {{ \Carbon\Carbon::create(null, $bulan, 1)->translatedFormat('F') }}</p>
    @endif
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>No Surat</th>
          <th>Tanggal Masuk</th>
          <th>Penerima</th>
          <th>Perihal</th>
        </tr>
      </thead>
      <tbody>
        @forelse($suratMasuk as $surat)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $surat->nomor_surat }}</td>
            <td>{{ $surat->tgl_surat }}</td>
            <td>{{ $surat->penerima }}</td>
            <td>{{ $surat->perihal }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="5" id="no-data">Tidak ada data</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </body>

</html>
