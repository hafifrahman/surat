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
    <h1>Daftar Agenda</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Acara</th>
          <th>Tempat</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Selesai</th>
          <th>Waktu</th>
          <th>Deskripsi</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($agendas as $agenda)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $agenda->nama_acara }}</td>
            <td>{{ $agenda->tempat }}</td>
            <td>{{ $agenda->tgl_mulai }}</td>
            <td>{{ $agenda->tgl_selesai }}</td>
            <td>{{ $agenda->waktu }}</td>
            <td>{{ $agenda->deskripsi }}</td>
            <td>{{ $agenda->status }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="8" id="no-data">Tidak ada data</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </body>

</html>
