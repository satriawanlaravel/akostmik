<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

	<h3>Aplikasi Kuesioner Reset Password</h3>
	<hr>
	<p>Hai anda yang punya email ini, anda telah menggunakan fitur reset password kami.</p>
	<p>Untuk menindak lanjuti reset password anda silahkan klik link dibawah</p>
	<p>{{ link_to_route('forget.passworddsn', null, ['email' => $email, 'resetCode' => $code]) }}</p>

</body>
</html>