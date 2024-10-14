<!DOCTYPE html>
<html>

  <head>
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
    <h1>Daftar Surat Keluar</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nomor Surat</th>
          <th>Pengirim</th>
          <th>Perihal</th>
          <th>Tanggal Arsip</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($suratKeluar as $surat)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $surat->nomor_surat }}</td>
            <td>{{ $surat->pengirim }}</td>
            <td>{{ $surat->perihal }}</td>
            <td>{{ $surat->tgl_surat }}</td>
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
