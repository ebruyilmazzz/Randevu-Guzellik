<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevular</title>
</head>
<body>
    <h2>Randevu Listesi</h2>
    <table border="1">
        <tr>
            <th>Tarih</th>
            <th>Saat</th>
            <th>Email</th>
        </tr>
        @foreach($randevular as $randevu)
        <tr>
            <td>{{ $randevu->tarih }}</td>
            <td>{{ $randevu->saat }}</td>
            <td>{{ $randevu->email }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
