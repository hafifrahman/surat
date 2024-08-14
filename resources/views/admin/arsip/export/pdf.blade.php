<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export PDF</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }

      table {
        border-collapse: collapse;
        width: 100%;
      }

      h1 {
        text-align: center;
      }

      th,
      td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        font-size: 11px;
      }

      th {
        text-wrap: nowrap;
        background-color: #f2f2f2;
      }

      #no-data {
        text-align: center;
        font-style: italic;
        color: #999;
      }
    </style>
  </head>

  <body>
    <h1>Daftar Arsip</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Arsip</th>
          <th>Nomor Arsip</th>
          <th>Jenis Arsip</th>
          <th>Tanggal Arsip</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($arsips as $arsip)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $arsip->nama_arsip }}</td>
            <td>{{ $arsip->nomor_arsip }}</td>
            <td>{{ $arsip->jenis_arsip }}</td>
            <td>{{ $arsip->tgl_arsip }}</td>
            <td>{{ $arsip->deskripsi }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" id="no-data">Tidak ada data</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </body>

</html>
