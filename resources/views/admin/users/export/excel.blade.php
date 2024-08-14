<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Excel</title>
  </head>

  <body>
    <h3>Daftar Pengguna</h3>
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
            <td>{{ Carbon\Carbon::parse($user->created_at)->translatedFormat('l, j F Y H:i:s') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>

</html>
