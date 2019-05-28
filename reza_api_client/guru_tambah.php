<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/reza_api/api/guru/tambah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil ditambah...!!');window.location.href=\"http://localhost/reza_api_client/guru.php\";</script>";
	}else{
		
		// print_r($_POST);
		// echo "Fafa";

		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api ?>
<h3>Tambah Data guru</h3>
<form class="form-horizontal" method="POST" action="http://localhost/reza_api_client/guru_tambah.php">
	Nama guru* <br/>
	<input type="text" placeholder="Nama guru" name="nama_guru" required/><br/>
	NIP* <br/>
	<input type="text" placeholder="NIP" name="nip" required/><br/>
	Jenis Kelamin* <br/>
	<input type="text" placeholder="Jenis Kelamin" name="jenis_kelamin" required/><br/>
	Alamat* <br/>
	<input type="text" placeholder="Alamat" name="alamat" required/><br/>
	Mata Pelajaran* <br/>
	<input type="text" placeholder="Mata Pelajaran" name="mata_pelajaran" required/><br/>
	<button type="submit" type="button">
		Submit
	</button>
</form>