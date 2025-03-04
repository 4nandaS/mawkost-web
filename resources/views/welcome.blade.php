<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kost</title>
</head>
<body>
    <h1>Data Kost</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kost</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Harga</th>
                <th>Gender</th>
                <th>No HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kosts as $kost)
                <tr>
                    <td>{{ $kost->id_kost }}</td>
                    <td>{{ $kost->nama_kost }}</td>
                    <td>{{ $kost->alamat_kost }}</td>
                    <td>{{ $kost->kota }}</td>
                    <td>{{ $kost->harga_kost }}</td>
                    <td>{{ $kost->gender }}</td>
                    <td>{{ $kost->no_hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
