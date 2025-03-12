<!DOCTYPE html>
<html lang="tr">
<head>
    <title>YILMAZ HASTANESİ - Randevu Kaydı</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">Randevu Kayıt Formu</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('randevu.kaydet') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Ad Soyad:</label>
                <input type="text" name="adsoyad" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Telefon Numarası:</label>
                <input type="text" name="telno" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Randevu Tarihi:</label>
                <input type="date" name="randevutarih" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Bölüm:</label>
                <select name="bolum" class="form-control" required>
                    <option value="Dahiliye">Dahiliye</option>
                    <option value="Kardiyoloji">Kardiyoloji</option>
                    <option value="Göz Hastalıkları">Göz Hastalıkları</option>
                    <option value="Ortopedi">Ortopedi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Ek Mesaj:</label>
                <textarea name="mesaj" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Randevu Kaydet</button>
        </form>
    </div>

</body>
</html>
