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
      }

      th {
        background-color: #f2f2f2;
      }
    </style>
  </head>

  <body>
    <h1>Daftar Pengguna</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Tanggal Dibuat</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->name }}</td>
            <td>{{ $user->created_at }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>

</html>
