<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

	<h4>Hei, </h4>
	<p>Terimakasih atas partisipasi anda dengan bergabung bersama kami di {{ link_to('/', 'AKOSTMIK Bumigora Mataram') }}</p>
	<p>Agar bisa menggunakan akun yang sudah anda daftarkan silahkan klik link validasi dibawah okeh! ;)</p>
	<p>{{ link_to_route('activate.medsn', null, ['email' => $email, 'activationCode' => $code]) }}</p>

</body>
</html>