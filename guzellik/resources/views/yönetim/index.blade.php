<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yönetim Paneli</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="{{ asset('iletisim/images/ico.png') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('iletisim/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('iletisim/vendor/animate/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('iletisim/vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('iletisim/vendor/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('iletisim/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('iletisim/css/main.css') }}">

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="kontrol.php" method="post">
				<span class="login100-form-title p-b-37">
					<img src="images/logo.jpg" width="280px">
					<h4>Giriş Yap</h4>
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Lütfen Kullanıcı Adınızı Yazın">
					<input class="input100" type="text" name="kadi" placeholder="Kullanıcı Adı">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Lütfen Şifrenizi Yazın">
					<input class="input100" type="password" name="sifre" placeholder="Şifre">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						GİRİŞ YAP
					</button>
				</div>
	
				
			</form>
				<center>
				    	<br>
				    		<a href="sifremiunuttum.php">Şifremi Unuttum</a>
				    	<br>
				    		<a href="kayitol.php">Hesap Oluştur</a>
				    	<br>
							<a href="../">Siteye Dön</a>
						<br>
							<a href="#">Desing by colorlib.com</a>
				</center>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	<script src="{{ asset('yönetim/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('yönetim/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('yönetim/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('yönetim/vendor/select2/select2.min.js') }}"></script>
<script>
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<script src="{{ asset('yönetim/js/main.js') }}"></script>


</body>
</html>